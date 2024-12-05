<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanRt extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_rt';

    protected $fillable = [
        'no_surat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'periode',
        'tahun',
        'nama_pengisi',
        'pekerjaan',
        'jabatan',
        'tanggal_input',
        'waktu_input',
        'rt_id',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
        'luas_wilayah',
        'sarana_pendidikan',
        'sarana_olahraga',
        'sarana_pariwisata',
        'tanah_lapang',
        'jumlah_penduduk',
        'jumlah_laki',
        'jumlah_perempuan',
        'jumlah_kk',
        'jumlah_total',
        'kepadatan_penduduk',
        'usia_0_4_l',
        'usia_0_4_p',
        'usia_5_9_l',
        'usia_5_9_p',
        'usia_10_14_l',
        'usia_10_14_p',
        'usia_15_19_l',
        'usia_15_19_p',
        'usia_20_24_l',
        'usia_20_24_p',
        'usia_25_29_l',
        'usia_25_29_p',
        'usia_30_34_l',
        'usia_30_34_p',
        'usia_35_39_l',
        'usia_35_39_p',
        'usia_40_44_l',
        'usia_40_44_p',
        'usia_45_49_l',
        'usia_45_49_p',
        'usia_50_54_l',
        'usia_50_54_p',
        'usia_55_59_l',
        'usia_55_59_p',
        'usia_60_64_l',
        'usia_60_64_p',
        'usia_65_69_l',
        'usia_65_69_p',
        'usia_70_74_l',
        'usia_70_74_p',
        'usia_75_plus_l',
        'usia_75_plus_p',
        'jumlah_laki_usia',
        'jumlah_perempuan_usia',
        'jumlah_penduduk_usia',
        'petani_l', 'petani_p',
        'buruh_tani_l', 'buruh_tani_p',
        'pns_l', 'pns_p',
        'pengrajin_l', 'pengrajin_p',
        'pedagang_l', 'pedagang_p',
        'peternak_l', 'peternak_p',
        'dokter_swasta_l', 'dokter_swasta_p',
        'bidan_swasta_l', 'bidan_swasta_p',
        'tni_polri_l', 'tni_polri_p',
        'pensiunan_tni_polri_l', 'pensiunan_tni_polri_p',
        'pensiunan_pns_l', 'pensiunan_pns_p',
        'islam_l', 'islam_p',
        'kristen_l', 'kristen_p',
        'katholik_l', 'katholik_p',
        'hindu_l', 'hindu_p',
        'budha_l', 'budha_p',
        'khonghucu_l', 'khonghucu_p',
        'wni_l', 'wni_p',
        'wna_l', 'wna_p',
        'tuna_rungu_l', 'tuna_rungu_p',
        'tuna_wicara_l', 'tuna_wicara_p',
        'tuna_netra_l', 'tuna_netra_p',
        'lumpuh_l', 'lumpuh_p',
        'sumbing_l', 'sumbing_p',
        'idiot_l', 'idiot_p',
        'gila_l', 'gila_p',
        'stress_l', 'stress_p',
        'autis_l', 'autis_p',
        'penduduk_usia_18_56',
        'penduduk_usia_18_58_bekerja',
        'penduduk_usia_18_58_tidak_bekerja',
        'penduduk_usia_58_keatas',
        'penduduk_usia_58_keatas_bekerja',
        'penduduk_usia_58_keatas_tidak_bekerja',
        'nama_paud',
        'alamat_paud',
        'jumlah_pengajar_paud',
        'jumlah_siswa_paud',
        'penduduk_usia_18_56_l', 'penduduk_usia_18_56_p',
        'penduduk_usia_18_58_bekerja_l', 'penduduk_usia_18_58_bekerja_p',
        'penduduk_usia_18_58_tidak_bekerja_l', 'penduduk_usia_18_58_tidak_bekerja_p',
        'penduduk_usia_58_keatas_l', 'penduduk_usia_58_keatas_p',
        'penduduk_usia_58_keatas_bekerja_l', 'penduduk_usia_58_keatas_bekerja_p',
        'penduduk_usia_58_keatas_tidak_bekerja_l', 'penduduk_usia_58_keatas_tidak_bekerja_p',
        'data_tk',
        'data_sd',
        'data_smp',
        'data_sma',
        'data_pt',
        'data_pendidikan_khusus',
        'data_pendidikan_non_formal'
    ];

    protected $casts = [
        'nama_paud' => 'array',
        'alamat_paud' => 'array',
        'jumlah_pengajar_paud' => 'array',
        'jumlah_siswa_paud' => 'array',
        'data_tk' => 'array',
        'data_sd' => 'array',
        'data_smp' => 'array',
        'data_sma' => 'array',
        'data_pt' => 'array',
        'data_pendidikan_khusus' => 'array',
        'data_pendidikan_non_formal' => 'array'
    ];

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function getTotalLakiUsiaAttribute()
    {
        return $this->usia_0_4_l + $this->usia_5_9_l + $this->usia_10_14_l + 
               $this->usia_15_19_l + $this->usia_20_24_l + $this->usia_25_29_l + 
               $this->usia_30_34_l + $this->usia_35_39_l + $this->usia_40_44_l + 
               $this->usia_45_49_l + $this->usia_50_54_l + $this->usia_55_59_l + 
               $this->usia_60_64_l + $this->usia_65_69_l + $this->usia_70_74_l + 
               $this->usia_75_plus_l;
    }

    public function getTotalPerempuanUsiaAttribute()
    {
        return $this->usia_0_4_p + $this->usia_5_9_p + $this->usia_10_14_p + 
               $this->usia_15_19_p + $this->usia_20_24_p + $this->usia_25_29_p + 
               $this->usia_30_34_p + $this->usia_35_39_p + $this->usia_40_44_p + 
               $this->usia_45_49_p + $this->usia_50_54_p + $this->usia_55_59_p + 
               $this->usia_60_64_p + $this->usia_65_69_p + $this->usia_70_74_p + 
               $this->usia_75_plus_p;
    }

    public function getTotalPendudukUsiaAttribute()
    {
        return $this->total_laki_usia + $this->total_perempuan_usia;
    }

    public function getTotalLakiPekerjaanAttribute()
    {
        return $this->petani_l + $this->buruh_tani_l + $this->pns_l + $this->pengrajin_l +
               $this->pedagang_l + $this->peternak_l + $this->dokter_swasta_l + $this->bidan_swasta_l +
               $this->tni_polri_l + $this->pensiunan_tni_polri_l + $this->pensiunan_pns_l;
    }

    public function getTotalPerempuanPekerjaanAttribute()
    {
        return $this->petani_p + $this->buruh_tani_p + $this->pns_p + $this->pengrajin_p +
               $this->pedagang_p + $this->peternak_p + $this->dokter_swasta_p + $this->bidan_swasta_p +
               $this->tni_polri_p + $this->pensiunan_tni_polri_p + $this->pensiunan_pns_p;
    }

    public function getTotalLakiAgamaAttribute()
    {
        return $this->islam_l + $this->kristen_l + $this->katholik_l + $this->hindu_l +
               $this->budha_l + $this->khonghucu_l;
    }

    public function getTotalPerempuanAgamaAttribute()
    {
        return $this->islam_p + $this->kristen_p + $this->katholik_p + $this->hindu_p +
               $this->budha_p + $this->khonghucu_p;
    }

    public function getTotalLakiWargaAttribute()
    {
        return $this->wni_l + $this->wna_l;
    }

    public function getTotalPerempuanWargaAttribute()
    {
        return $this->wni_p + $this->wna_p;
    }

    public function getTotalSiswaSmaAttribute()
    {
        return collect($this->data_sma ?? [])->sum('jumlah_siswa');
    }

    public function getTotalGuruSmaAttribute()
    {
        return collect($this->data_sma ?? [])->sum('jumlah_guru');
    }

    public function getTotalMahasiswaPtAttribute()
    {
        return collect($this->data_pt ?? [])->sum('jumlah_mahasiswa');
    }

    public function getTotalDosenPtAttribute()
    {
        return collect($this->data_pt ?? [])->sum('jumlah_dosen');
    }

    public function getTotalSiswaPendidikanKhususAttribute()
    {
        return collect($this->data_pendidikan_khusus ?? [])->sum('jumlah_siswa');
    }

    public function getTotalGuruPendidikanKhususAttribute()
    {
        return collect($this->data_pendidikan_khusus ?? [])->sum('jumlah_guru');
    }

    public function getTotalPesertaNonFormalAttribute()
    {
        return collect($this->data_pendidikan_non_formal ?? [])->sum('jumlah_peserta');
    }

    public function getTotalPengajarNonFormalAttribute()
    {
        return collect($this->data_pendidikan_non_formal ?? [])->sum('jumlah_pengajar');
    }
}
