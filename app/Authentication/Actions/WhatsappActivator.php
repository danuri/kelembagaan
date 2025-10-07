<?php namespace App\Authentication\Actions;

use CodeIgniter\Shield\Authentication\Actions\ActionInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\RuntimeException;
use App\Libraries\WhatsAppSender;

class WhatsappActivator implements ActionInterface
{
    protected string $type = 'wa'; // jenis activator

    public function show()
    {
        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        
    }

    public function handle(IncomingRequest $request): never
    {
        throw new PageNotFoundException();
    }


    public function getType(): string;

    public function createIdentity(User $user): string;

    
    public function send(User $user): bool
    {
        $otp = rand(100000, 999999);
        $expires = date('Y-m-d H:i:s', time() + 600); // 10 menit

        // simpan kode OTP ke meta user
        $user->setMeta('wa_otp', $otp);
        $user->setMeta('wa_otp_expiry', $expires);
        $user->save();

        // kirim ke nomor WA user
        $wa = $user->phone ?? null; // pastikan field phone ada di tabel user
        if (!$wa) {
            return false;
        }

        $sender = new WhatsAppSender();
        $msg = "Halo {$user->username}, kode aktivasi Anda adalah *{$otp}*. Berlaku 10 menit.";
        $res = $sender->sendMessage($wa, $msg);

        return isset($res['status']) && $res['status'] === true;
    }

    public function verify(User $user, string $token): bool
    {
        $otp = $user->getMeta('wa_otp');
        $expiry = $user->getMeta('wa_otp_expiry');

        if (!$otp || !$expiry) {
            return false;
        }

        if (time() > strtotime($expiry)) {
            return false; // expired
        }

        if ($otp !== $token) {
            return false;
        }

        // aktivasi berhasil
        $user->activate();
        $user->deleteMeta('wa_otp');
        $user->deleteMeta('wa_otp_expiry');
        $user->save();

        return true;
    }
}
