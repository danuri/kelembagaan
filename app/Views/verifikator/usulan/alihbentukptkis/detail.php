<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<div
    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Detail Usulan</h4>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <button class="btn btn-label-secondary waves-effect">Kembali</button>
            <a href="<?= site_url('export/reportalihbentukptkis/' . encrypt($usulan->id)) ?>"
                class="btn btn-label-primary waves-effect" target="_blank">Export</a>
        </div>
        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="declined()">Tolak
            Usulan</button>
        <button type="button" class="btn btn-success waves-effect waves-light" onclick="accept()">Terima Usulan</button>
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
    <div class="col-sm-12">
        <div class="nav-align-top">
            <ul class="nav nav-pills mb-4" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                        Dokumen
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                        aria-selected="false">
                        Penilaian Statistik
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-instumen" aria-controls="navs-pills-instumen" aria-selected="false">
                        Instrumen Penilaian
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
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
                                        <?php if ($dokumen->lampiran) { ?>
                                            <input type="checkbox" class="form-check-input formcheck"
                                                id="<?= $dokumen->usul_dokumen_id; ?>"
                                                <?= ($dokumen->dok_status == 1) ? 'checked' : ''; ?> value="1">

                        </div>
                    <?php } ?>
                    </td>
                    <td>
                        <select name="keterangan_dokumen[<?= $dokumen->usul_dokumen_id ?>]"
                            id="keterangan_dokumen<?= $dokumen->usul_dokumen_id ?>"
                            data-dok="<?= $dokumen->usul_dokumen_id ?>" class="form-select form-select-sm keterangancheck">
                            <option value=""></option>
                            <option value="Berkas Tidak Sesuai" <?= ($dokumen->keterangan == 'Berkas Tidak Sesuai') ? 'selected' : ''; ?>>Berkas Tidak Sesuai</option>
                            <option value="Berkas Tidak Asli" <?= ($dokumen->keterangan == 'Berkas Tidak Asli') ? 'selected' : ''; ?>>Berkas Tidak Asli</option>
                        </select>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                <form method="POST"
                    action="<?= site_url('verifikator/usulan/alihbentukptkis/updatecatatan/' . encrypt($usulan->id)) ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="magister">Item</label>
                                        <div class="col-sm-3">
                                            Data Verifikator
                                        </div>
                                        <div class="col-sm-3">
                                            Data Kampus
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="magister">Jumlah Magister</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="magister" name="magister"
                                                value="<?= $detail->magister ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="magister2" name="magister2"
                                                value="<?= $detail->magister2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="doktor">Jumlah Doktor</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="doktor" name="doktor"
                                                value="<?= $detail->doktor ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="doktor2" name="doktor2"
                                                value="<?= $detail->doktor2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="asisten_ahli">Jumlah Asisten
                                            Ahli</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="asisten_ahli"
                                                name="asisten_ahli" value="<?= $detail->asisten_ahli ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="asisten_ahli2"
                                                name="asisten_ahli2" value="<?= $detail->asisten_ahli2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="lektor">Jumlah Lektor</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="lektor" name="lektor"
                                                value="<?= $detail->lektor ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="lektor2" name="lektor2"
                                                value="<?= $detail->lektor2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="lektor_kepala">Jumlah Lektor
                                            Kepala</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="lektor_kepala"
                                                name="lektor_kepala" value="<?= $detail->lektor_kepala ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="lektor_kepala2"
                                                name="lektor_kepala2" value="<?= $detail->lektor_kepala2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="guru_besar">Jumlah Guru
                                            Besar</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="guru_besar" name="guru_besar"
                                                value="<?= $detail->guru_besar ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="guru_besar2" name="guru_besar2"
                                                value="<?= $detail->guru_besar2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="mahasiswa">Jumlah Mahasiswa</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="mahasiswa" name="mahasiswa"
                                                value="<?= $detail->mahasiswa ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="mahasiswa2" name="mahasiswa2"
                                                value="<?= $detail->mahasiswa2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="rasio_dm">Jumlah Rasio
                                            Dosen:Mahasiswa</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="rasio_dm" name="rasio_dm"
                                                value="<?= $detail->rasio_dm ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="rasio_dm2" name="rasio_dm2"
                                                value="<?= $detail->rasio_dm2 ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="akreditasi_no">Prodi Tidak
                                            Terakreditasi</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_no"
                                                name="akreditasi_no" value="<?= $detail->akreditasi_no ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_no2"
                                                name="akreditasi_no2" value="<?= $detail->akreditasi_no2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="akreditasi_unggul">Jumlah Prodi
                                            Terakreditasi Unggul/A</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_unggul"
                                                name="akreditasi_unggul" value="<?= $detail->akreditasi_unggul ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_unggul2"
                                                name="akreditasi_unggul2" value="<?= $detail->akreditasi_unggul2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="akreditasi_baiksekali">Jumlah Prodi
                                            Terakreditasi Baik Sekali/B</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_baiksekali"
                                                name="akreditasi_baiksekali"
                                                value="<?= $detail->akreditasi_baiksekali ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_baiksekali2"
                                                name="akreditasi_baiksekali2"
                                                value="<?= $detail->akreditasi_baiksekali2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="akreditasi_baik">Jumlah Prodi
                                            Terakreditasi Baik</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_baik"
                                                name="akreditasi_baik" value="<?= $detail->akreditasi_baik ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="akreditasi_baik2"
                                                name="akreditasi_baik2" value="<?= $detail->akreditasi_baik2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="fakultas">Jumlah Fakultas</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="fakultas" name="fakultas"
                                                value="<?= $detail->lektor_kepala ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="fakultas2" name="fakultas2"
                                                value="<?= $detail->lektor_kepala2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="prodi">Jumlah Prodi</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="prodi" name="prodi"
                                                value="<?= $detail->prodi ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="prodi2" name="prodi2"
                                                value="<?= $detail->prodi2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="pelaporan">Pelaporan PD Dikti
                                            (Contoh: 1-100)</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="pelaporan" name="pelaporan"
                                                value="<?= $detail->pelaporan ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="pelaporan2" name="pelaporan2"
                                                value="<?= $detail->pelaporan2 ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="kepemilikan_tanah">Kepemilikan
                                            Tanah</label>
                                        <div class="col-sm-3">
                                            <select name="kepemilikan_tanah" id="kepemilikan_tanah" class="form-select">
                                                <option value="Perorangan"
                                                    <?= ($detail->kepemilikan_tanah == 'Perorangan') ? 'selected' : ''; ?>>
                                                    Perorangan</option>
                                                <option value="Yayasan" <?= ($detail->kepemilikan_tanah == 'Yayasan') ? 'selected' : ''; ?>>Yayasan</option>
                                                <option value="Sewa" <?= ($detail->kepemilikan_tanah == 'Sewa') ? 'selected' : ''; ?>>Sewa</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="kepemilikan_tanah2" id="kepemilikan_tanah2"
                                                class="form-select">
                                                <option value="Perorangan" <?= ($detail->kepemilikan_tanah2 == 'Perorangan') ? 'selected' : ''; ?>>Perorangan</option>
                                                <option value="Yayasan" <?= ($detail->kepemilikan_tanah2 == 'Yayasan') ? 'selected' : ''; ?>>Yayasan</option>
                                                <option value="Sewa" <?= ($detail->kepemilikan_tanah2 == 'Sewa') ? 'selected' : ''; ?>>Sewa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-6 col-form-label" for="rasio_dm">Luas Tanah</label>
                                        <div class="col-sm-3">
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="tanah" name="tanah" class="form-control"
                                                    aria-describedby="basic-tanah" value="<?= $detail->tanah ?>" />
                                                <span class="input-group-text" id="basic-tanah">M²</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="tanah2" name="tanah2" class="form-control"
                                                    aria-describedby="basic-tanah" value="<?= $detail->tanah2 ?>" />
                                                <span class="input-group-text" id="basic-tanah">M²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <textarea name="catatan" id="catatan" class="form-control"
                                            rows="4"><?= $detail->catatan ?></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="navs-pills-instumen" role="tabpanel">
                <h5 class="mb-4">Instrumen Penilaian Verifikator</h5>
                <p>Download template <a href="<?= base_url('template/template_instrumen_alihbentuk.xlsx') ?>"
                        class="btn btn-sm btn-primary">di sini</a></p>
                <form action="<?= site_url('verifikator/usulan/alihbentukptkis/upnilai/' . encrypt($detail->id)) ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="mb-6">
                        <input type="file" name="lampiran" id="lampiran" class="form-control">
                        <?= ($detail->nilai) ? '<a href="' . base_url('uploads/nilai/' . $detail->nilai) . '" target="_blank">' . $detail->nilai . '</a>' : 'Belum unggah'; ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
    $(document).ready(function () {
        $('.formcheck').change(function (event) {
            if (this.checked) {
                $.get('<?= site_url('verifikator/usulan/alihbentukptkis/validasidokumen'); ?>/' + this.id + '/1/0', function () {
                    alert('Berkas divalidasi');
                });
            } else {
                $.get('<?= site_url('verifikator/usulan/alihbentukptkis/validasidokumen'); ?>/' + this.id + '/0/' + $('#keterangan_dokumen' + this.id).val(), function () {
                    alert('Berkas belum divalidasi');
                });
            }
        });
        $('.keterangancheck').change(function (event) {
            if (this.value) {
                $.get('<?= site_url('verifikator/usulan/alihbentukptkis/validasidokumen'); ?>/' + this.dataset.dok + '/0/' + this.value, function () {
                    alert('Update keterangan berhasil');
                });
                // uncheck checkbox
                $('#' + this.dataset.dok).prop('checked', false);
            }
        });
    });

    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#previewfile').attr('href', berkas);
        $('#preview').modal('show');
    }

    function declined() {
        Swal.fire({
            text: 'Masukan informasi Penolakan!',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Kembalikan Berkas',
            showLoaderOnConfirm: true,
            preConfirm: (data) => {
                return fetch('<?= site_url('verifikator/usulan/alihbentukptkis/decline/' . encrypt($usulan->id)) ?>', {
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
                // redirect to verifikator/usulan
                window.location.href = '<?= site_url('verifikator/usulan') ?>';
            }
        });
    }

    function accept() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah diverifikasi tidak dapat diubah kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Terima Usulan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // redirect to verifikator/usulan/alihbentukptkis/accept/id
                window.location.href = '<?= site_url('verifikator/usulan/alihbentukptkis/accept/' . encrypt($usulan->id)) ?>';
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