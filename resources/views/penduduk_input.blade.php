<!DOCTYPE html>
<html lang="en">
    <head>
        <script>
            if (localStorage.getItem('token') == null) {
                window.location.href = '/login';
            }
        </script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah - Penduduk - KK</title>
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
                width: 65%;
            }
        
            table th:nth-child(2),
            table td:nth-child(2) {
                width: 30%;
            }
        </style>       
    </head>
    <body class="sb-nav-fixed">
        @include('sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PENDUDUK</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Tambah Penduduk
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Input Penduduk Baru</h3></div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="nik" placeholder="NIK" />
                                                    <label for="nik">NIK</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="nama" placeholder="Nama" />
                                                    <label for="nama">Nama Penduduk</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="alamat" placeholder="Alamat" />
                                                    <label for="alamat">Alamat</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="lahir" type="date" placeholder="Tanggal Lahir" />
                                                    <label for="lahir">Tanggal Lahir</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <select class="form-control" name="agama" id="agama">
                                                        <option value="" hidden selected>Pilih disini</option>
                                                    </select>
                                                    <label for="agama">Agama</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <a class="btn btn-primary" href="/Penduduk">Kembali</a>
                                                    <button class="btn btn-primary" type="submit">Buat</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center py-3">
                                        </div>
                                    </div>
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
        <script src="{{ asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{ asset('js/scripts.js')}}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const agamaSelect = document.getElementById('agama');

                fetch('https://api-group4-prognet.manpits.xyz/api/Agama', {
                    headers: {
                        'Authorization' : 'Bearer '+ localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(agama => {
                        const option = document.createElement('option');
                        option.value = agama.id;
                        option.textContent = agama.agama;
                        agamaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                console.error('Error fetching data:', error);
                });
            });
            document.getElementById('myForm').addEventListener('submit', function(event) {
                event.preventDefault();

                // Get the value
                const nikValue = document.getElementById('nik').value;
                const namaValue = document.getElementById('nama').value;
                const alamatValue = document.getElementById('alamat').value;
                const lahirValue = document.getElementById('lahir').value;
                const agamaValue = document.getElementById('agama').value;

                // Prepare the form data
                const formData = new FormData();
                formData.append('nik', nikValue);
                formData.append('nama', namaValue);
                formData.append('alamat', alamatValue);
                formData.append('lahir', lahirValue);
                formData.append('agama_id', agamaValue);

                // Make a POST request using the Fetch API
                fetch('https://api-group4-prognet.manpits.xyz/api/Penduduk', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization' : 'Bearer ' + localStorage.getItem('token')
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server (you can replace this with your logic)
                    console.log('Server response:', data);
                    if (data !== null) {
                        window.location.href = '/Penduduk';
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
            });
        </script>
    </body>
</html>