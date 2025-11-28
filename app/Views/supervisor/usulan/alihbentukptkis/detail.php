<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Detail Usulan</h4>
        <!-- <p class="mb-0">Orders placed across your store</p> -->
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <button class="btn btn-label-secondary waves-effect">Kembali</button>
        </div>
        <button type="button" class="btn btn-success waves-effect waves-light" onclick="disposisi()">Disposisi</button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-none bg-label-success mb-3">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-align-top">
    <ul class="nav nav-pills mb-4" role="tablist">
        <li class="nav-item">
            <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-data"
                aria-controls="navs-pills-top-data"
                aria-selected="true">
                Data Lembaga
            </button>
        </li>
        <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-kma"
                aria-controls="navs-pills-top-kma"
                aria-selected="false">
                KMA
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-data" role="tabpanel">
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

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-6">
                        <div class="col-sm-6">
                            <h5>Data Dosen</h5>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Magister</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->magister ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Doktor</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->doktor ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Asisten Ahli</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->asisten_ahli ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Asisten Ahli</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->asisten_ahli ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Lektor</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->lektor ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Lektor Kepala</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->lektor_kepala ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Guru Besar</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->guru_besar ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="mahasiswa">Jumlah Mahasiswa</label>
                                <div class="col-sm-2">
                                    <input type="number" id="mahasiswa" name="mahasiswa" class="form-control" value="<?= $detail->mahasiswa ?>" disabled />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="rasio_dm">Jumlah Rasio Dosen:Mahasiswa (Contoh: 1:24)</label>
                                <div class="col-sm-2">
                                    <input type="text" id="rasio_dm" name="rasio_dm" class="form-control" value="<?= $detail->rasio_dm ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h5>Akreditasi</h5>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Tidak Terakreditasi</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->akreditasi_no ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Prodi Terakreditasi Unggul/A</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->akreditasi_unggul ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Prodi Terakreditasi Baik Sekali/B</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->akreditasi_baiksekali ?>" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="basic-default-name">Jumlah Prodi Terakreditasi Baik</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="basic-default-name" value="<?= $detail->akreditasi_baik ?>" disabled>
                                </div>
                            </div>

                            <h5>Data Lainnya</h5>

                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="fakultas">Jumlah Fakultas</label>
                                <div class="col-sm-2">
                                    <input type="number" id="fakultas" name="fakultas" class="form-control" value="<?= $detail->fakultas ?>" disabled />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="prodi">Jumlah Prodi</label>
                                <div class="col-sm-2">
                                    <input type="number" id="prodi" name="prodi" class="form-control" value="<?= $detail->prodi ?>" disabled />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-8 col-form-label" for="pelaporan">Pelaporan PD Dikti (Contoh: 1-100)</label>
                                <div class="col-sm-2">
                                    <input type="number" id="pelaporan" name="pelaporan" class="form-control" value="<?= $detail->pelaporan ?>" disabled />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-6 col-form-label" for="basic-default-name">Luas Tanah</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-describedby="basic-addon13" value="<?= $detail->tanah ?>" name="tanah" id="tanah" disabled />
                                        <span class="input-group-text" id="tanah">M²</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-sm-6 col-form-label" for="basic-default-name">Kepemilikan Tanah</label>
                                <div class="col-sm-6">
                                    <input type="number" id="kepemilikan_tanah" name="kepemilikan_tanah" class="form-control" value="<?= $detail->kepemilikan_tanah ?>" disabled />
                                </div>
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
                                                    <a href="javascript:;" onclick="preview('<?= base_url('uploads/' . $dokumen->lampiran) ?>')"><?= $dokumen->dokumen ?></a>
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
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-kma" role="tabpanel">
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0 me-2">Unggah KMA</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('supervisor/usulan/detail/kma/save/' . encrypt($usulan->id)) ?>" method="post" enctype="multipart/form-data">
                                <div class="row mb-6">
                                    <label class="col-sm-3 col-form-label" for="no_kma">No Keputusan</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="no_kma" name="no_kma" class="form-control" value="<?= $usulan->no_kma ?>" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-sm-3 col-form-label" for="tanggal_kma">Tanggal Keputusan</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="tgl_kma" name="tgl_kma" class="form-control" value="<?= $usulan->tgl_kma ?>" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-sm-3 col-form-label" for="lampiran">File Keputusan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="lampiran" name="lampiran" aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf" />
                                            <?php if ($usulan->file_kma): ?>
                                                <a class="btn btn-outline-primary" type="button" id="groupLampiran" href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank">Lihat</a>
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
</div>

<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
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

<div id="disposisi" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Disposisi Usulan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= site_url('supervisor/usulan/alihbentukptkis/disposisi/' . encrypt($usulan->id)) ?>">
                <div class="modal-body">
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Verifikator</label>
                        <select name="verifikator" id="verifikator" class="form-select">
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user->id ?>"><?= $user->full_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-message">Catatan</label>
                        <textarea id="catatan" name="catatan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.formcheck').change(function(event) {
            if (this.checked) {
                $.get('<?= site_url('verifikator/usulan/validasidokumen'); ?>/' + this.id + '/1/0', function() {
                    alert('Berkas divalidasi');
                });
            } else {
                $.get('<?= site_url('verifikator/usulan/validasidokumen'); ?>/' + this.id + '/0/' + $('#keterangan_dokumen' + this.id).val(), function() {
                    alert('Berkas belum divalidasi');
                });
            }
        });
        $('.keterangancheck').change(function(event) {
            if (this.value) {
                $.get('<?= site_url('verifikator/usulan/validasidokumen'); ?>/' + this.dataset.dok + '/0/' + this.value, function() {
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
        $('#preview').modal('show');
    }

    function disposisi() {
        $('#disposisi').modal('show');
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
                return fetch('<?= site_url('verifikator/usulan/decline/' . encrypt($usulan->id)) ?>', {
                        method: "POST",
                        body: JSON.stringify({
                            keterangan: data
                        }),
                        headers: {
                            "Content-type": "application/json; charset=UTF-8"
                        }
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
                // redirect to verifikator/usulan/accept/id
                window.location.href = '<?= site_url('verifikator/usulan/accept/' . encrypt($usulan->id)) ?>';
            }
        });
    }
</script>
<?= $this->endSection() ?>