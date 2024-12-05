<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('asset/icons/gemah.ico') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <title>Profil RW</title>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- NAVBAR -->
 <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('asset/images/gemah.png') }}" alt="logo" width="50px" height="50px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Tentang Kami</a>
        </li>
      </ul>
        <div class="d-flex">
            <a href="{{ route('login') }}" class="btn btn-info">Login</a>
        </div>
    </div>
  </div>
</nav>

<!--HERO -->
  <section id="hero" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
    <div class="container text-center text-white">
      <div class="hero-tittle">
      <div class="hero-text">Selamat Datang</div>
      <div class="hero-text-p">Di Website Profil RW Kecamatan Kesambi Kota Cirebon</div>
      </div>
    </div>
  </section>

  <section id="slogan" style="margin-top: -60px;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card" style="width: 100%; height: 100%; padding: 20px; display: flex; justify-content: center; align-items: center; margin-bottom: 20px; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);">
                        <div style="display: flex; align-items: center;">
                            <img src="{{ asset('asset/icons/gemah.ico') }}" alt="ramah" width="50px" height="50px" style="margin-right: 10px;">
                            <h4><b>Ramah</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card" style="width: 100%; height: 100%; padding: 20px; display: flex; justify-content: center; align-items: center; margin-bottom: 20px; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); ">
                        <div style="display: flex; align-items: center;">
                            <img src="{{ asset('asset/icons/gemah.ico') }}" alt="ramah" width="50px" height="50px" style="margin-right: 10px;">
                            <h4><b>Ramah</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card" style="width: 100%; height: 100%; padding: 20px; display: flex; justify-content: center; align-items: center; margin-bottom: 20px; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);">
                        <div style="display: flex; align-items: center;">
                            <img src="{{ asset('asset/icons/gemah.ico') }}" alt="ramah" width="50px" height="50px" style="margin-right: 10px;">
                            <h4><b>Ramah</b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Informasi -->
<section id="informasi" class="py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
    <div class="container">
        <div class="header-informasi text-center mb-5">
            <h2 class="fw-bold">Informasi Data Penduduk Kecamatan Kesambi</h2>
        </div>

        <!-- Info Cards -->
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h3 class="fw-bold text-primary">5</h3>
                        <p class="mb-0">Kelurahan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h3 class="fw-bold text-success">50</h3>
                        <p class="mb-0">RW</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h3 class="fw-bold text-info">150</h3>
                        <p class="mb-0">RT</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h3 class="fw-bold text-warning">20.400</h3>
                        <p class="mb-0">Total Penduduk</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row">
            <!-- Chart Penduduk -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Statistik Penduduk</h5>
                        <canvas id="chartPenduduk"></canvas>
                    </div>
                </div>
            </div>

            <!-- Chart Usia -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Kategori Usia</h5>
                        <canvas id="chartUsia"></canvas>
                    </div>
                </div>
            </div>

            <!-- Chart Pekerjaan -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Jenis Pekerjaan</h5>
                        <canvas id="chartPekerjaan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--BERITA -->
  <section id="berita py-5" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
    <div class="container py-5">
      <div class="header-berita text-center">
        <h2 class="fw-bold">Berita Kegiatan Dilingkungan Kecamatan Kesambi</h2>
      </div>

      <div class="row py-5 mb-5">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card border-0">
                <img src="{{ asset('asset/images/senam1.jpg') }}" class="img-fluid rounded" style="object-fit: cover; height: 300px;">
            <div class="konten-berita">
                <p class="mb-3 text-secondary">25 Oktober 2024</p>
                <h4>Senam Bersama Di Lingkungan Kantor Kecamatan Kesambi</h4>
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                <a href="#" class="text-decoration-none text-info">Selengkapnya</a>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
            <div class="card border-0">
                <img src="{{ asset('asset/images/bultang.jpg') }}" class="image-fluid mb-1 rounded" style="width: 100%; border-radius: 10px; height: 300px;">
            <div class="konten-berita">
                <p class="mb-3 text-secondary">25 Oktober 2024</p>
                <h4>Senam Bersama Di Lingkungan Kantor Kecamatan Kesambi</h4>
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                <a href="#" class="text-decoration-none text-info">Selengkapnya</a>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card border-0">
                <img src="{{ asset('asset/images/senam2.jpg') }}" class="image-fluid mb-1 rounded" style="width: 100%; border-radius: 10px; height: 300px;">
            <div class="konten-berita">
                <p class="mb-3 text-secondary">25 Oktober 2024</p>
                <h4>Senam Bersama Di Lingkungan Kantor Kecamatan Kesambi</h4>
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                <a href="#" class="text-decoration-none text-info">Selengkapnya</a>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card border-0">
                <img src="{{ asset('asset/images/bultang2.jpg') }}" class="image-fluid mb-1 rounded" style="width: 100%; border-radius: 10px; height: 300px;">
            <div class="konten-berita">
                <p class="mb-3 text-secondary">25 Oktober 2024</p>
                <h4>Senam Bersama Di Lingkungan Kantor Kecamatan Kesambi</h4>
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                <a href="#" class="text-decoration-none text-info">Selengkapnya</a>
            </div>
            </div>
        </div>
        <div class="footer-berita text-center py-5">
            <a href="" class="btn btn-outline-info">Baca Berita Lainnya...</a>
        </div>
      </div>
    </div>
  </section>

<!-- GALERI -->
<section id="galeri" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">
  <div class="container">
    <div class="header-galeri text-center">
      <h2 class="fw-bold">Galeri Kegiatan Dilingkungan Kecamatan Kesambi</h2>
    </div>
    <div class="row py-5">
      <div class="col-md-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3 py-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3 py-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3 py-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
      <div class="col-md-3 py-3">
        <img src="{{ asset('asset/images/gemah.png') }}" width="100%" height="300px">
      </div>
    </div>
  </div>
  <div class="footer-galeri text-center py-5">
    <a href="" class="btn btn-outline-info">Lihat Galeri Lainnya...</a>
  </div>
</section>

<section id="about py-5" data-aos="fade-zoom-in" data-aos-duration="1000" data-aos-delay="500">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="stripe">
          <h5><b>Tentang Kecamatan Kesambi</b></h5>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p>Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
      </div>
      <div class="col-lg-6">
        <img src="{{ asset('asset/images/senam1.jpg') }}" class="img-fluid rounded" alt="Kecamatan Kesambi">
      </div>
    </div>
  </div>
</section>


<!-- FOOTER -->
<footer class="bg-dark text-white pt-5 pb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
    <div class="container">
        <div class="row">
            <!-- Buat Logo -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('asset/images/gemah.png') }}" alt="Logo" width="50" height="50" class="me-2">
                    <h5 class="mb-0">Kecamatan Kesambi</h5>
                </div>
                <p class="text-white-50">
                    Jl. Dr. Susarsono No. 12, Kota Cirebon<br>
                    Jawa Barat, Indonesia
                </p>
            </div>

            <!-- Buat Navigasi -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Berita</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Buat Kontak -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Kontak</h5>
                <ul class="list-unstyled text-white-50">
                    <li class="mb-2">
                        <i class="bi bi-telephone-fill me-2"></i> (0231) 123456
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope-fill me-2"></i> info@kesambi.com
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-whatsapp me-2"></i> +62 812-3456-7890
                    </li>
                </ul>
            </div>

            <!-- Buat Sosial Media -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Sosial Media</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-youtube fs-4"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-4">
            <div class="col-12">
                <hr class="bg-white-50">
                <p class="text-center text-white-50 mb-0">
                    &copy; 2024 Kecamatan Kesambi. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>




<!-- JAVA SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    const navbar = document.querySelector('.fixed-top');
    window.onscroll = () => {
        if (window.scrollY > 100) {
            navbar.classList.add('scroll-nav-active');
            navbar.classList.add('text-nav-active');
            navbar.classList.remove('navbar-dark')
        } else {
            navbar.classList.remove('scroll-nav-active');
            navbar.classList.add('navbar-dark');
        }
    };
    AOS.init();
</script>


<script>
    // Chart Penduduk
    const chartPenduduk = new Chart(document.getElementById('chartPenduduk'), {
        type: 'pie',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [10400, 10000],
                backgroundColor: ['#36A2EB', '#FF6384']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Chart Usia
    const chartUsia = new Chart(document.getElementById('chartUsia'), {
        type: 'bar',
        data: {
            labels: ['0-14', '15-24', '25-54', '55+'],
            datasets: [{
                label: 'Jumlah',
                data: [4000, 5000, 8400, 3000],
                backgroundColor: '#4BC0C0'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Chart Pekerjaan
    const chartPekerjaan = new Chart(document.getElementById('chartPekerjaan'), {
        type: 'doughnut',
        data: {
            labels: ['PNS', 'Swasta', 'Wirausaha', 'Petani', 'Lainnya'],
            datasets: [{
                data: [2000, 8000, 4000, 1400, 5000],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
</body>
</html>