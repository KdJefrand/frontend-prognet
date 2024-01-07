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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
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
                <h1 class="mt-4">ANGGOTA KK: <span id="nokk"></span></h1>
                <div class="card mb-4">
                    <div class="card-body">
                        Tambah Anggota KK
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Input Anggota Baru</h3>
                                </div>
                                <div class="card-body">
                                    <form id="myForm">
                                        <input type="hidden" id="nokk" name="nokk">
                                        <div class="form-floating mb-3">
                                            <select id="namapenduduk" class="form-control">
                                                <option value="" selected hidden>Pilih Penduduk</option>
                                            </select>
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
                                            <a class="btn btn-primary" id="back" href="/AnggotaKK">Kembali</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemId = window.location.pathname.split('/').pop();
            console.log(itemId);
            document.getElementById('nokk').textContent = itemId;
            const backUrl = `/KK/Anggota/${itemId}`;
            document.getElementById('back').href = backUrl;

            fetch('https://api-group4-prognet.manpits.xyz/api/KK', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(kk => {
                        if (kk.nokk == itemId) {
                            document.getElementById('nokk').value = kk.id;
                            console.log(kk.id);
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            const namaSelect = document.getElementById('namapenduduk');

            fetch('https://api-group4-prognet.manpits.xyz/api/Penduduk', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
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

            const hubungankkSelect = document.getElementById('hubungankk');

            fetch('https://api-group4-prognet.manpits.xyz/api/HubunganKK', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
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
                // Get the values from the form
                const nikValue = document.getElementById('namapenduduk').value;
                const hubValue = document.getElementById('hubungankk').value;

                // Fetch existing data to check if NIK already exists
                fetch('https://api-group4-prognet.manpits.xyz/api/AnggotaKK', {
                        method: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token')
                        }
                    })
                    .then(response => response.json())
                    .then(existingData => {
                        // Check if the NIK already exists
                        const nikExists = existingData.some(anggota => {
                            // console.log(anggota.penduduk_id);
                            // console.log(nikValue);
                            return anggota.penduduk_id == nikValue;
                        });
                        const hubExists = existingData.some(anggota => {
                            console.log(anggota.hubungankk);
                            return anggota.hubungankk == "Kepala Keluarga";
                        });

                        if (nikExists) {
                            // Handle the case where the NIK already exists
                            alert('Penduduk sudah terdaftar!');
                        } else if (hubExists) {
                            alert('Kepala Keluarga sudah ada!');
                        } else {
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
                                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                                    },
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // Handle the response from the server (you can replace this with your logic)
                                    console.log('Server response:', data);
                                    if (data !== null) {
                                        //window.location.href = `/KK/Anggota/${itemId}`;
                                    }
                                })
                                .catch(error => {
                                    console.error('Error submitting form:', error);
                                });
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching existing data:', error);
                    });
            });
        });
    </script>
</body>

</html>
