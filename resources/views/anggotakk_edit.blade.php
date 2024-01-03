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
    <title>Anggota - Edit - KK</title>
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
                <h1 class="mt-4">ANGGOTA KK</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        Edit Anggota KK
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Edit Anggota Baru</h3>
                                </div>
                                <div class="card-body">
                                    <form id="myForm">
                                        <div class="form-floating mb-3">
                                            <select id="nokk" class="form-control">
                                                <option selected hidden>Pilih No. KK</option>
                                            </select>
                                            <label for="nokk">No. KK</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select id="nama" class="form-control">
                                                <option selected hidden>Pilih Penduduk</option>
                                            </select>
                                            <label for="nama">Nama Penduduk</label>
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
                                        <input type="hidden" id="editItemId" name="editItemId">
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="btn btn-primary" id="back">Kembali</a>
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
        let backId = '';
        document.addEventListener('DOMContentLoaded', function() {
            const nokkSelect = document.getElementById('nokk');

            fetch('https://api-group4-prognet.manpits.xyz/api/KK', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(kk => {
                        const option = document.createElement('option');
                        option.value = kk.id;
                        option.textContent = kk.nokk;
                        nokkSelect.appendChild(option);

                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            const namaSelect = document.getElementById('nama');

            fetch('https://api-group4-prognet.manpits.xyz/api/Penduduk', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(penduduk => {
                        const option = document.createElement('option');
                        option.value = penduduk.id;
                        option.textContent = penduduk.nama;
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
                    data.forEach(hubungankk => {
                        const option = document.createElement('option');
                        option.value = hubungankk.id;
                        option.textContent = hubungankk.hubungankk;
                        hubungankkSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            // Get the item ID from the URL
            const itemId = window.location.pathname.split('/').pop();

            // Fetch existing data for editing
            fetch(`https://api-group4-prognet.manpits.xyz/api/AnggotaKK/${itemId}`, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(existingData => {
                    // Check if data is not empty
                    if (existingData.length > 0) {
                        // Select the correct option in the dropdown
                        setTimeout(() => {
                            const kkId = document.getElementById('nokk');
                            const selectedNokk = kkId.querySelector(
                                `option[value="${existingData[0].kk_id}"]`);

                            console.log(existingData[0].kk_id);
                            if (selectedNokk) {
                                selectedNokk.selected = true;
                                backId = selectedNokk.textContent;
                                document.getElementById('back').href = `/KK/Anggota/${backId}`
                            }

                            const pendudukId = document.getElementById('nama');
                            const selectedPenduduk = pendudukId.querySelector(
                                `option[value="${existingData[0].penduduk_id}"]`);
                            console.log(existingData[0].penduduk_id);
                            if (selectedPenduduk) {
                                selectedPenduduk.selected = true;
                            }

                            const hubungankkId = document.getElementById('hubungankk');
                            const selectedHubungankk = hubungankkId.querySelector(
                                `option[value="${existingData[0].hubungankk_id}"]`);
                            console.log(existingData[0].hubungankk_id);
                            if (selectedHubungankk) {
                                selectedHubungankk.selected = true;
                            }
                        }, 1000);

                        const statusaktifId = document.getElementById('statusaktif');
                        const selectedstatusaktif = statusaktifId.querySelector(
                            `option[value="${existingData[0].statusaktif}"]`);
                        console.log(existingData[0].statusaktif);
                        if (selectedstatusaktif) {
                            selectedstatusaktif.selected = true;
                        }
                        document.getElementById('editItemId').value = existingData[0].id;
                    }
                })
                .catch(error => {
                    console.error('Error fetching existing data:', error);
                });

            document.getElementById('myForm').addEventListener('submit', function(event) {
                event.preventDefault();

                // Get the edited values
                const nokkValue = document.getElementById('nokk').value;
                const namaValue = document.getElementById('nama').value;
                const hubungankkValue = document.getElementById('hubungankk').value;
                const statusaktifValue = document.getElementById('statusaktif').value;
                const itemId = document.getElementById('editItemId').value;

                // Prepare the data to be sent to the server for update
                const updatedData = {
                    id: itemId,
                    kk_id: nokkValue,
                    penduduk_id: namaValue,
                    hubungankk_id: hubungankkValue,
                    statusaktif: statusaktifValue,
                };

                fetch(`https://api-group4-prognet.manpits.xyz/api/AnggotaKK/${itemId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + localStorage.getItem('token')
                        },
                        body: JSON.stringify(updatedData),
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response from the server
                        console.log('Update response:', data);

                        // Redirect to /Penduduk on successful update
                        if (data !== null) {
                            console.log(backId);
                            window.location.href = `/KK/Anggota/${backId}`;
                        }
                    })
                    .catch(error => {
                        console.error('Error updating data:', error);
                    });
            });
        });
    </script>
</body>

</html>
