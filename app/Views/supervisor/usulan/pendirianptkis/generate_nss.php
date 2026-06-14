<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Generate NSS - Usulan Pendirian PTKIS</h4>
        <p class="text-muted mb-0">Daftar usulan yang sudah selesai untuk generate NSS baru</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lembaga</th>
                    <th>NSPT ID</th>
                    <th>Tanggal Selesai</th>
                    <th>Status NSS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php if (empty($usulan_list)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="alert alert-info mb-0">Tidak ada usulan yang selesai</div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($usulan_list as $u): ?>
                        <tr>
                            <td><strong><?= $no++ ?></strong></td>
                            <td><?= $u->nama_lembaga ?></td>
                            <td>
                                <?php if ($u->nspt_lembaga_id): ?>
                                    <span class="badge bg-label-info"><?= $u->nspt_lembaga_id ?></span>
                                <?php else: ?>
                                    <span class="badge bg-label-danger">Belum ter-set</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($u->created_at)) ?></td>
                            <td>
                                <span class="badge bg-label-success">Selesai</span>
                            </td>
                            <td>
                                <?php if ($u->nspt_lembaga_id): ?>
                                    <button 
                                        type="button" 
                                        class="btn btn-sm btn-primary waves-effect waves-light"
                                        onclick="generateNss(<?= encrypt($u->usulan_id) ?>)"
                                        id="btn-<?= $u->id ?>">
                                        <i class="bx bx-play-circle"></i> Generate NSS
                                    </button>
                                <?php else: ?>
                                    <button 
                                        type="button" 
                                        class="btn btn-sm btn-secondary waves-effect"
                                        disabled
                                        title="NSPT ID belum ter-set">
                                        <i class="bx bx-lock"></i> Generate NSS
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function generateNss(id) {
        const btn = event.target.closest('button');
        const originalHtml = btn.innerHTML;
        
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin generate NSS untuk lembaga ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Generate',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                btn.disabled = true;
                btn.innerHTML = '<i class="bx bx-loader-alt bx-spin"></i> Processing...';

                fetch('<?= site_url('supervisor/usulan/pendirianptkis/generate-nss/proses/') ?>' + id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Refresh halaman atau update status
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message || 'Terjadi kesalahan saat generate NSS',
                            confirmButtonText: 'OK'
                        });
                        btn.disabled = false;
                        btn.innerHTML = originalHtml;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan: ' + error.message,
                        confirmButtonText: 'OK'
                    });
                    btn.disabled = false;
                    btn.innerHTML = originalHtml;
                });
            }
        });
    }
</script>

<?= $this->endSection() ?>
