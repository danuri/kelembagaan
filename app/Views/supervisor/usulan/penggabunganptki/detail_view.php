<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div
    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Detail Usulan</h4>
        <!-- <p class="mb-0">Orders placed across your store</p> -->
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <button class="btn btn-label-secondary waves-effect">Kembali</button>
        </div>
        <?php if ($usulan->status == 4): ?>
            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="recheck()">Verifikasi
                Ulang</button>
            <a href="<?= site_url('supervisor/usulan/alihkelolaptkis/done/' . encrypt($usulan->id)) ?>" type="button"
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
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Lembaga</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->nama_lembaga ?></div>
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
                        <h6>Verifikator</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $verifikator->full_name ?></div>
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
            </div>
        </div>
    </div>
</div>
<div class="row">
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
                <form action="#" method="post" enctype="multipart/form-data">
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
    $(document).ready(function () {
    });

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
                return fetch('<?= site_url('supervisor/usulan/alihkelolaptkis/recheck/' . encrypt($usulan->id)) ?>', {
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