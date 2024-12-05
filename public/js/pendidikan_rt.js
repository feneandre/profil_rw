$(document).ready(function() {
    let currentStep = 1;
    const totalSteps = 18;

    // Fungsi untuk validasi total persentase sarana
    function validateSarana() {
        const saranaPendidikan = parseFloat($('input[name="sarana_pendidikan"]').val()) || 0;
        const saranaOlahraga = parseFloat($('input[name="sarana_olahraga"]').val()) || 0;
        const saranaPariwisata = parseFloat($('input[name="sarana_pariwisata"]').val()) || 0;
        const tanahLapang = parseFloat($('input[name="tanah_lapang"]').val()) || 0;
        
        const totalPersen = saranaPendidikan + saranaOlahraga + saranaPariwisata + tanahLapang;
        
        if (totalPersen !== 100) {
            Swal.fire({
                icon: 'error',
                title: 'Total Persentase Harus 100%',
                text: `Total persentase saat ini: ${totalPersen}%`
            });
            return false;
        }
        return true;
    }

    // Fungsi hitung otomatis untuk tabel B
    function hitungTotalDemografi() {
        const jumlahLaki = parseInt($('#jumlah_laki').val()) || 0;
        const jumlahPerempuan = parseInt($('#jumlah_perempuan').val()) || 0;
        const totalPenduduk = jumlahLaki + jumlahPerempuan;
        
        // Update field total penduduk
        $('#jumlah_penduduk').val(totalPenduduk);
        
        // Update field di tabel C jika ada
        $('#sdm_laki').val(jumlahLaki);
        $('#sdm_perempuan').val(jumlahPerempuan);
        $('#sdm_kk').val($('#jumlah_kk').val());
        $('#sdm_total').val(totalPenduduk);
    }

    // Fungsi untuk menghitung total usia
    function hitungTotalUsia() {
        let totalLaki = 0;
        let totalPerempuan = 0;
        let totalPerBaris = 0;

        // Reset semua total per baris
        $('.total-per-usia').text('0');
        
        // Hitung total untuk setiap baris
        $('.usia-input').each(function() {
            let row = $(this).closest('tr');
            let laki = parseInt(row.find('input[name$="_l"]').val()) || 0;
            let perempuan = parseInt(row.find('input[name$="_p"]').val()) || 0;
            
            // Update total per baris
            totalPerBaris = laki + perempuan;
            row.find('.total-per-usia').text(totalPerBaris);
            
            // Tambahkan ke total keseluruhan
            if($(this).attr('name').endsWith('_l')) {
                totalLaki += laki;
            } else if($(this).attr('name').endsWith('_p')) {
                totalPerempuan += perempuan;
            }
        });

        // Update total di footer
        $('#total_laki_usia').text(totalLaki);
        $('#total_perempuan_usia').text(totalPerempuan);
        $('#total_penduduk_usia').text(totalLaki + totalPerempuan);
    }

    // Fungsi untuk menghitung total SDM
    function hitungTotalSDM() {
        // Mengambil nilai dari input di tabel B
        let jumlahLaki = parseInt($('input[name="jumlah_laki"]').val()) || 0;
        let jumlahPerempuan = parseInt($('input[name="jumlah_perempuan"]').val()) || 0;
        let jumlahKK = parseInt($('input[name="jumlah_kk"]').val()) || 0;
        
        // Update nilai di tabel C
        $('#sdm_laki').val(jumlahLaki);
        $('#sdm_perempuan').val(jumlahPerempuan);
        $('#sdm_kk').val(jumlahKK);
        $('#sdm_total').val(jumlahLaki + jumlahPerempuan);
    }

    // Fungsi untuk menghitung total pekerjaan
    function hitungTotalPekerjaan() {
        let totalLaki = 0;
        let totalPerempuan = 0;
        let totalPerBaris = 0;

        // Reset semua total per baris
        $('.total-per-pekerjaan').text('0');
        
        // Hitung total untuk setiap baris
        $('.pekerjaan-input').each(function() {
            let row = $(this).closest('tr');
            let laki = parseInt(row.find('input[name$="_l"]').val()) || 0;
            let perempuan = parseInt(row.find('input[name$="_p"]').val()) || 0;
            
            // Update total per baris
            totalPerBaris = laki + perempuan;
            row.find('.total-per-pekerjaan').text(totalPerBaris);
            
            // Tambahkan ke total keseluruhan
            if($(this).attr('name').endsWith('_l')) {
                totalLaki += laki;
            } else if($(this).attr('name').endsWith('_p')) {
                totalPerempuan += perempuan;
            }
        });

        // Update total di footer
        $('#total_laki_pekerjaan').text(totalLaki);
        $('#total_perempuan_pekerjaan').text(totalPerempuan);
        $('#total_pekerjaan').text(totalLaki + totalPerempuan);
    }

    // Fungsi untuk menghitung total agama
    function hitungTotalAgama() {
        let totalLaki = 0;
        let totalPerempuan = 0;
        let totalPerBaris = 0;

        // Reset semua total per baris
        $('.total-per-agama').text('0');
        
        // Hitung total untuk setiap baris
        $('.agama-input').each(function() {
            let row = $(this).closest('tr');
            let laki = parseInt(row.find('input[name$="_l"]').val()) || 0;
            let perempuan = parseInt(row.find('input[name$="_p"]').val()) || 0;
            
            // Update total per baris
            totalPerBaris = laki + perempuan;
            row.find('.total-per-agama').text(totalPerBaris);
            
            // Tambahkan ke total keseluruhan
            if($(this).attr('name').endsWith('_l')) {
                totalLaki += laki;
            } else if($(this).attr('name').endsWith('_p')) {
                totalPerempuan += perempuan;
            }
        });

        // Update total di footer
        $('#total_laki_agama').text(totalLaki);
        $('#total_perempuan_agama').text(totalPerempuan);
        $('#total_agama').text(totalLaki + totalPerempuan);
    }

    // Fungsi untuk menghitung total kewarganegaraan
    function hitungTotalWarga() {
        let totalLaki = 0;
        let totalPerempuan = 0;
        let totalPerBaris = 0;

        // Reset semua total per baris
        $('.total-per-warga').text('0');
        
        // Hitung total untuk setiap baris
        $('.warga-input').each(function() {
            let row = $(this).closest('tr');
            let laki = parseInt(row.find('input[name$="_l"]').val()) || 0;
            let perempuan = parseInt(row.find('input[name$="_p"]').val()) || 0;
            
            // Update total per baris
            totalPerBaris = laki + perempuan;
            row.find('.total-per-warga').text(totalPerBaris);
            
            // Tambahkan ke total keseluruhan
            if($(this).attr('name').endsWith('_l')) {
                totalLaki += laki;
            } else if($(this).attr('name').endsWith('_p')) {
                totalPerempuan += perempuan;
            }
        });

        // Update total di footer
        $('#total_laki_warga').text(totalLaki);
        $('#total_perempuan_warga').text(totalPerempuan);
        $('#total_warga').text(totalLaki + totalPerempuan);
    }

    // Fungsi untuk menghitung total cacat fisik
    function hitungTotalCacatFisik() {
        let totalLaki = 0;
        let totalPerempuan = 0;

        // Hitung total untuk cacat fisik
        $('input[name="tuna_rungu_l"], input[name="tuna_wicara_l"], input[name="tuna_netra_l"], input[name="lumpuh_l"], input[name="sumbing_l"]').each(function() {
            totalLaki += parseInt($(this).val()) || 0;
        });

        $('input[name="tuna_rungu_p"], input[name="tuna_wicara_p"], input[name="tuna_netra_p"], input[name="lumpuh_p"], input[name="sumbing_p"]').each(function() {
            totalPerempuan += parseInt($(this).val()) || 0;
        });

        // Update total di footer
        $('#total_laki_cacat_fisik').text(totalLaki);
        $('#total_perempuan_cacat_fisik').text(totalPerempuan);
    }

    // Fungsi untuk menghitung total cacat mental
    function hitungTotalCacatMental() {
        let totalLaki = 0;
        let totalPerempuan = 0;

        // Hitung total untuk cacat mental
        $('input[name="idiot_l"], input[name="gila_l"], input[name="stress_l"], input[name="autis_l"]').each(function() {
            totalLaki += parseInt($(this).val()) || 0;
        });

        $('input[name="idiot_p"], input[name="gila_p"], input[name="stress_p"], input[name="autis_p"]').each(function() {
            totalPerempuan += parseInt($(this).val()) || 0;
        });

        // Update total di footer
        $('#total_laki_cacat_mental').text(totalLaki);
        $('#total_perempuan_cacat_mental').text(totalPerempuan);
    }

    // Fungsi untuk menghitung total PAUD
    function hitungTotalPaud() {
        let totalSiswa = 0;
        let totalGuru = 0;

        $('#paud-table tbody tr').each(function() {
            let jumlahSiswa = parseInt($(this).find('input[name="jumlah_siswa_paud[]"]').val()) || 0;
            let jumlahGuru = parseInt($(this).find('input[name="jumlah_pengajar_paud[]"]').val()) || 0;
            
            totalSiswa += jumlahSiswa;
            totalGuru += jumlahGuru;
        });

        $('#total_siswa_paud').text(totalSiswa);
        $('#total_guru_paud').text(totalGuru);
    }

    // Fungsi untuk menghitung total TK
    function hitungTotalTk() {
        let totalSiswa = 0;
        let totalGuru = 0;

        $('#tk-table tbody tr').each(function() {
            let jumlahSiswa = parseInt($(this).find('input[name="jumlah_siswa_tk[]"]').val()) || 0;
            let jumlahGuru = parseInt($(this).find('input[name="jumlah_guru_tk[]"]').val()) || 0;
            
            totalSiswa += jumlahSiswa;
            totalGuru += jumlahGuru;
        });

        $('#total_siswa_tk').text(totalSiswa);
        $('#total_guru_tk').text(totalGuru);
    }

    // Fungsi untuk menghitung total SD
    function hitungTotalSd() {
        let totalSiswa = 0;
        let totalGuru = 0;

        $('#sd-table tbody tr').each(function() {
            let jumlahSiswa = parseInt($(this).find('input[name="jumlah_siswa_sd[]"]').val()) || 0;
            let jumlahGuru = parseInt($(this).find('input[name="jumlah_guru_sd[]"]').val()) || 0;
            
            totalSiswa += jumlahSiswa;
            totalGuru += jumlahGuru;
        });

        $('#total_siswa_sd').text(totalSiswa);
        $('#total_guru_sd').text(totalGuru);
    }

    // Fungsi untuk menghitung total SMP
    function hitungTotalSmp() {
        let totalSiswa = 0;
        let totalGuru = 0;

        $('#smp-table tbody tr').each(function() {
            let jumlahSiswa = parseInt($(this).find('input[name="jumlah_siswa_smp[]"]').val()) || 0;
            let jumlahGuru = parseInt($(this).find('input[name="jumlah_guru_smp[]"]').val()) || 0;
            
            totalSiswa += jumlahSiswa;
            totalGuru += jumlahGuru;
        });

        $('#total_siswa_smp').text(totalSiswa);
        $('#total_guru_smp').text(totalGuru);
    }

    // Event listener untuk input pada tabel B
    $('#jumlah_laki, #jumlah_perempuan, #jumlah_kk').on('input', function() {
        hitungTotalDemografi();
    });

    // Event listener untuk input usia
    $(document).on('input', '.usia-input', function() {
        hitungTotalUsia();
    });

    // Event listener untuk input di tabel B
    $('input[name="jumlah_laki"], input[name="jumlah_perempuan"], input[name="jumlah_kk"]').on('input', function() {
        hitungTotalSDM();
    });

    // Event listener untuk input pekerjaan
    $(document).on('input', '.pekerjaan-input', function() {
        hitungTotalPekerjaan();
    });

    // Event listener untuk input agama
    $(document).on('input', '.agama-input', function() {
        hitungTotalAgama();
    });

    // Event listener untuk input kewarganegaraan
    $(document).on('input', '.warga-input', function() {
        hitungTotalWarga();
    });

    // Event listener untuk input cacat fisik
    $(document).on('input', 'input[name$="_l"], input[name$="_p"]', function() {
        if ($(this).attr('name').match(/(tuna_rungu|tuna_wicara|tuna_netra|lumpuh|sumbing)_(l|p)/)) {
            hitungTotalCacatFisik();
        }
    });

    // Event listener untuk input cacat mental
    $(document).on('input', 'input[name$="_l"], input[name$="_p"]', function() {
        if ($(this).attr('name').match(/(idiot|gila|stress|autis)_(l|p)/)) {
            hitungTotalCacatMental();
        }
    });

    // Event listener untuk input PAUD
    $(document).on('input', 'input[name="jumlah_siswa_paud[]"], input[name="jumlah_pengajar_paud[]"]', function() {
        hitungTotalPaud();
    });

    // Event listener untuk input TK
    $(document).on('input', 'input[name="jumlah_siswa_tk[]"], input[name="jumlah_guru_tk[]"]', function() {
        hitungTotalTk();
    });

    // Event listener untuk input SD
    $(document).on('input', 'input[name="jumlah_siswa_sd[]"], input[name="jumlah_guru_sd[]"]', function() {
        hitungTotalSd();
    });

    // Event listener untuk input SMP
    $(document).on('input', 'input[name="jumlah_siswa_smp[]"], input[name="jumlah_guru_smp[]"]', function() {
        hitungTotalSmp();
    });

    // Event listener untuk tombol tambah PAUD
    $('#add-paud').on('click', function(e) {
        e.preventDefault(); // Mencegah default action
        let rowCount = $('#paud-table tbody tr').length + 1;
        let newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" name="nama_paud[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_paud[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_siswa_paud[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_pengajar_paud[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-paud">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#paud-table tbody').append(newRow);
        hitungTotalPaud();
    });

    // Event listener untuk tombol tambah TK
    $('#add-tk').on('click', function(e) {
        e.preventDefault();
        let rowCount = $('#tk-table tbody tr').length + 1;
        let newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" name="nama_tk[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_tk[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_siswa_tk[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_guru_tk[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-tk">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#tk-table tbody').append(newRow);
        hitungTotalTk();
    });

    // Event listener untuk tombol tambah SD
    $('#add-sd').on('click', function(e) {
        e.preventDefault();
        let rowCount = $('#sd-table tbody tr').length + 1;
        let newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" name="nama_sd[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_sd[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_siswa_sd[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_guru_sd[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-sd">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#sd-table tbody').append(newRow);
        hitungTotalSd();
    });

    // Event listener untuk tombol tambah SMP
    $('#add-smp').on('click', function(e) {
        e.preventDefault();
        let rowCount = $('#smp-table tbody tr').length + 1;
        let newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" name="nama_smp[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_smp[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_siswa_smp[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_guru_smp[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-smp">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#smp-table tbody').append(newRow);
        hitungTotalSmp();
    });

    // Event listener untuk tombol hapus PAUD
    $(document).on('click', '.remove-paud', function(e) {
        e.preventDefault(); // Mencegah default action
        if ($('#paud-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorPaud();
            hitungTotalPaud();
        } else {
            alert('Minimal harus ada satu data PAUD!');
        }
    });

    // Event listener untuk tombol hapus TK
    $(document).on('click', '.remove-tk', function(e) {
        e.preventDefault();
        if ($('#tk-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorTk();
            hitungTotalTk();
        } else {
            alert('Minimal harus ada satu data TK!');
        }
    });

    // Event listener untuk tombol hapus SD
    $(document).on('click', '.remove-sd', function(e) {
        e.preventDefault();
        if ($('#sd-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorSd();
            hitungTotalSd();
        } else {
            alert('Minimal harus ada satu data SD!');
        }
    });

    // Event listener untuk tombol hapus SMP
    $(document).on('click', '.remove-smp', function(e) {
        e.preventDefault();
        if ($('#smp-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorSmp();
            hitungTotalSmp();
        } else {
            alert('Minimal harus ada satu data SMP!');
        }
    });

    // Fungsi untuk update nomor urut PAUD
    function updateNomorPaud() {
        $('#paud-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi untuk update nomor urut TK
    function updateNomorTk() {
        $('#tk-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi untuk update nomor urut SD
    function updateNomorSd() {
        $('#sd-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi untuk update nomor urut SMP
    function updateNomorSmp() {
        $('#smp-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Event handler untuk tombol next
    $('.next-step').click(function() {
        if (currentStep === 2) { // Step 2 adalah Kondisi Geografis
            if (!validateSarana()) {
                return false;
            }
        }
        
        if (currentStep < totalSteps) {
            currentStep++;
            updateUI();
        }
    });

    // Fungsi updateUI tetap sama seperti sebelumnya
    function updateUI() {
        let progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
        $('.progress-bar').css('width', progress + '%');

        $('.step').removeClass('active');
        $('.step').each(function(index) {
            if (index < currentStep) {
                $(this).addClass('active');
            }
        });

        $('.step-content').addClass('d-none');
        $('#step' + currentStep).removeClass('d-none');

        $('.prev-step').toggleClass('d-none', currentStep === 1);
        $('.next-step').toggleClass('d-none', currentStep === totalSteps);
        $('.submit-btn').toggleClass('d-none', currentStep !== totalSteps);
    }

    // Event handler untuk tombol previous
    $('.prev-step').click(function() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
        }
    });

    // Inisialisasi
    updateUI();

    // Tambahkan inisialisasi perhitungan total
    hitungTotalUsia();
    hitungTotalSDM();
    hitungTotalPekerjaan();
    hitungTotalAgama();
    hitungTotalWarga();
    hitungTotalCacatFisik();
    hitungTotalCacatMental();
    hitungTotalPaud();
    hitungTotalTk();
    hitungTotalSd();
    hitungTotalSmp();

    // Event handler untuk tombol submit
    $('.submit-btn').click(function(e) {
        e.preventDefault(); // Pastikan ini tidak mencegah submit jika tidak diperlukan
        if (validateForm()) { // Pastikan fungsi validasi form mengembalikan true jika semua valid
            $('#formWizard').submit(); // Lakukan submit form
        } else {
            console.log('Form tidak valid');
        }
    });

    // Fungsi validasi form
    function validateForm() {
        // Tambahkan logika validasi di sini
        // Return true jika valid, false jika tidak
        return true;
    }

    // Pastikan total dihitung saat halaman dimuat
    $(document).ready(function() {
        hitungTotalCacatFisik();
    });

    // Tambahkan event listener untuk input-input baru
    $(document).on('input', 'input[name^="jumlah_siswa_"], input[name^="jumlah_guru_"]', function() {
        let tableId = $(this).closest('table').attr('id');
        if (tableId === 'tk-table') hitungTotalTk();
        else if (tableId === 'sd-table') hitungTotalSd();
        else if (tableId === 'smp-table') hitungTotalSmp();
    });

    // Event listener untuk tombol tambah SMA
    $('#add-sma').click(function() {
        let rowCount = $('#sma-table tbody tr').length;
        let newRow = `
            <tr>
                <td>${rowCount + 1}</td>
                <td><input type="text" name="nama_sma[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_sma[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_siswa_sma[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_guru_sma[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-sma">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#sma-table tbody').append(newRow);
        hitungTotalSma();
    });

    // Event listener untuk tombol tambah PT
    $('#add-pt').click(function() {
        let rowCount = $('#pt-table tbody tr').length;
        let newRow = `
            <tr>
                <td>${rowCount + 1}</td>
                <td><input type="text" name="nama_pt[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_pt[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_mahasiswa_pt[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_dosen_pt[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-pt">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#pt-table tbody').append(newRow);
        hitungTotalPt();
    });

    // Event listener untuk tombol hapus SMA
    $(document).on('click', '.remove-sma', function(e) {
        e.preventDefault();
        if ($('#sma-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorSma();
            hitungTotalSma();
        } else {
            alert('Minimal harus ada satu data SMA!');
        }
    });

    // Event listener untuk tombol hapus PT
    $(document).on('click', '.remove-pt', function(e) {
        e.preventDefault();
        if ($('#pt-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorPt();
            hitungTotalPt();
        } else {
            alert('Minimal harus ada satu data Perguruan Tinggi!');
        }
    });

    // Fungsi untuk update nomor urut SMA
    function updateNomorSma() {
        $('#sma-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi untuk update nomor urut PT
    function updateNomorPt() {
        $('#pt-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi hitung total SMA
    function hitungTotalSma() {
        let totalSiswa = 0;
        let totalGuru = 0;
        $('#sma-table tbody tr').each(function() {
            totalSiswa += parseInt($(this).find('input[name="jumlah_siswa_sma[]"]').val()) || 0;
            totalGuru += parseInt($(this).find('input[name="jumlah_guru_sma[]"]').val()) || 0;
        });
        $('#total_siswa_sma').text(totalSiswa);
        $('#total_guru_sma').text(totalGuru);
    }

    // Fungsi hitung total PT
    function hitungTotalPt() {
        let totalMahasiswa = 0;
        let totalDosen = 0;
        $('#pt-table tbody tr').each(function() {
            totalMahasiswa += parseInt($(this).find('input[name="jumlah_mahasiswa_pt[]"]').val()) || 0;
            totalDosen += parseInt($(this).find('input[name="jumlah_dosen_pt[]"]').val()) || 0;
        });
        $('#total_mahasiswa_pt').text(totalMahasiswa);
        $('#total_dosen_pt').text(totalDosen);
    }

    // Event listener untuk input-input baru
    $(document).on('input', 'input[name^="jumlah_siswa_sma"], input[name^="jumlah_guru_sma"]', function() {
        hitungTotalSma();
    });

    $(document).on('input', 'input[name^="jumlah_mahasiswa_pt"], input[name^="jumlah_dosen_pt"]', function() {
        hitungTotalPt();
    });

    // Event listener untuk tombol tambah Pendidikan Khusus
    $('#add-pendidikan-khusus').click(function() {
        let rowCount = $('#pendidikan-khusus-table tbody tr').length;
        let newRow = `
            <tr>
                <td>${rowCount + 1}</td>
                <td><input type="text" name="nama_pendidikan_khusus[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_pendidikan_khusus[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_siswa_pendidikan_khusus[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_guru_pendidikan_khusus[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-pendidikan-khusus">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#pendidikan-khusus-table tbody').append(newRow);
        hitungTotalPendidikanKhusus();
    });

    // Event listener untuk tombol tambah Pendidikan Non Formal
    $('#add-pendidikan-non-formal').click(function() {
        let rowCount = $('#pendidikan-non-formal-table tbody tr').length;
        let newRow = `
            <tr>
                <td>${rowCount + 1}</td>
                <td><input type="text" name="nama_pendidikan_non_formal[]" class="form-control" value="-"></td>
                <td><input type="text" name="alamat_pendidikan_non_formal[]" class="form-control" value="-"></td>
                <td><input type="number" name="jumlah_peserta_non_formal[]" class="form-control" value="0"></td>
                <td><input type="number" name="jumlah_pengajar_non_formal[]" class="form-control" value="0"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-pendidikan-non-formal">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#pendidikan-non-formal-table tbody').append(newRow);
        hitungTotalPendidikanNonFormal();
    });

    // Event listener untuk tombol hapus Pendidikan Khusus
    $(document).on('click', '.remove-pendidikan-khusus', function(e) {
        e.preventDefault();
        if ($('#pendidikan-khusus-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorPendidikanKhusus();
            hitungTotalPendidikanKhusus();
        } else {
            alert('Minimal harus ada satu data Pendidikan Khusus!');
        }
    });

    // Event listener untuk tombol hapus Pendidikan Non Formal
    $(document).on('click', '.remove-pendidikan-non-formal', function(e) {
        e.preventDefault();
        if ($('#pendidikan-non-formal-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateNomorPendidikanNonFormal();
            hitungTotalPendidikanNonFormal();
        } else {
            alert('Minimal harus ada satu data Pendidikan Non Formal!');
        }
    });

    // Fungsi untuk update nomor urut Pendidikan Khusus
    function updateNomorPendidikanKhusus() {
        $('#pendidikan-khusus-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi untuk update nomor urut Pendidikan Non Formal
    function updateNomorPendidikanNonFormal() {
        $('#pendidikan-non-formal-table tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Fungsi hitung total Pendidikan Khusus
    function hitungTotalPendidikanKhusus() {
        let totalSiswa = 0;
        let totalGuru = 0;
        $('#pendidikan-khusus-table tbody tr').each(function() {
            totalSiswa += parseInt($(this).find('input[name="jumlah_siswa_pendidikan_khusus[]"]').val()) || 0;
            totalGuru += parseInt($(this).find('input[name="jumlah_guru_pendidikan_khusus[]"]').val()) || 0;
        });
        $('#total_siswa_pendidikan_khusus').text(totalSiswa);
        $('#total_guru_pendidikan_khusus').text(totalGuru);
    }

    // Fungsi hitung total Pendidikan Non Formal
    function hitungTotalPendidikanNonFormal() {
        let totalPeserta = 0;
        let totalPengajar = 0;
        $('#pendidikan-non-formal-table tbody tr').each(function() {
            totalPeserta += parseInt($(this).find('input[name="jumlah_peserta_non_formal[]"]').val()) || 0;
            totalPengajar += parseInt($(this).find('input[name="jumlah_pengajar_non_formal[]"]').val()) || 0;
        });
        $('#total_peserta_non_formal').text(totalPeserta);
        $('#total_pengajar_non_formal').text(totalPengajar);
    }

    // Event listener untuk input-input baru
    $(document).on('input', 'input[name^="jumlah_siswa_pendidikan_khusus"], input[name^="jumlah_guru_pendidikan_khusus"]', function() {
        hitungTotalPendidikanKhusus();
    });

    $(document).on('input', 'input[name^="jumlah_peserta_non_formal"], input[name^="jumlah_pengajar_non_formal"]', function() {
        hitungTotalPendidikanNonFormal();
    });

    // Inisialisasi perhitungan total saat halaman dimuat
    $(document).ready(function() {
        hitungTotalSma();
        hitungTotalPt();
        hitungTotalPendidikanKhusus();
        hitungTotalPendidikanNonFormal();
    });
});