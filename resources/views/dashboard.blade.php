<!DOCTYPE html>
<html lang="en">
    <head>
        <script>
            if (localStorage.getItem('token') == null) {
                window.location.href = '/login';
            }

            // Fetch Agama count from the API
            fetch('https://api-group4-prognet.manpits.xyz/api/Dashboard', {
              headers: {
                  'Authorization' : 'Bearer '+ localStorage.getItem('token')
              },
            })
                .then(response => response.json())
                .then(data => {
                    // Update the count in the HTML
                    document.getElementById('agamaCount').innerText = data.agama;
                    document.getElementById('pendudukCount').innerText = data.penduduk;
                    document.getElementById('anggotaCount').innerText = data.anggota;
                    document.getElementById('hubunganCount').innerText = data.hubungan;
                    document.getElementById('kkCount').innerText = data.kk;
                })
                .catch(error => {
                    console.error('Error fetching Agama count:', error);
                });
        </script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agama - KK</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
        <style>
            table {
                width: 100%;
                table-layout: fixed;
            }
        
            table th:nth-child(1),
            table td:nth-child(1) {
                width: 10%;
            }
        
            table th:nth-child(2),
            table td:nth-child(2) {
                width: 50%;
            }
        </style>       
    </head>
    <body class="sb-nav-fixed">
        @include('sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                          <div class="card shadow-lg mt-3 me-5 mb-3" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">Agama</h3>
                              <h5 id="agamaCount" class="card-text text-secondary"></h5>
                              <a href="/Agama" class="card-link">Lihat --></a>
                            </div>
                          </div>
                          <div class="card shadow-lg mt-3 me-5 mb-3" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">Penduduk</h3>
                              <h5 id="pendudukCount" class="card-text text-secondary"></h5>
                              <a href="/Penduduk" class="card-link">Lihat --></a>
                            </div>
                          </div>
                          <div class="card shadow-lg mt-3 me-5 mb-3" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">Anggota KK</h3>
                              <h5 id="anggotaCount" class="card-text text-secondary"></h5>
                              <a href="/AnggotaKK" class="card-link">Lihat --></a>
                            </div>
                          </div>
                          <div class="card shadow-lg mt-3 me-5 mb-3" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">Hubungan KK</h3>
                              <h5 id="hubunganCount" class="card-text text-secondary"></h5>
                              <a href="/HubunganKK" class="card-link">Lihat --></a>
                            </div>
                          </div>
                          <div class="card shadow-lg mt-3 me-5 mb-3" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">Kartu Keluarga</h3>
                              <h5 id="kkCount" class="card-text text-secondary"></h5>
                              <a href="/KK" class="card-link">Lihat --></a>
                            </div>
                          </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{ asset('js/scripts.js')}}"></script>
    </body>
</html>
