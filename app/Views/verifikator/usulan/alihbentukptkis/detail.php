<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <button class="btn btn-label-secondary waves-effect">Kembali</button>
    </div>
    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="declined()">Tolak Usulan</button>
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
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->nomor_surat?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Perihal</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->perihal?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Status Usulan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= usul_status($usulan->status)?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Keterangan BTS/TMS</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->keterangan?></div>
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
    <div class="col-sm-6">
        <div class="card mb-3">
    <div class="card-body">
        
        <h5 class="mb-4">Catatan Verifikator</h5>
        <form action="<?= site_url('verifikator/usulan/alihbentukptkis/updatecatatan/'.encrypt($usulan->id))?>" method="POST">
            <div class="mb-6">
                <textarea name="catatan" id="catatan" class="form-control" rows="4"><?= $detail->catatan ?></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
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
                                    <?php foreach($dokumens as $dokumen): ?>
                                    <tr>
                                        <td>
                                            <?php if($dokumen->lampiran): ?>
                                                <a href="javascript:;" onclick="preview('<?= base_url('uploads/'.$dokumen->lampiran) ?>')"><?= $dokumen->dokumen ?></a>
                                            <?php else: ?>
                                                <?= $dokumen->dokumen ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($dokumen->lampiran){?>
                                                <input type="checkbox" class="form-check-input formcheck" id="<?= $dokumen->usul_dokumen_id;?>" <?= ($dokumen->dok_status == 1)?'checked':'';?> value="1">
                                                
                                            </div>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <select name="keterangan_dokumen[<?= $dokumen->usul_dokumen_id ?>]" id="keterangan_dokumen<?= $dokumen->usul_dokumen_id ?>" data-dok="<?= $dokumen->usul_dokumen_id ?>" class="form-select form-select-sm keterangancheck">
                                                <option value=""></option>
                                                <option value="Berkas Tidak Sesuai" <?= ($dokumen->keterangan == 'Berkas Tidak Sesuai')?'selected':'';?>>Berkas Tidak Sesuai</option>
                                                <option value="Berkas Tidak Asli" <?= ($dokumen->keterangan == 'Berkas Tidak Asli')?'selected':'';?>>Berkas Tidak Asli</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
        </div>
    </div>
</div>


<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
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
<?= $this->section('scripts');?>
<script>
$(document).ready(function() {
    $('.formcheck').change(function(event) {
        if(this.checked) {
            $.get('<?= site_url('verifikator/usulan/alihbentukptkis/validasidokumen');?>/'+this.id+'/1/0', function() {
            alert('Berkas divalidasi');
            });
        }else{
            $.get('<?= site_url('verifikator/usulan/alihbentukptkis/validasidokumen');?>/'+this.id+'/0/'+$('#keterangan_dokumen'+this.id).val(), function() {
            alert('Berkas belum divalidasi');
            });
        }
    });
    $('.keterangancheck').change(function(event) {
        if(this.value) {
            $.get('<?= site_url('verifikator/usulan/alihbentukptkis/validasidokumen');?>/'+this.dataset.dok+'/0/'+this.value, function() {
                alert('Update keterangan berhasil');
            });
            // uncheck checkbox
            $('#'+this.dataset.dok).prop('checked', false);
        }
    });
});

function preview(berkas) {
  $('#object').html('<object data="'+berkas+'" type="application/pdf" width="100%" style="height: 80vh;" id="object">'+
                      '<p>Browser tidak mendukung!</p>'+
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
      return fetch('<?= site_url('verifikator/usulan/alihbentukptkis/decline/'.encrypt($usulan->id)) ?>', {
        method: "POST",
        body: JSON.stringify({ keterangan: data }),
        headers: {"Content-type": "application/json; charset=UTF-8"}})
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
        window.location.href = '<?= site_url('verifikator/usulan/alihbentukptkis/accept/'.encrypt($usulan->id)) ?>';
      }
    });
  }

  function showdoc(layanan, usulid) {
        $('#lisdoc').html('<div class="text-center"><i class="bx bx-loader bx-spin font-size-24"></i></div>');
        $('#lisdoc').load('<?= site_url('dokumen/verifikasi/') ?>' + layanan + '/' + usulid, function() {
            $('#canvasDoc').offcanvas('show');
        });
    }
</script>
<?= $this->endSection() ?>