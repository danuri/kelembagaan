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
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#document-validation');
    // Wizard next prev button
    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardValidation, {
      linear: true
    });

    // Account details
    const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
      fields: {
        nomor_surat: {
          validators: {
            notEmpty: {
              message: 'Nomor Surat harus diisi'
            }
          }
        },
        nama_lembaga: {
          validators: {
            notEmpty: {
              message: 'Nama Lembaga harus diisi'
            }
          }
        },
        nama_lembaga_baru: {
          validators: {
            notEmpty: {
              message: 'Nama Lembaga Baru harus diisi'
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
      axios.post(siteurl + '/layanan/alihbentukptkis/updateform1', {
          usul_id: $('#usul_id').val(),
          nomor_surat: $('#nomor_surat').val(),
          perihal: $('#perihal').val(),
          nama_lembaga: $('#nama_lembaga').val(),
          alamat_lembaga: $('#alamat_lembaga').val(),
          nama_lembaga_baru: $('#nama_lembaga_baru').val(),
          kategori: $('#kategori').val(),
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
        magister: {
          validators: {
            notEmpty: {
              message: 'Jumlah Magister harus diisi'
            }
          }
        },
        doktor: {
          validators: {
            notEmpty: {
                message: 'Jumlah Doktor harus diisi'
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
      axios.post(siteurl + '/layanan/alihbentukptkis/updateform2', {
          usul_id: $('#usul_id').val(),
          magister: $('#magister').val(),
          doktor: $('#doktor').val(),
          asisten_ahli: $('#asisten_ahli').val(),
          lektor: $('#lektor').val(),
          lektor_kepala: $('#lektor_kepala').val(),
          guru_besar: $('#guru_besar').val(),
          akreditasi_no: $('#akreditasi_no').val(),
          akreditasi_unggul: $('#akreditasi_unggul').val(),
          akreditasi_baiksekali: $('#akreditasi_baiksekali').val(),
          akreditasi_baik: $('#akreditasi_baik').val(),
          mahasiswa: $('#mahasiswa').val(),
          rasio_dm: $('#rasio_dm').val(),
          fakultas: $('#fakultas').val(),
          prodi: $('#prodi').val(),
          pelaporan: $('#pelaporan').val(),
          tanah: $('#tanah').val(),
          kepemilikan_tanah: $('#kepemilikan_tanah').val(),

        })
        .then(response => {
          console.log(response.data);
          validationStepper.next();
        })
        .catch(error => {
          console.error(error);
        });
    });

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
    url: '/ajax/regencies/' + provinsiId,
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
    url: '/ajax/districts/' + kabupatenId,
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
    url: '/ajax/villages/' + kecamatanId,
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
  Swal.fire({
        title: 'Usulan akan dikirim ke Kemenag?',
        text: "Pastikan semua data sudah sesuai.Anda tidak dapat mengubah kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, kirim!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          // Submit the form
          // document.getElementById("wizard-validation-form").submit();
          axios.post(siteurl + '/layanan/alihbentukptkis/submitusul', {
              usul_id: $('#usul_id').val()
            })
            .then(response => {
              console.log(response.data);
              // Redirect or show success message
              // window.location.href = '/some-success-page';
              Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Usulan Anda telah dikirim.',
                customClass: {
                  confirmButton: 'btn btn-success waves-effect waves-light'
                }
              })
              .then(() => { window.location.href = siteurl + '/layanan/alihbentukptkis'; });
            })
            .catch(error => {
              console.error(error);
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your imaginary file is safe :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success waves-effect waves-light'
            }
          });
        }
      });
}

/**
 * Template Name: Sneat - Bootstrap 5 HTML Admin Template
 */