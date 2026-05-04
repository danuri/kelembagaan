<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div
    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Detail Usulan</h4>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <a href="<?= site_url('verifikator/usulan') ?>" class="btn btn-label-secondary waves-effect">Kembali</a>
        </div>
        <?php if ($usulan->status == 4): ?>
            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="recheck()">Verifikasi
                Ulang</button>
        <?php endif; ?>
    </div>
</div>

<div class="card shadow-none bg-label-success mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nama ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Alamat Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_alamat ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>No. SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nosk ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_tglsk ?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Jenis Layanan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->layanan_nama ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Status Usulan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= usul_status($usulan->status) ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Keterangan BTS/TMS</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->keterangan ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Verifikator</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <strong><?= $verifikator->full_name ?></strong></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-align-top">
    <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
        <li class="nav-item">
            <a class="nav-link active waves-effect waves-light" href="#"><i
                    class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Info Usulan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light"
                href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/' . encrypt($usulan->id)) ?>"><i
                    class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Verifikasi Dokumen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light"
                href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/' . encrypt($usulan->id)) ?>"><i
                    class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light"
                href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/' . encrypt($usulan->id)) ?>"><i
                    class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light"
                href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/' . encrypt($usulan->id)) ?>"><i
                    class="icon-base ti tabler-link me-1_5 icon-sm"></i>KMA</a>
        </li>
    </ul>
</div>
<div class="row g-6">
    
    <div class="col-sm-8">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="mb-4">Data Lembaga</h5>
                <table class="table table-bordered table-striped mb-3">
                    <tbody>
                        <tr>
                            <td>Nama Lembaga</td>
                            <td>: <?= $detail->nama_lembaga ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>: <?= $detail->kategori ?></td>
                        </tr>
                        <tr>
                            <td>Jenjang</td>
                            <td>: <?= $detail->jenjang ?></td>
                        </tr>
                        <tr>
                            <td>Kopertais</td>
                            <td>: <?= $detail->kopertais ?></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td>: <?= $detail->telepon ?></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td>: <?= $detail->no_hp ?></td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="mb-4">Alamat Lembaga</h5>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Provinsi</td>
                            <td>: <?= $provinsi ?></td>
                        </tr>
                        <tr>
                            <td>Kabupaten/Kota</td>
                            <td>: <?= $kabupaten ?></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>: <?= $kecamatan ?></td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>: <?= $kelurahan ?></td>
                        </tr>
                        <tr>
                            <td>Kode Pos</td>
                            <td>: <?= $detail->kode_pos ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>: <?= $detail->alamat ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="mb-4">Program Studi</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Program Studi</th>
                            <th>Jenjang</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($prodi)): ?>
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada data program studi</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($prodi as $p): ?>
                                <tr>
                                    <td><?= $p->nama_prodi ?></td>
                                    <td><?= $p->jenjang ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="javascript:void(0);"
                                            onclick="showdoc(6,'<?= encrypt($p->id) ?>')"><i
                                                class="icon-base ti tabler-checklist me-1"></i> Dokumen</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>
         <!-- START TAB SIPPRO LOGS -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">Log Integrasi SIPPRO</h5>
                    <button type="button" class="btn btn-sm btn-primary"
                        onclick="kirimSippro('<?= encrypt($usulan->id) ?>')">
                        <i class="ti tabler-send me-1"></i> Kirim Ulang
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Endpoint</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($sippro_logs)): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada riwayat pengiriman data ke SIPPRO.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($sippro_logs as $log): ?>
                                    <tr>
                                        <td>
                                            <?= date('d/m/Y H:i', strtotime($log->created_at)) ?>
                                        </td>
                                        <td>
                                            <?= $log->endpoint ?>
                                        </td>
                                        <td>
                                            <?php if ($log->is_success): ?>
                                                <span class="badge bg-label-success">Sukses (
                                                    <?= $log->status_code ?>)
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-label-danger">Gagal (
                                                    <?= $log->status_code ?>)
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info"
                                                onclick="showSipproDetail('<?= htmlspecialchars($log->request_data ?? '', ENT_QUOTES) ?>', '<?= htmlspecialchars($log->response_data ?? '', ENT_QUOTES) ?>')">Detail</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END TAB SIPPRO LOGS -->
    </div>
    <div class="col-sm-4">
        <div class="card mb-3">
            <h5 class="card-header">Progress Usulan</h5>
            <div class="card-body">
                <ul class="timeline timeline-outline mb-0">
                    <?php foreach ($logs as $row): ?>
                        <li class="timeline-item timeline-item-transparent border-dashed">
                            <span class="timeline-point timeline-point-success"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-3">
                                    <h6 class="mb-0"><?= usul_status($row->status_usulan) ?></h6>
                                    <small class="text-body-secondary"><?= $row->created_at ?></small>
                                </div>
                                <p class="mb-2"><?= $row->keterangan ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body" id="object">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasDoc" aria-labelledby="canvasDocLabel">
    <div class="offcanvas-header">
        <h5 id="canvasDocLabel" class="offcanvas-title">Dokumen Pendukung</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <div id="lisdoc"></div>
        <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas">
            Tutup
        </button>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>

    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#preview').modal('show');
    }

    function recheck() {
        Swal.fire({
            text: 'Masukan informasi Pengembalian!',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Verifikasi Ulang',
            showLoaderOnConfirm: true,
            preConfirm: (data) => {
                return fetch('<?= site_url('supervisor/usulan/pendirianptkis/recheck/' . encrypt($usulan->id)) ?>', {
                    method: "POST",
                    body: JSON.stringify({ keterangan: data }),
                    headers: { "Content-type": "application/json; charset=UTF-8" }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                // reload page
                window.location.reload();

            }
        });
    }

    function showdoc(layanan, usulid) {
        $('#lisdoc').html('<div class="text-center"><i class="bx bx-loader bx-spin font-size-24"></i></div>');
        $('#lisdoc').load('<?= site_url('dokumen/verifikasi/') ?>' + layanan + '/' + usulid, function () {
            $('#canvasDoc').offcanvas('show');
        });
    }

</script>
<?= $this->endSection() ?>