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
            <a href="<?= site_url('supervisor/usulan/alihbentukptkis/done/' . encrypt($usulan->id)) ?>" type="button"
                class="btn btn-success waves-effect waves-light">Usulan Selesai</a>
        <?php endif; ?>
    </div>
</div>

<div class="card bg-label-warning mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nomor Surat Pengantar</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->nomor_surat ?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Perihal</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->perihal ?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
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
<div class="row g-6">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="mb-4">Data Usulan</h5>
                <table class="table table-bordered table-striped mb-3">
                    <tbody>
                        <tr>
                            <td>Nama Lembaga Lama</td>
                            <td>: <?= $detail->nama_lembaga ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Lembaga Lama</td>
                            <td>: <?= $detail->alamat_lembaga ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lembaga Baru</td>
                            <td>: <?= $detail->nama_lembaga_baru ?></td>
                        </tr>
                        <tr>
                            <td>Kategori Lembaga Baru</td>
                            <td>: <?= $detail->kategori ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="mb-4">Data Statistik</h5>
                <table class="table table-bordered table-striped mb-3">
                    <tbody>
                        <tr>
                            <td>Jumlah Magister</td>
                            <td>: <?= $detail->magister ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Doktor</td>
                            <td>: <?= $detail->doktor ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Asisten Ahli</td>
                            <td>: <?= $detail->asisten_ahli ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Lektor</td>
                            <td>: <?= $detail->lektor ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Lektor Kepala</td>
                            <td>: <?= $detail->lektor_kepala ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Guru Besar</td>
                            <td>: <?= $detail->guru_besar ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Mahasiswa</td>
                            <td>: <?= $detail->mahasiswa ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Rasio Dosen:Mahasiswa</td>
                            <td>: <?= $detail->rasio_dm ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="mb-4">Data Statistik</h5>
                <table class="table table-bordered table-striped mb-3">
                    <tbody>
                        <tr>
                            <td>Jumlah Fakultas</td>
                            <td>: <?= $detail->fakultas ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Prodi</td>
                            <td>: <?= $detail->prodi ?></td>
                        </tr>
                        <tr>
                            <td>Tidak Terakreditasi</td>
                            <td>: <?= $detail->akreditasi_no ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Prodi Terakreditasi Unggul/A</td>
                            <td>: <?= $detail->akreditasi_unggul ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Prodi Terakreditasi Baik Sekali/B</td>
                            <td>: <?= $detail->akreditasi_baiksekali ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Prodi Terakreditasi Baik</td>
                            <td>: <?= $detail->akreditasi_baik ?></td>
                        </tr>
                        <tr>
                            <td>Pelaporan PD Dikti</td>
                            <td>: <?= $detail->pelaporan ?></td>
                        </tr>
                        <tr>
                            <td>Luas Tanah</td>
                            <td>: <?= $detail->tanah ?>M²</td>
                        </tr>
                        <tr>
                            <td>Kepemilikan Tanah</td>
                            <td>: <?= $detail->kepemilikan_tanah ?>M²</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="mb-4">Dokumen</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60%">Dokumen</th>
                            <th>Sesuai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dokumens as $dokumen): ?>
                            <tr>
                                <td>
                                    <?php if ($dokumen->lampiran): ?>
                                        <a href="javascript:;"
                                            onclick="preview('<?= base_url('uploads/' . $dokumen->lampiran) ?>')"><?= $dokumen->dokumen ?></a>
                                    <?php else: ?>
                                        <?= $dokumen->dokumen ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= ($dokumen->dok_status == 1) ? '<span class="badge bg-label-success">Ya</span>' : '<span class="badge bg-label-danger">Tidak</span>' ?>
                                </td>
                                <td><?= $dokumen->keterangan ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">KMA</h5>
            </div>
            <div class="card-body">
                <?php if ($usulan->status == 4): ?>
                    <form action="<?= site_url('supervisor/usulan/detail/kma/save/' . encrypt($usulan->id)) ?>"
                        method="post" enctype="multipart/form-data">
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="no_kma">No Keputusan</label>
                            <div class="col-sm-9">
                                <input type="text" id="no_kma" name="no_kma" class="form-control"
                                    value="<?= $usulan->no_kma ?>" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="tanggal_kma">Tanggal Keputusan</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_kma" name="tgl_kma" class="form-control"
                                    value="<?= $usulan->tgl_kma ?>" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="lampiran">File Keputusan</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="lampiran" name="lampiran"
                                        aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf" />
                                    <?php if ($usulan->file_kma): ?>
                                        <a class="btn btn-outline-primary" type="button" id="groupLampiran"
                                            href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank">Lihat</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="save"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="no_kma">No Keputusan</label>
                            <div class="col-sm-9">
                                <input type="text" id="no_kma" name="no_kma" class="form-control"
                                    value="<?= $usulan->no_kma ?>" disabled />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="tanggal_kma">Tanggal Keputusan</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_kma" name="tgl_kma" class="form-control"
                                    value="<?= $usulan->tgl_kma ?>" disabled />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-3 col-form-label" for="lampiran">File Keputusan</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="lampiran" name="lampiran"
                                        aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf" />
                                    <?php if ($usulan->file_kma): ?>
                                        <a class="btn btn-outline-primary" type="button" id="groupLampiran"
                                            href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank">Lihat</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="alert alert-secondary alert-dismissible d-flex" role="alert">
                    <span class="alert-icon rounded">
                        <i class="icon-base ti tabler-bookmark icon-md w-px-30"></i>
                    </span>
                    <div class="d-flex flex-column ps-1">
                        <h5 class="alert-heading mb-2">Catatan Verifikator</h5>
                        <?php if ($detail->catatan): ?>
                            <p class="mb-0">
                                <?= $detail->catatan ?>
                            </p>
                        <?php else: ?>
                            <span class="badge bg-label-danger">Belum ada catatan</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="alert alert-warning alert-dismissible d-flex" role="alert">
                    <span class="alert-icon rounded">
                        <i class="icon-base ti tabler-bookmark icon-md w-px-30"></i>
                    </span>
                    <div class="d-flex flex-column ps-1">
                        <h5 class="alert-heading mb-2">Instrumen Penilaian Verifikator</h5>
                        <?php if ($detail->nilai): ?>
                            <a href="<?= base_url('uploads/nilai/' . $detail->nilai) ?>" class="btn btn-primary btn-sm"
                                target="_blank">Lihat</a>
                        <?php else: ?>
                            <span class="badge bg-label-danger">Belum diunggah</span>
                        <?php endif; ?>
                    </div>
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
                <a href="" target="_blank" class="btn btn-primary" id="previewfile">Buka Tab Baru</a>
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>

    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#previewfile').attr('href', berkas);
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
                return fetch('<?= site_url('supervisor/usulan/alihbentukptkis/recheck/' . encrypt($usulan->id)) ?>', {
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
</script>
<?= $this->endSection() ?>