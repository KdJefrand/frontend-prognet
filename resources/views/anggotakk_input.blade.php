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
        <title>Anggota - Tambah - KK</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                        <h1 class="mt-4">ANGGOTA KK</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Tambah Anggota KK
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Input Anggota Baru</h3></div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="number" list="datalistNokk" id="nokk" placeholder="Type to search..." autocomplete="off">
                                                    <datalist id="datalistNokk"></datalist>
                                                    <label for="nokk">No. KK</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="number" list="datalistNama" id="namapenduduk" placeholder="Type to search..." autocomplete="off">
                                                    <datalist id="datalistNama"></datalist>
                                                    <label for="namapenduduk">Nama Penduduk</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <select name="hubungankk" id="hubungankk" class="form-control">
                                                        <option selected hidden>Pilih Hubungan</option>
                                                    </select>
                                                    <label for="hubungankk">Hubungan</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <select name="statusaktif" id="statusaktif" class="form-control">
                                                        <option selected hidden>Pilih Status</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                    <label for="statusaktif">Status</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <a class="btn btn-primary" href="/AnggotaKK">Kembali</a>
                                                    <button type="submit" class="btn btn-primary">Buat</button>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{ asset('js/scripts.js')}}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nokkSelect = document.getElementById('datalistNokk');

                fetch('https://api-group4-prognet.manpits.xyz/api/KK', {
                    headers: {
                        'Authorization' : 'Bearer '+ localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(kk => {
                        const option = document.createElement('option');
                        option.textContent = kk.nokk;
                        option.value = kk.id;  
                        nokkSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

                const namaSelect = document.getElementById('datalistNama');

                fetch('https://api-group4-prognet.manpits.xyz/api/Penduduk', {
                    headers: {
                        'Authorization' : 'Bearer '+ localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(row => {
                        const option = document.createElement('option');
                        option.textContent = row.nama;
                        option.value = row.id;  
                        namaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            });

            const hubungankkSelect = document.getElementById('hubungankk');

                fetch('https://api-group4-prognet.manpits.xyz/api/HubunganKK', {
                    headers: {
                        'Authorization' : 'Bearer '+ localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(row => {
                        const option = document.createElement('option');
                        option.textContent = row.hubungankk;  
                        option.value = row.id;
                        hubungankkSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

                document.getElementById('myForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const nokkValue = document.getElementById('nokk').value;
                const namapendudukValue = document.getElementById('namapenduduk').value;
                const hubungankkValue = document.getElementById('hubungankk').value;
                const statusaktifValue = document.getElementById('statusaktif').value;

                // Prepare the form data
                const formData = new FormData();
                formData.append('kk_id', nokkValue);
                formData.append('penduduk_id', namapendudukValue);
                formData.append('hubungankk_id', hubungankkValue);
                formData.append('statusaktif', statusaktifValue);

                // Make a POST request using the Fetch API
                fetch('https://api-group4-prognet.manpits.xyz/api/AnggotaKK', {
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
                        window.location.href = '/AnggotaKK';
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
            });
        </script>
    </body>
</html>