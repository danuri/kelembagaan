<?= $this->extend('user/template2') ?>
<?= $this->section('content') ?>

<h4 class="mb-1">
    Detail Usulan Alih Bentuk PTKIS
</h4>
<div class="card shadow-none bg-label-success mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nomor Surat</h6>
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
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal Usul</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->submit_at ?></div>
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
            </div>
        </div>
    </div>
</div>
<div class="nav-align-top nav-tabs-shadow">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-top-data" aria-controls="navs-top-data" aria-selected="true">
                Data Pengusul
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-lembaga"
                aria-controls="navs-top-data" aria-selected="true">
                Data Lembaga
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-dokumen"
                aria-controls="navs-top-dokumen" aria-selected="false">
                Dokumen
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-top-data" role="tabpanel">

            <div class="row g-6">
                <div class="col-sm-6">
                    <div class="mb-3 form-control-validation">
                        <label class="form-label" for="nama_lembaga">Nama Lembaga</label>
                        <input type="text" id="nama_lembaga" name="nama_lembaga" class="form-control"
                            value="<?= $detail->nama_lembaga ?>" disabled />
                    </div>

                    <div class="mb-3 form-control-validation">
                        <label class="form-label" for="kategori">Kategori</label>
                        <select class="form-select select2" id="kategori" name="kategori" disabled>
                            <?php if ($detail->kategori): ?>
                                <option value="<?= $detail->kategori ?>" selected><?= $detail->kategori ?></option>
                            <?php endif; ?>
                            <option label=" "></option>
                            <option value="SEKOLAH TINGGI" <?= $detail->kategori === 'SEKOLAH TINGGI' ? 'selected' : '' ?>>
                                SEKOLAH TINGGI</option>
                            <option value="INSTITUT" <?= $detail->kategori === 'INSTITUT' ? 'selected' : '' ?>>INSTITUT
                            </option>
                            <option value="UNIVERSITAS" <?= $detail->kategori === 'UNIVERSITAS' ? 'selected' : '' ?>>
                                UNIVERSITAS</option>
                            <option value="FAKULTAS AGAMA ISLAM" <?= $detail->kategori === 'FAKULTAS AGAMA ISLAM' ? 'selected' : '' ?>>FAKULTAS AGAMA ISLAM</option>
                        </select>
                    </div>

                    <div class="mb-3 form-control-validation">
                        <label class="form-label" for="jenjang">Jenjang</label>
                        <select class="form-select select2" id="jenjang" name="jenjang" disabled>
                            <option label=" "></option>
                            <option value="S1" <?= $detail->jenjang === 'S1' ? 'selected' : '' ?>>S1</option>
                            <option value="S2" <?= $detail->jenjang === 'S2' ? 'selected' : '' ?>>S2</option>
                            <option value="S3" <?= $detail->jenjang === 'S3' ? 'selected' : '' ?>>S3</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="navs-top-lembaga" role="tabpanel">


        </div>
        <div class="tab-pane fade" id="navs-top-dokumen" role="tabpanel">
            <div class="row g-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Dokumen</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dokumens as $dokumen): ?>
                            <tr>
                                <td><?= $dokumen->dokumen ?></td>
                                <td>
                                    <?php if ($dokumen->lampiran): ?>
                                        <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2"
                                            onclick="preview('<?= base_url('uploads/' . $dokumen->lampiran) ?>')">View</button>
                                    <?php else: ?>
                                        <button class="btn btn-outline-primary waves-effect" type="button"
                                            id="btn<?= $dokumen->id ?>" onclick="" disabled>View</button>
                                    <?php endif; ?>
                                </td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

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
<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>
    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#preview').modal('show');
    }
</script>
<?= $this->endSection() ?>