<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail = 'diktis.lembaga@gmail.com';
    public string $fromName = 'Diktis Kelembagaan Kemenag';
    public string $recipients = '';

    /** The "user agent" */
    public string $userAgent = 'CodeIgniter';

    /** The mail sending protocol: mail, sendmail, smtp */
    public string $protocol = 'smtp';

    /** Path to Sendmail */
    public string $mailPath = '/usr/sbin/sendmail';

    /** SMTP Server Hostname */
    public string $SMTPHost = 'smtp.googlemail.com';

    /** SMTP Auth Method: login = Sandi Biasa */
    public string $SMTPAuthMethod = 'login';

    /** SMTP Username */
    public string $SMTPUser = 'diktis.lembaga@gmail.com';

    /**
     * SMTP Password
     * Simpan di file .env dengan key: email.SMTPPass = your_password
     */
    public string $SMTPPass = '';

    /** SMTP Port */
    public int $SMTPPort = 465;

    /** SMTP Timeout (in seconds) */
    public int $SMTPTimeout = 30;

    /** Enable persistent SMTP connections */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     * 'tls' = STARTTLS (sesuai konfigurasi server Kemenag port 587)
     */
    public string $SMTPCrypto = 'ssl';

    /** Enable word-wrap */
    public bool $wordWrap = true;

    /** Character count to wrap at */
    public int $wrapChars = 76;

    /** Type of mail */
    public string $mailType = 'html';

    /** Character set */
    public string $charset = 'UTF-8';

    /** Whether to validate the email address */
    public bool $validate = false;

    /** Email Priority. 1 = highest. 5 = lowest. 3 = normal */
    public int $priority = 3;

    /** Newline character */
    public string $CRLF = "\r\n";

    /** Newline character */
    public string $newline = "\r\n";

    /** Enable BCC Batch Mode */
    public bool $BCCBatchMode = false;

    /** Number of emails in each BCC batch */
    public int $BCCBatchSize = 200;

    /** Enable notify message from server */
    public bool $DSN = false;
}
