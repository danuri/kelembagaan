<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    <p class="mb-0">Orders placed across your store</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <button class="btn btn-label-secondary waves-effect">Kembali</button>
    </div>
    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="declined()">Tolak Usulan</button>
    <button type="button" class="btn btn-success waves-effect waves-light" onclick="accept()">Terima Usulan</button>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Alamat Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_alamat?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>No. SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nosk?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_tglsk?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row g-6">
    <div class="col-sm-5">
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
                    <td>: <?= $detail->provinsi ?></td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td>: <?= $detail->kab_kota ?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>: <?= $detail->kecamatan ?></td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>: <?= $detail->kelurahan ?></td>
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
</div>
    <div class="col-sm-7">
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



<div class="card mb-3">
    <div class="card-body">
        asdasd
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
            $.get('<?= site_url('verifikator/usulan/validasidokumen');?>/'+this.id+'/1/0', function() {
            alert('Berkas divalidasi');
            });
        }else{
            $.get('<?= site_url('verifikator/usulan/validasidokumen');?>/'+this.id+'/0/'+$('#keterangan_dokumen'+this.id).val(), function() {
            alert('Berkas belum divalidasi');
            });
        }
    });
    $('.keterangancheck').change(function(event) {
        if(this.value) {
            $.get('<?= site_url('verifikator/usulan/validasidokumen');?>/'+this.dataset.dok+'/0/'+this.value, function() {
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
      return fetch('<?= site_url('verifikator/usulan/decline/'.encrypt($usulan->id)) ?>', {
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
        // redirect to verifikator/usulan/accept/id
        window.location.href = '<?= site_url('verifikator/usulan/accept/'.encrypt($usulan->id)) ?>';
      }
    });
  }
</script>
<?= $this->endSection() ?>