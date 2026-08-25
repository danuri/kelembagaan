/**
 *  Form Wizard
 */

'use strict';

(function () {
  const select2 = $('.select2');

  // Wizard Validation
  // --------------------------------------------------------------------
  const wizardValidation = document.querySelector('#wizard-validation');
  if (typeof wizardValidation !== undefined && wizardValidation !== null) {
    // Wizard form
    const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
    // Wizard steps
    const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
    const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info-validation');
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#social-links-validation');
    // Wizard next prev button
    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardValidation, {
      linear: true
    });

    // Account details
    const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
      fields: {
        yayasan_nama: {
          validators: {
            notEmpty: {
              message: 'Nama Yayasan harus diisi'
            }
          }
        },
        yayasan_alamat: {
          validators: {
            notEmpty: {
              message: 'Alamat Yayasan harus diisi'
            }
          }
        },
        yayasan_nosk: {
          validators: {
            notEmpty: {
              message: 'No. SK harus diisi'
            }
          }
        },
        yayasan_tglsk: {
          validators: {
            notEmpty: {
              message: 'Tanggal SK harus diisi'
            }
          }
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          //* Move the error message out of the `input-group` element
          if (e.element.parentElement.classList.contains('input-group')) {
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      // Post data with axios;
      axios.post(siteurl + '/layanan/pendirianptkis/updateform1', {
          usul_id: $('#usul_id').val(),
          yayasan_nama: $('#yayasan_nama').val(),
          yayasan_alamat: $('#yayasan_alamat').val(),
          yayasan_nosk: $('#yayasan_nosk').val(),
          yayasan_tglsk: $('#yayasan_tglsk').val()
        })
        .then(response => {
          console.log(response.data);
          validationStepper.next();
        })
        .catch(error => {
          console.error(error);
        });
    });

    // Personal info
    const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
      fields: {
        nama_lembaga: {
          validators: {
            notEmpty: {
              message: 'Nama Lembaga harus diisi'
            }
          }
        },
        kategori: {
          validators: {
            notEmpty: {
              message: 'Kategori harus diisi'
            }
          }
        },
        jenjang: {
          validators: {
            notEmpty: {
              message: 'Jenjang harus diisi'
            }
          }
        },
        kopertais: {
          validators: {
            notEmpty: {
              message: 'Kopertais harus diisi'
            }
          }
        },
        telepon: {
          validators: {
            notEmpty: {
              message: 'No. Telepon harus diisi'
            }
          }
        },
        no_hp: {
          validators: {
            notEmpty: {
              message: 'No. HP harus diisi'
            }
          }
        },
        provinsi: {
          validators: {
            notEmpty: {
              message: 'Provinsi harus diisi'
            }
          }
        },
        kabupaten: {
          validators: {
            notEmpty: {
              message: 'Kabupaten harus diisi'
            }
          }
        },
        kecamatan: {
          validators: {
            notEmpty: {
              message: 'Kecamatan harus diisi'
            }
          }
        },
        kelurahan: {
          validators: {
            notEmpty: {
              message: 'Kelurahan harus diisi'
            }
          }
        },
        kode_pos: {
          validators: {
            notEmpty: {
              message: 'Kode Pos harus diisi'
            }
          }
        },
        jalan: {
          validators: {
            notEmpty: {
              message: 'Jalan harus diisi'
            }
          }
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      // validationStepper.next();
      axios.post(siteurl + '/layanan/pendirianptkis/updateform2', {
          nama_lembaga: $('#nama_lembaga').val(),
          kategori: $('#kategori').val(),
          jenjang: $('#jenjang').val(),
          kopertais: $('#kopertais').val(),
          telepon: $('#telepon').val(),
          no_hp: $('#no_hp').val(),
          provinsi: $('#provinsi').val(),
          kabupaten: $('#kabupaten').val(),
          kecamatan: $('#kecamatan').val(),
          kelurahan: $('#kelurahan').val(),
          kode_pos: $('#kode_pos').val(),
          jalan: $('#jalan').val(),
          usul_id: $('#usul_id').val()
        })
        .then(response => {
          console.log(response.data);
          validationStepper.next();
        })
        .catch(error => {
          console.error(error);
        });
    });

    // Bootstrap Select (i.e Language select)
    // if (selectPicker.length) {
    //   selectPicker.each(function () {
    //     var $this = $(this);
    //     $this.selectpicker().on('change', function () {
    //       FormValidation2.revalidateField('formValidationLanguage');
    //     });
    //   });
    // }

    // select2
    // if (select2.length) {
    //   select2.each(function () {
    //     var $this = $(this);
    //     $this.wrap('<div class="position-relative"></div>');
    //     $this
    //       .select2({
    //         placeholder: 'Select an country',
    //         dropdownParent: $this.parent()
    //       })
    //       .on('change', function () {
    //         // Revalidate the color field when an option is chosen
    //         FormValidation2.revalidateField('formValidationCountry');
    //       });
    //   });
    // }

    // Social links
    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
      fields: {
        formValidationTwitter: {
          validators: {
            notEmpty: {
              message: 'The Twitter URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        },
        formValidationFacebook: {
          validators: {
            notEmpty: {
              message: 'The Facebook URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        },
        formValidationGoogle: {
          validators: {
            notEmpty: {
              message: 'The Google URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        },
        formValidationLinkedIn: {
          validators: {
            notEmpty: {
              message: 'The LinkedIn URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // You can submit the form
      // wizardValidationForm.submit()
      // or send the form data to server via an Ajax request
      // To make the demo simple, I just placed an alert
      alert('Submitted..!!');
    });

    wizardValidationNext.forEach(item => {
      item.addEventListener('click', event => {
        // When click the Next button, we will validate the current step
        switch (validationStepper._currentIndex) {
          case 0:
            FormValidation1.validate();
            break;

          case 1:
            FormValidation2.validate();
            break;

          case 2:
            FormValidation3.validate();
            break;

          default:
            break;
        }
      });
    });

    wizardValidationPrev.forEach(item => {
      item.addEventListener('click', event => {
        switch (validationStepper._currentIndex) {
          case 2:
            validationStepper.previous();
            break;

          case 1:
            validationStepper.previous();
            break;

          case 0:

          default:
            break;
        }
      });
    });
  }
})();

function getKabupaten(provinsiId) {
  // AJAX request
  $.ajax({
    url: siteurl + '/ajax/regencies/' + provinsiId,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      // Clear existing options
      $('#kabupaten').empty();
      $('#kecamatan').empty();
      $('#kelurahan').empty();
      $('#kabupaten').append('<option value="">Pilih Kabupaten</option>');
      $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
      $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

      // Populate new options
      $.each(response, function (index, kabupaten) {
        $('#kabupaten').append('<option value="' + kabupaten.id + '">' + kabupaten.name + '</option>');
      });
    },
    error: function (xhr, status, error) {
      console.error('Error fetching kabupaten:', error);
    }
  });
}

function getKecamatan(kabupatenId) {
  // AJAX request
  $.ajax({
    url: siteurl + '/ajax/districts/' + kabupatenId,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      // Clear existing options
      $('#kecamatan').empty();
      $('#kelurahan').empty();
      $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
      $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

      // Populate new options
      $.each(response, function (index, kecamatan) {
        $('#kecamatan').append('<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>');
      });
    },
    error: function (xhr, status, error) {
      console.error('Error fetching kecamatan:', error);
    }
  });
}

function getKelurahan(kecamatanId) {
  // AJAX request
  $.ajax({
    url: siteurl + '/ajax/villages/' + kecamatanId,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      // Clear existing options
      $('#kelurahan').empty();
      $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

      // Populate new options
      $.each(response, function (index, kelurahan) {
        $('#kelurahan').append('<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>');
      });
    },
    error: function (xhr, status, error) {
      console.error('Error fetching kelurahan:', error);
    }
  });
}
// Event listener for provinsi change
$('#provinsi').on('change', function () {
  const provinsiId = $(this).val();
  if (provinsiId) {
    getKabupaten(provinsiId);
  } else {
    $('#kabupaten').empty().append('<option value="">Pilih Kabupaten</option>');
    $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
    $('#kelurahan').empty().append('<option value="">Pilih Kelurahan</option>');
  }
});

// Event listener for kabupaten change
$('#kabupaten').on('change', function () {
  const kabupatenId = $(this).val();
  if (kabupatenId) {
    getKecamatan(kabupatenId);
  } else {
    $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
    $('#kelurahan').empty().append('<option value="">Pilih Kelurahan</option>');
  }
});

// Event listener for kecamatan change
$('#kecamatan').on('change', function () {
  const kecamatanId = $(this).val();
  if (kecamatanId) {
    getKelurahan(kecamatanId);
  } else {
    $('#kelurahan').empty().append('<option value="">Pilih Kelurahan</option>');
  }
});

function confirmSubmit() {
  // 1. Validasi Langkah 1 (Data Yayasan)
  const yayasanNama = $('#yayasan_nama').val() ? $('#yayasan_nama').val().trim() : '';
  const yayasanAlamat = $('#yayasan_alamat').val() ? $('#yayasan_alamat').val().trim() : '';
  const yayasanNosk = $('#yayasan_nosk').val() ? $('#yayasan_nosk').val().trim() : '';
  const yayasanTglsk = $('#yayasan_tglsk').val() ? $('#yayasan_tglsk').val().trim() : '';

  if (!yayasanNama || !yayasanAlamat || !yayasanNosk || !yayasanTglsk) {
    Swal.fire({
      icon: 'error',
      title: 'Data Pemohon Belum Lengkap',
      text: 'Mohon lengkapi seluruh kolom pada Langkah 1 (Data Pemohon Yayasan).'
    });
    return;
  }

  // 2. Validasi Langkah 2 (Data Lembaga)
  const namaLembaga = $('#nama_lembaga').val() ? $('#nama_lembaga').val().trim() : '';
  const kategori = $('#kategori').val() ? $('#kategori').val().trim() : '';
  const jenjang = $('#jenjang').val() ? $('#jenjang').val().trim() : '';
  const kopertais = $('#kopertais').val() ? $('#kopertais').val().trim() : '';
  const telepon = $('#telepon').val() ? $('#telepon').val().trim() : '';
  const noHp = $('#no_hp').val() ? $('#no_hp').val().trim() : '';
  const provinsi = $('#provinsi').val() ? $('#provinsi').val().trim() : '';
  const kabupaten = $('#kabupaten').val() ? $('#kabupaten').val().trim() : '';
  const kecamatan = $('#kecamatan').val() ? $('#kecamatan').val().trim() : '';
  const kelurahan = $('#kelurahan').val() ? $('#kelurahan').val().trim() : '';
  const kodePos = $('#kode_pos').val() ? $('#kode_pos').val().trim() : '';
  const jalan = $('#jalan').val() ? $('#jalan').val().trim() : '';

  if (!namaLembaga || !kategori || !jenjang || !kopertais || !telepon || !noHp || !provinsi || !kabupaten || !kecamatan || !kelurahan || !kodePos || !jalan) {
    Swal.fire({
      icon: 'error',
      title: 'Informasi Lembaga Belum Lengkap',
      text: 'Mohon lengkapi seluruh kolom Informasi Lembaga & Alamat pada Langkah 2.'
    });
    return;
  }

  // 3. Validasi Program Studi (Minimal 1 Prodi)
  if (typeof totalProdiAdded !== 'undefined' && totalProdiAdded < 1) {
    Swal.fire({
      icon: 'error',
      title: 'Program Studi Belum Ditambahkan',
      text: 'Usulan wajib memiliki minimal 1 (satu) Program Studi. Silahkan klik tombol "Kelola Prodi" pada Langkah 2.'
    });
    return;
  }

  // 4. Validasi Dokumen Persyaratan (Semua Dokumen Harus Diunggah)
  let unuploadedDocs = 0;
  $('.badge-doc-status').each(function () {
    if ($(this).text().trim() !== 'Sudah Diunggah') {
      unuploadedDocs++;
    }
  });

  if (unuploadedDocs > 0) {
    Swal.fire({
      icon: 'error',
      title: 'Dokumen Persyaratan Belum Lengkap',
      text: 'Terdapat ' + unuploadedDocs + ' dokumen yang belum diunggah. Mohon pastikan seluruh dokumen berstatus "Sudah Diunggah" sebelum submit.'
    });
    return;
  }

  // 5. Konfirmasi Kirim Usulan jika semua syarat terpenuhi
  Swal.fire({
    title: 'Kirim Usulan Pendirian PTKIS?',
    text: "Pastikan semua data dan dokumen sudah sesuai. Setelah dikirim, Anda tidak dapat mengubah data usulan kembali!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya, Kirim Usulan!',
    cancelButtonText: 'Batal',
    customClass: {
      confirmButton: 'btn btn-primary me-2',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  }).then(function (result) {
    if (result.value) {
      axios.post(siteurl + '/layanan/pendirianptkis/submitusul', {
        usul_id: $('#usul_id').val()
      })
      .then(response => {
        if (response.data.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil Dikirim!',
            text: response.data.message || 'Usulan Anda telah berhasil dikirim ke Kemenag RI.',
            customClass: {
              confirmButton: 'btn btn-success waves-effect waves-light'
            }
          }).then(() => { 
            window.location.href = siteurl + '/layanan/pendirianptkis'; 
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal Submit',
            text: response.data.message || 'Terjadi kesalahan saat memproses usulan.',
            customClass: {
              confirmButton: 'btn btn-primary waves-effect waves-light'
            }
          });
        }
      })
      .catch(error => {
        console.error(error);
        Swal.fire({
          icon: 'error',
          title: 'Kesalahan Server',
          text: 'Gagal menghubungi server. Silahkan coba beberapa saat lagi.'
        });
      });
    }
  });
}

/**
 * Template Name: Sneat - Bootstrap 5 HTML Admin Template
 */