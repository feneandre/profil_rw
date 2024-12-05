@extends('rt.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-file-alt fa-fw"></i> I. BIDANG PENDIDIKAN
        </h1>
        <a href="{{ route('rt.pendidikan.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- A. Kondisi Geografis -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                A. Kondisi Geografis
            </h6>
        </div>
        <div class="card-body">
            <p>Secara langsung RW.03 Karyamulya {{ $pendidikan->kelurahan }} Kecamatan Kesambi terletak pada lokasi yang berbatasan langsung dengan wilayah yang dibatasi:</p>
            
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td width="120">- Sebelah Barat</td>
                            <td width="20">:</td>
                            <td>Berbatasan dengan {{$pendidikan->batas_barat}}</td>
                        </tr>
                        <tr>
                            <td>- Sebelah Utara</td>
                            <td>:</td>
                            <td>Berbatasan dengan {{$pendidikan->batas_utara}}</td>
                        </tr>
                        <tr>
                            <td>- Sebelah Timur</td>
                            <td>:</td>
                            <td>Berbatasan dengan {{$pendidikan->batas_timur}}</td>
                        </tr>
                        <tr>
                            <td>- Sebelah Selatan</td>
                            <td>:</td>
                            <td>Berbatasan dengan {{$pendidikan->batas_selatan}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p class="mt-3">Luas Wilayah RW.03 Karyamulya adalah {{ $pendidikan->luas_wilayah }} Ha sebagian besar wilayah :</p>
            <ul>
                
                <li>Sarana Pendidikan {{ $pendidikan->sarana_pendidikan }}%</li>
                <li>Sarana Olahraga{{ $pendidikan->sarana_olahraga }}%</li>
                <li>Pariwisata{{ $pendidikan->sarana_pariwisata}}%</li>
                <li>Tanah Lapang {{ $pendidikan->tanah_lapang }}%</li>
            </ul>
        </div>
    </div>

    <!-- B. Kondisi Demografi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                B. Kondisi Demografi
            </h6>
        </div>
        <div class="card-body">
            <p>Jumlah Penduduk sampai dengan tanggal {{$pendidikan->tanggal_input}} berjumlah {{ number_format($pendidikan->jumlah_total) }} jiwa terdiri dari laki-laki {{ number_format($pendidikan->jumlah_laki) }} jiwa, perempuan {{ number_format($pendidikan->jumlah_perempuan) }} jiwa jumlah Kepala Keluarga {{ number_format($pendidikan->jumlah_kk) }} KK.</p>
        </div>
    </div>

    <!-- C. Potensi Sumber Daya Manusia -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                C. Potensi Sumber Daya Manusia
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td width="30">a.</td>
                        <td width="200">Jumlah Laki-laki</td>
                        <td>{{ number_format($pendidikan->jumlah_laki) }} Orang</td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Jumlah Perempuan</td>
                        <td>{{ number_format($pendidikan->jumlah_perempuan) }} Orang</td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>Jumlah Total (a+b)</td>
                        <td>{{ number_format($pendidikan->jumlah_total) }} Orang</td>
                    </tr>
                    <tr>
                        <td>d.</td>
                        <td>Jumlah Kepala Keluarga</td>
                        <td>{{ number_format($pendidikan->jumlah_kk) }} KK</td>
                    </tr>
                    <tr>
                        <td>e.</td>
                        <td>Kepadatan Penduduk (c/Luas Desa)</td>
                        <td>{{ number_format($pendidikan->kepadatan_penduduk, 2) }} Per Km</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- D. Data Usia -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                D. USIA
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th width="150">USIA</th>
                            <th width="150">LAKI-LAKI</th>
                            <th width="150">PEREMPUAN</th>
                            <th width="150">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>00-04</td>
                            <td>{{ $pendidikan->usia_0_4_l }}</td>
                            <td>{{ $pendidikan->usia_0_4_p }}</td>
                            <td>{{ $pendidikan->usia_0_4_l + $pendidikan->usia_0_4_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>05-09</td>
                            <td>{{ $pendidikan->usia_5_9_l }}</td>
                            <td>{{ $pendidikan->usia_5_9_p }}</td>
                            <td>{{ $pendidikan->usia_5_9_l + $pendidikan->usia_5_9_p }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>10-14</td>
                            <td>{{ $pendidikan->usia_10_14_l }}</td>
                            <td>{{ $pendidikan->usia_10_14_p }}</td>
                            <td>{{ $pendidikan->usia_10_14_l + $pendidikan->usia_10_14_p }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>15-19</td>
                            <td>{{ $pendidikan->usia_15_19_l }}</td>
                            <td>{{ $pendidikan->usia_15_19_p }}</td>
                            <td>{{ $pendidikan->usia_15_19_l + $pendidikan->usia_15_19_p }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>20-24</td>
                            <td>{{ $pendidikan->usia_20_24_l }}</td>
                            <td>{{ $pendidikan->usia_20_24_p }}</td>
                            <td>{{ $pendidikan->usia_20_24_l + $pendidikan->usia_20_24_p }}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>25-29</td>
                            <td>{{ $pendidikan->usia_25_29_l }}</td>
                            <td>{{ $pendidikan->usia_25_29_p }}</td>
                            <td>{{ $pendidikan->usia_25_29_l + $pendidikan->usia_25_29_p }}</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>30-34</td>
                            <td>{{ $pendidikan->usia_30_34_l }}</td>
                            <td>{{ $pendidikan->usia_30_34_p }}</td>
                            <td>{{ $pendidikan->usia_30_34_l + $pendidikan->usia_30_34_p }}</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>35-39</td>
                            <td>{{ $pendidikan->usia_35_39_l }}</td>
                            <td>{{ $pendidikan->usia_35_39_p }}</td>
                            <td>{{ $pendidikan->usia_35_39_l + $pendidikan->usia_35_39_p }}</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>40-44</td>
                            <td>{{ $pendidikan->usia_40_44_l }}</td>
                            <td>{{ $pendidikan->usia_40_44_p }}</td>
                            <td>{{ $pendidikan->usia_40_44_l + $pendidikan->usia_40_44_p }}</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>45-49</td>
                            <td>{{ $pendidikan->usia_45_49_l }}</td>
                            <td>{{ $pendidikan->usia_45_49_p }}</td>
                            <td>{{ $pendidikan->usia_45_49_l + $pendidikan->usia_45_49_p }}</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>50-54</td>
                            <td>{{ $pendidikan->usia_50_54_l }}</td>
                            <td>{{ $pendidikan->usia_50_54_p }}</td>
                            <td>{{ $pendidikan->usia_50_54_l + $pendidikan->usia_50_54_p }}</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>55-59</td>
                            <td>{{ $pendidikan->usia_55_59_l }}</td>
                            <td>{{ $pendidikan->usia_55_59_p }}</td>
                            <td>{{ $pendidikan->usia_55_59_l + $pendidikan->usia_55_59_p }}</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>60-64</td>
                            <td>{{ $pendidikan->usia_60_64_l }}</td>
                            <td>{{ $pendidikan->usia_60_64_p }}</td>
                            <td>{{ $pendidikan->usia_60_64_l + $pendidikan->usia_60_64_p }}</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>65-69</td>
                            <td>{{ $pendidikan->usia_65_69_l }}</td>
                            <td>{{ $pendidikan->usia_65_69_p }}</td>
                            <td>{{ $pendidikan->usia_65_69_l + $pendidikan->usia_65_69_p }}</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>70-74</td>
                            <td>{{ $pendidikan->usia_70_74_l }}</td>
                            <td>{{ $pendidikan->usia_70_74_p }}</td>
                            <td>{{ $pendidikan->usia_70_74_l + $pendidikan->usia_70_74_p }}</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>75 ke Atas</td>
                            <td>{{ $pendidikan->usia_75_plus_l }}</td>
                            <td>{{ $pendidikan->usia_75_plus_p }}</td>
                            <td>{{ $pendidikan->usia_75_plus_l + $pendidikan->usia_75_plus_p }}</td>
                        </tr>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="2">TOTAL</td>
                            <td>{{ $pendidikan->total_laki_usia }}</td>
                            <td>{{ $pendidikan->total_perempuan_usia }}</td>
                            <td>{{ $pendidikan->total_penduduk_usia }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- E. Mata Pencaharian -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-briefcase"></i> E. Mata Pencaharian Pokok
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Laki-laki (Orang)</th>
                            <th>Perempuan (Orang)</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Petani</td>
                            <td>{{ $pendidikan->petani_l }}</td>
                            <td>{{ $pendidikan->petani_p }}</td>
                            <td>{{ $pendidikan->petani_l + $pendidikan->petani_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Buruh Tani</td>
                            <td>{{ $pendidikan->buruh_tani_l }}</td>
                            <td>{{ $pendidikan->buruh_tani_p }}</td>
                            <td>{{ $pendidikan->buruh_tani_l + $pendidikan->buruh_tani_p }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pegawai Negeri Sipil</td>
                            <td>{{ $pendidikan->pns_l }}</td>
                            <td>{{ $pendidikan->pns_p }}</td>
                            <td>{{ $pendidikan->pns_l + $pendidikan->pns_p }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Pengrajin</td>
                            <td>{{ $pendidikan->pengrajin_l }}</td>
                            <td>{{ $pendidikan->pengrajin_p }}</td>
                            <td>{{ $pendidikan->pengrajin_l + $pendidikan->pengrajin_p }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Pedagang</td>
                            <td>{{ $pendidikan->pedagang_l }}</td>
                            <td>{{ $pendidikan->pedagang_p }}</td>
                            <td>{{ $pendidikan->pedagang_l + $pendidikan->pedagang_p }}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Peternakan</td>
                            <td>{{ $pendidikan->peternak_l }}</td>
                            <td>{{ $pendidikan->peternak_p }}</td>
                            <td>{{ $pendidikan->peternak_l + $pendidikan->peternak_p }}</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Dokter Swasta</td>
                            <td>{{ $pendidikan->dokter_swasta_l }}</td>
                            <td>{{ $pendidikan->dokter_swasta_p }}</td>
                            <td>{{ $pendidikan->dokter_swasta_l + $pendidikan->dokter_swasta_p }}</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Bidan Swasta</td>
                            <td>{{ $pendidikan->bidan_swasta_l }}</td>
                            <td>{{ $pendidikan->bidan_swasta_p }}</td>
                            <td>{{ $pendidikan->bidan_swasta_l + $pendidikan->bidan_swasta_p }}</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>TNI/POLRI</td>
                            <td>{{ $pendidikan->tni_polri_l }}</td>
                            <td>{{ $pendidikan->tni_polri_p }}</td>
                            <td>{{ $pendidikan->tni_polri_l + $pendidikan->tni_polri_p }}</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Pensiunan TNI/POLRI</td>
                            <td>{{ $pendidikan->pensiunan_tni_polri_l }}</td>
                            <td>{{ $pendidikan->pensiunan_tni_polri_p }}</td>
                            <td>{{ $pendidikan->pensiunan_tni_polri_l + $pendidikan->pensiunan_tni_polri_p }}</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Pensiunan PNS</td>
                            <td>{{ $pendidikan->pensiunan_pns_l }}</td>
                            <td>{{ $pendidikan->pensiunan_pns_p }}</td>
                            <td>{{ $pendidikan->pensiunan_pns_l + $pendidikan->pensiunan_pns_p }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="2">Jumlah</td>
                            <td>{{ number_format($pendidikan->total_laki_pekerjaan) }}</td>
                            <td>{{ number_format($pendidikan->total_perempuan_pekerjaan) }}</td>
                            <td>{{ number_format($pendidikan->total_laki_pekerjaan + $pendidikan->total_perempuan_pekerjaan) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- F. Agama -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-pray"></i> F. Agama/Aliran Kepercayaan
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Agama</th>
                            <th>Laki-laki (Orang)</th>
                            <th>Perempuan (Orang)</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ISLAM</td>
                            <td>{{ $pendidikan->islam_l }}</td>
                            <td>{{ $pendidikan->islam_p }}</td>
                            <td>{{ $pendidikan->islam_l + $pendidikan->islam_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>KRISTEN</td>
                            <td>{{ $pendidikan->kristen_l }}</td>
                            <td>{{ $pendidikan->kristen_p }}</td>
                            <td>{{ $pendidikan->kristen_l + $pendidikan->kristen_p }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>KATHOLIK</td>
                            <td>{{ $pendidikan->katholik_l }}</td>
                            <td>{{ $pendidikan->katholik_p }}</td>
                            <td>{{ $pendidikan->katholik_l + $pendidikan->katholik_p }}</td>
                       </tr>
                        <tr>
                            <td>4</td>
                            <td>HINDU</td>
                            <td>{{ $pendidikan->hindu_l }}</td>
                            <td>{{ $pendidikan->hindu_p }}</td>
                            <td>{{ $pendidikan->hindu_l + $pendidikan->hindu_p }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>BUDHA</td>
                            <td>{{ $pendidikan->budha_l }}</td>
                            <td>{{ $pendidikan->budha_p }}</td>
                            <td>{{ $pendidikan->budha_l + $pendidikan->budha_p }}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>KONGHUCU</td>
                            <td>{{ $pendidikan->khonghucu_l }}</td>
                            <td>{{ $pendidikan->khonghucu_p }}</td>
                            <td>{{ $pendidikan->khonghucu_l + $pendidikan->khonghucu_p }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="2">JUMLAH</td>
                            <td>{{ number_format($pendidikan->total_laki_agama) }}</td>
                            <td>{{ number_format($pendidikan->total_perempuan_agama) }}</td>
                            <td>{{ number_format($pendidikan->total_laki_agama + $pendidikan->total_perempuan_agama) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- G. Kewarganegaraan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-flag"></i> G. Kewarganegaraan
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kewarganegaraan</th>
                            <th>Laki-laki (Orang)</th>
                            <th>Perempuan (Orang)</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Warga Negara Indonesia</td>
                            <td>{{ $pendidikan->wni_l }}</td>
                            <td>{{ $pendidikan->wni_p }}</td>
                            <td>{{ $pendidikan->wni_l + $pendidikan->wni_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Warga Negara Asing</td>
                            <td>{{ $pendidikan->wna_l }}</td>
                            <td>{{ $pendidikan->wna_p }}</td>
                            <td>{{ $pendidikan->wna_l + $pendidikan->wna_p }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="2">JUMLAH</td>
                            <td>{{ number_format($pendidikan->total_laki_warga) }}</td>
                            <td>{{ number_format($pendidikan->total_perempuan_warga) }}</td>
                            <td>{{ number_format($pendidikan->total_laki_warga + $pendidikan->total_perempuan_warga) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- H. Data Cacat Mental dan Fisik -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-wheelchair"></i> H. Data Cacat Mental dan Fisik
            </h6>
        </div>
        <div class="card-body">
            <!-- Cacat Fisik -->
            <h5 class="mb-3">1. Cacat Fisik</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Jenis Cacat Fisik</th>
                            <th>Laki-laki (Orang)</th>
                            <th>Perempuan (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tuna Rungu</td>
                            <td>{{ $pendidikan->tuna_rungu_l }}</td>
                            <td>{{ $pendidikan->tuna_rungu_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tuna Wicara</td>
                            <td>{{ $pendidikan->tuna_wicara_l }}</td>
                            <td>{{ $pendidikan->tuna_wicara_p }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tuna Netra</td>
                            <td>{{ $pendidikan->tuna_netra_l }}</td>
                            <td>{{ $pendidikan->tuna_netra_p }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Lumpuh</td>
                            <td>{{ $pendidikan->lumpuh_l }}</td>
                            <td>{{ $pendidikan->lumpuh_p }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sumbing</td>
                            <td>{{ $pendidikan->sumbing_l }}</td>
                            <td>{{ $pendidikan->sumbing_p }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="2">JUMLAH</td>
                            <td>{{ $pendidikan->total_cacat_fisik_laki }}</td>
                            <td>{{ $pendidikan->total_cacat_fisik_perempuan }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Cacat Mental -->
            <h5 class="mb-3 mt-4">2. Cacat Mental</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Jenis Cacat Mental</th>
                            <th>Laki-laki (Orang)</th>
                            <th>Perempuan (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Idiot</td>
                            <td>{{ $pendidikan->idiot_l }}</td>
                            <td>{{ $pendidikan->idiot_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Gila</td>
                            <td>{{ $pendidikan->gila_l }}</td>
                            <td>{{ $pendidikan->gila_p }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Stress</td>
                            <td>{{ $pendidikan->stress_l }}</td>
                            <td>{{ $pendidikan->stress_p }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Autis</td>
                            <td>{{ $pendidikan->autis_l }}</td>
                            <td>{{ $pendidikan->autis_p }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="2">JUMLAH</td>
                            <td>{{ $pendidikan->total_cacat_mental_laki }}</td>
                            <td>{{ $pendidikan->total_cacat_mental_perempuan }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- I. Tenaga Kerja -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-users"></i> I. Tenaga Kerja
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Tenaga Kerja</th>
                            <th>Laki-laki (Orang)</th>
                            <th>Perempuan (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Penduduk Usia 18 - 56 Tahun</td>
                            <td>{{ $pendidikan->penduduk_usia_18_56_l }}</td>
                            <td>{{ $pendidikan->penduduk_usia_18_56_p }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a. Penduduk usia 18 - 58 tahun yang bekerja</td>
                            <td>{{ $pendidikan->penduduk_usia_18_58_bekerja_l }}</td>
                            <td>{{ $pendidikan->penduduk_usia_18_58_bekerja_p }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b. Penduduk usia 18 - 58 tahun yang belum bekerja</td>
                            <td>{{ $pendidikan->penduduk_usia_18_58_tidak_bekerja_l }}</td>
                            <td>{{ $pendidikan->penduduk_usia_18_58_tidak_bekerja_p }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Penduduk usia 58 tahun ke atas</td>
                            <td>{{ $pendidikan->penduduk_usia_58_keatas_l }}</td>
                            <td>{{ $pendidikan->penduduk_usia_58_keatas_p }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a. Penduduk usia 58 tahun ke atas yang bekerja</td>
                            <td>{{ $pendidikan->penduduk_usia_58_keatas_bekerja_l }}</td>
                            <td>{{ $pendidikan->penduduk_usia_58_keatas_bekerja_p }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b. Penduduk usia 58 tahun ke atas yang belum bekerja</td>
                            <td>{{ $pendidikan->penduduk_usia_58_keatas_tidak_bekerja_l }}</td>
                            <td>{{ $pendidikan->penduduk_usia_58_keatas_tidak_bekerja_p }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- J. Jumlah PAUD -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> J. Jumlah PAUD
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama PAUD</th>
                            <th>Alamat PAUD</th>
                            <th>Peserta Didik PAUD</th>
                            <th>Jumlah Guru PAUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $paudData = json_decode($pendidikan->nama_paud, true) ?? [];
                        @endphp
                        
                        @if(count($paudData) > 0)
                            @foreach($paudData as $index => $paud)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $paud['nama'] }}</td>
                                <td>{{ $paud['alamat'] }}</td>
                                <td>{{ $paud['jumlah_siswa'] }}</td>
                                <td>{{ $paud['jumlah_pengajar'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data PAUD</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($paudData)->sum('jumlah_siswa') }}</td>
                            <td>{{ collect($paudData)->sum('jumlah_pengajar') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- K. Jumlah TK -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> K. Jumlah TK
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama TK</th>
                            <th>Alamat TK</th>
                            <th>Peserta Didik TK</th>
                            <th>Jumlah Guru TK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $tkData = json_decode($pendidikan->data_tk, true) ?? [];
                        @endphp
                        
                        @if(count($tkData) > 0)
                            @foreach($tkData as $index => $tk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tk['nama'] }}</td>
                                <td>{{ $tk['alamat'] }}</td>
                                <td>{{ $tk['jumlah_siswa'] }}</td>
                                <td>{{ $tk['jumlah_guru'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data TK</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($tkData)->sum('jumlah_siswa') }}</td>
                            <td>{{ collect($tkData)->sum('jumlah_guru') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- L. Jumlah SD -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> L. Jumlah SD
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama SD</th>
                            <th>Alamat SD</th>
                            <th>Peserta Didik SD</th>
                            <th>Jumlah Guru SD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sdData = json_decode($pendidikan->data_sd, true) ?? [];
                        @endphp
                        
                        @if(count($sdData) > 0)
                            @foreach($sdData as $index => $sd)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $sd['nama'] }}</td>
                                <td>{{ $sd['alamat'] }}</td>
                                <td>{{ $sd['jumlah_siswa'] }}</td>
                                <td>{{ $sd['jumlah_guru'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data SD</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($sdData)->sum('jumlah_siswa') }}</td>
                            <td>{{ collect($sdData)->sum('jumlah_guru') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- M. Jumlah SMP -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> M. Jumlah SMP
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama SMP</th>
                            <th>Alamat SMP</th>
                            <th>Peserta Didik SMP</th>
                            <th>Jumlah Guru SMP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $smpData = json_decode($pendidikan->data_smp, true) ?? [];
                        @endphp
                        
                        @if(count($smpData) > 0)
                            @foreach($smpData as $index => $smp)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $smp['nama'] }}</td>
                                <td>{{ $smp['alamat'] }}</td>
                                <td>{{ $smp['jumlah_siswa'] }}</td>
                                <td>{{ $smp['jumlah_guru'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data SMP</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($smpData)->sum('jumlah_siswa') }}</td>
                            <td>{{ collect($smpData)->sum('jumlah_guru') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- N. Jumlah SMA/MA/SMK -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> N. Jumlah SMA/MA/SMK
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama SMA/MA/SMK</th>
                            <th>Alamat</th>
                            <th>Peserta Didik</th>
                            <th>Jumlah Guru</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $smaData = json_decode($pendidikan->data_sma, true) ?? [];
                        @endphp
                        
                        @if(count($smaData) > 0)
                            @foreach($smaData as $index => $sma)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $sma['nama'] }}</td>
                                <td>{{ $sma['alamat'] }}</td>
                                <td>{{ $sma['jumlah_siswa'] }}</td>
                                <td>{{ $sma['jumlah_guru'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data SMA/MA/SMK</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($smaData)->sum('jumlah_siswa') }}</td>
                            <td>{{ collect($smaData)->sum('jumlah_guru') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- O. Jumlah Perguruan Tinggi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-university"></i> O. Jumlah Perguruan Tinggi
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama Perguruan Tinggi</th>
                            <th>Alamat</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Jumlah Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ptData = json_decode($pendidikan->data_pt, true) ?? [];
                        @endphp
                        
                        @if(count($ptData) > 0)
                            @foreach($ptData as $index => $pt)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pt['nama'] }}</td>
                                <td>{{ $pt['alamat'] }}</td>
                                <td>{{ $pt['jumlah_mahasiswa'] }}</td>
                                <td>{{ $pt['jumlah_dosen'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data Perguruan Tinggi</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($ptData)->sum('jumlah_mahasiswa') }}</td>
                            <td>{{ collect($ptData)->sum('jumlah_dosen') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- P. Jumlah Pendidikan Khusus -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> P. Jumlah Pendidikan Khusus
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama Lembaga</th>
                            <th>Alamat</th>
                            <th>Jumlah Siswa</th>
                            <th>Jumlah Guru</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pendidikanKhususData = json_decode($pendidikan->data_pendidikan_khusus, true) ?? [];
                        @endphp
                        
                        @if(count($pendidikanKhususData) > 0)
                            @foreach($pendidikanKhususData as $index => $pk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pk['nama'] }}</td>
                                <td>{{ $pk['alamat'] }}</td>
                                <td>{{ $pk['jumlah_siswa'] }}</td>
                                <td>{{ $pk['jumlah_guru'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data Pendidikan Khusus</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($pendidikanKhususData)->sum('jumlah_siswa') }}</td>
                            <td>{{ collect($pendidikanKhususData)->sum('jumlah_guru') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Q. Jumlah Pendidikan Non Formal -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-school"></i> Q. Jumlah Pendidikan Non Formal
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Nama Lembaga</th>
                            <th>Alamat</th>
                            <th>Jumlah Peserta</th>
                            <th>Jumlah Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pendidikanNonFormalData = json_decode($pendidikan->data_pendidikan_non_formal, true) ?? [];
                        @endphp
                        
                        @if(count($pendidikanNonFormalData) > 0)
                            @foreach($pendidikanNonFormalData as $index => $pnf)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pnf['nama'] }}</td>
                                <td>{{ $pnf['alamat'] }}</td>
                                <td>{{ $pnf['jumlah_peserta'] }}</td>
                                <td>{{ $pnf['jumlah_pengajar'] }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data Pendidikan Non Formal</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold bg-light">
                            <td colspan="3">JUMLAH</td>
                            <td>{{ collect($pendidikanNonFormalData)->sum('jumlah_peserta') }}</td>
                            <td>{{ collect($pendidikanNonFormalData)->sum('jumlah_pengajar') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    border: none;
    margin-bottom: 1.5rem;
}

.table-borderless td {
    padding: 0.5rem 0;
    border: none;
}

.table th {
    background-color: #f8f9fc;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e3e6f0;
}
</style>
@endpush
@endsection
