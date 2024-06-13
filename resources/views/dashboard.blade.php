<x-app-layout>


    <div class="card text-bg-dark  d-flex flex-column justify-content-center align-items-center text-center">
        <img src="{{ asset('storage/background.png') }}" class="card-img" alt="...">
          <div class="card-img-overlay">

    <main class="px-5 py-5">
          <p class="lead">DISIAR (Disaster in Indonesia Archipelago) is a geographic information system that displays disaster maps and other related information regarding disasters, especially about faults, megathrust, and earthquakes in Indonesia.</p>
    </main>

            <!-- <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p> -->
          </div>
    </div>

    <div class="container py-12">
    <div class="container py-12">
        <table class="table">
            <tr>
                <td>
                    <figure class="figure">
                        <img src="{{ asset('storage/step.png') }}" width="500" height="500" class="figure-img img-fluid rounded" alt="...">
                    </figure>
                </td>
                <td>
                    <figure class="figure">
                        <img src="{{ asset('storage/warning.png') }}" width="500" height="500" class="figure-img img-fluid rounded" alt="...">
                    </figure>
                </td>
            </tr>
        </table>
    </div>
    </div>

    <div class="container py-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/2.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/3.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container py-8 mb-5">
        <div class="card shadow">
            <div class="card-header text-center fw-bold alert alert-warning">
                <h3 class="card-title">TOTAL DATA FROM MAP</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-primary" role="alert">
                            <h4><i class="fa-solid fa-house-chimney-crack"></i> Disasters:</h4>
                            <p style="font-size: 30px">{{ $total_points }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            <h4>⛰️ Faults:</h4>
                            <p style="font-size: 30px">{{ $total_polylines }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            <h4>🌏 Megathrusts:</h4>
                            <p style="font-size: 30px">{{ $total_polygons }}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

  <div class="container py-8 mb-5">
  <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-bold">What is Megathrusts?</h5>
        <p class="card-text">A megathrust is a type of fault in the Earth's crust where one tectonic plate is forced 
          beneath another in a process called subduction. Megathrust faults are found at convergent plate 
          boundaries, where two tectonic plates collide. These faults are capable of producing extremely powerful 
          earthquakes, known as megathrust earthquakes, which can generate significant ground shaking and tsunamis.
          Almost all of these plate boundaries are subduction zones where an oceanic plate is subducting beneath another plate, 
          but there are a few places where there is a continental plate being pushed under another continental plate. 
          Both are called megathrusts. Examples of oceanic megathrusts include the subduction zones along almost all  
          the south coast of Indonesia.   
          🏞️
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-bold">Seismic Activity in Indonesia</h5>
        <p class="card-text">According to the United States Geological Survey (USGS), in 2020 within a range 
          of 300 km, 1692 earthquakes with a magnitude of more than 4.0 occurred in Indonesia (among them were 1471 
          between 4.0 and 4.9, 113 earthquakes with a magnitude between 5.0 and 5.9, and 10 earthquakes 
          with a magnitude above 6.0), which is 37 less than the subsequent year of 2021, when it witnessed 1730 
          earthquakes with a magnitude above 4.0 (among them were 121 with a magnitude between 5.0 and 5.9, and 11 above 6.0). 
          To compare, in the year 2022, Indonesia experienced 1791 earthquakes with a magnitude of more than 4.0, among which 
          10 were of a magnitude larger than 6.0, according to the EMSC.
          <br>
          🏞️
        </p>
      </div>
    </div>
  </div>
</div>
  </div>

    <div class="container py-8 mb-5">
        <div class="card shadow">
            <div class="card-header text-center fw-bold alert alert-warning">
                <h3>DISASTERS NEWS</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <svg class="rounded img-thumbnail mx-auto mb-3" width="140" height="140" role="img" aria-label="Placeholder">
                            <image href="{{ asset('storage/4.png') }}" />
                            <title>Placeholder</title>
                        </svg>
                        <h2 class="fw-bold mb-3">Latest Earthquake</h2>
                        <p class="mb-3">Find all latest earthquakes in or near Indonesia in our list below, updated every minute! Events are often reported within minutes. If you just felt a quake in or near Indonesia, find out which quakes are happening!</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-info" href="https://www.volcanodiscovery.com/earthquakes/indonesia.html">View details &raquo;</a>
                        </div>
                    </div><!-- /.col-lg-4 -->

                    <div class="col-lg-4 text-center">
                        <svg class="rounded img-thumbnail mx-auto d-block mb-3" width="140" height="140" role="img" aria-label="Placeholder">
                            <image href="{{ asset('storage/5.png') }}"/>
                            <title>Placeholder</title>
                        </svg>
                        <h2 class="fw-bold mb-3">Areas Close to Indonesia Active Faults</h2>
                        <p class="mb-3">Where can I find out the location of active faults in Indonesia and how close is it from where we live? This website can help you to answer that question with GEE analysis.</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-info" href="http://localhost/responsi/gempa.php">View details &raquo;</a>
                        </div>
                    </div><!-- /.col-lg-4 -->

                    <div class="col-lg-4 text-center">
                        <svg class="rounded img-thumbnail mx-auto mb-3" width="140" height="140" role="img" aria-label="Placeholder">
                            <image href="{{ asset('storage/6.png') }}" />
                            <title>Placeholder</title>
                        </svg>
                        <h2 class="fw-bold mb-3">Megathrusts Earthquake</h2>
                        <p class="mb-3">The researchers discovered high seismic activity on the southern coast of West Java Province and the southeastern part of Sumatra Island that could unleash a "megathrust" quake...</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-info" href="https://www.thejakartapost.com/indonesia/2022/11/03/34-meter-tsunami-may-hit-indonesia-in-mega-quake-research.html">View details &raquo;</a>
                        </div>
                    </div><!-- /.col-lg-4 -->

                    <div class="mt-5">
    <hr>
</div>
<p class="mt-2">
    <h4>You login as <b>{{ Auth::user()->name }}</b> with email <i>{{ Auth::user()->email }}</i></h4>
</p>
                </div>
            </div>
            
        </div>
    </div>

    <!-- credit -->
<section id="myself" class="container text-center">
  <div class="row text-center mb-2">
    <div class="col">
      <h3>Developer</h3>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <img src="{{ asset('storage/me.png') }}" alt="me" width="150" class="rounded-circle img-thumbnail" />
  </div>
  <br>
  <h3 >Hayyu Rahmayani Puspitasari</h3>
  <p>22/497739/SV/21157</p>
</section>
<!-- end credit -->

  <div class="container mt-5">
    <hr>
  </div>

    <footer class="container">
      <!-- FOOTER -->
        <!-- Grid container -->
        <div class="container p-4">
          <!-- Section: Images -->
          <section class="">
            <div class="row">
              <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                  <img src="https://i.pinimg.com/564x/5e/d2/24/5ed224b28a27b03620ba7c3feb8d437f.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                  </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                  <img src="https://i.pinimg.com/564x/2a/87/4e/2a874e60a33f3e89718765e6ec4789ea.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                  </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                  <img src="https://i.pinimg.com/564x/fa/ff/eb/faffeb5fb142fcee1cdc48260c8d9876.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                  </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                  <img src="https://i.pinimg.com/564x/ab/b6/51/abb651a16885e79df65cab180ed57df9.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                  </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                  <img src="https://i.pinimg.com/564x/4f/90/da/4f90dafe25db5a9ef10766fb25bec5d7.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                  </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                  <img src="https://i.pinimg.com/736x/f0/8c/f0/f08cf0616249f011071a05c4479609aa.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                  </a>
                </div>
              </div>
            </div>
          </section>
          <!-- Section: Images -->
        </div>
        <!-- Grid container -->

<hr>

        <div class="container p-4">
          <!--Grid row-->
          <div class="row mt-0 justify-content-center">
              <!--Grid column-->
              <div class="col-lg-6 col-md-12">
                <div class="container p-4">
                  <!--Grid row-->
                  <div class="row mt-0 justify-content-center">
                      <!--Grid column-->
                      <div class="col-lg-6 col-md-12 text-center"> <!-- Tambahkan kelas text-center di sini -->
                          <h5 class="text-uppercase mb-4">About Hayyu</h5>
              
                          <p>
                            A second-year student in Geographic Information Systems program interested in programming and mapping.
                          </p>
              
                          <!-- Konten lainnya -->
                      </div>
                      <!--Grid column-->
                  </div>
                  <!--Grid row-->
              </div>
      
                  <div class="mt-4 text-center">
                      <!-- Instagram -->
                      <a href="https://www.instagram.com/hr_puspoero/" class="btn btn-floating btn-warning btn-lg" target="_blank">
                          <i class="fab fa-instagram"></i>
                      </a>
                      <!-- GitHub -->
                      <a href="https://github.com/hayyurahmayani" class="btn btn-floating btn-warning btn-lg" target="_blank">
                          <i class="fab fa-github"></i>
                      </a>
      
                      <ul class="fa-ul mt-4">
                        <li class="mb-3">
                            <span class="fa-li" style="width: 2em; text-align: center;"><i class="fas fa-home"></i></span>
                            <span class="ms-2">Gunungkidul, Special Region of Yogyakarta</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li" style="width: 2em; text-align: center;"><i class="fas fa-envelope"></i></span>
                            <span class="ms-2">hayyu.rahmayani@gmail.com</span>
                        </li>
                    </ul>

                  </div>
              </div>
              <!--Grid column-->
          </div>
          <!--Grid row-->
      </div>


      <hr>
        </div>
<!-- End of .container -->

<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-1">DISIAR</h5>
                <ul class="list-unstyled">
                <p>&copy; 2024 - Geographic Information Systems | Gadjah Mada University</p>
          <br>
          References: 
          <br>
          <p><a href="https://jejakfakta.com/read/319/mengenal-10-sesar-aktif-di-indonesia-dari-sumatera-hingga-papua" class="link-info">Active Faults</a></p>
          <p><a href="https://id.wikipedia.org/wiki/Daftar_gempa_bumi_di_Indonesia" class="link-info">Earthquakes</a></p>
        
                </ul>
            </div>
            <div class="col-md-6">
            <div class="row align-items-center"> <!-- Baris untuk gambar kotak dan teks -->
                <div class="col-auto me-3"> <!-- Kolom untuk gambar kotak -->
                    <img src="storage/sig.png" alt="" style="max-width: 100px;">
                </div>
                <div class="col"> <!-- Kolom untuk teks "Instansi" -->
                    <ul class="list-unstyled">
                        <li>Geographic Information Systems Study Program</li>
                        <li>Department of Geotechnology</li>
                        <li>Vocational College</li>
                        <li>Gadjah Mada University</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <img src="storage/logo2.png" alt="" class="img-fluid" style="max-width: 150px;">
            </div>
            <div class="col-md-6 text-md-end">
                <p class="float-end text-primary"><a href="#">Back to top</a></p>
            </div>
        </div>
    </div>
        <!-- <div class="container">



        <p class="float-end text-primary"><a href="#">Back to top</a></p>
        <p>&copy; 2024 - Geographic Information Systems | Gadjah Mada University</p>
          <br>
          References: 
          <br>
          <p><a href="https://jejakfakta.com/read/319/mengenal-10-sesar-aktif-di-indonesia-dari-sumatera-hingga-papua" class="link-info">Active Faults</a></p>
          <p><a href="https://id.wikipedia.org/wiki/Daftar_gempa_bumi_di_Indonesia" class="link-info">Earthquakes</a></p>
        
        </div>
          -->
      </footer>

</x-app-layout>
