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
        <title>Hubungan - Tambah - KK</title>
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
                        <h1 class="mt-4">HUBUNGAN KELUARGA</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Tambah Hubungan Keluarga
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Input Hubungan Baru</h3></div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="hubungankk" type="text"/>
                                                    <label for="hubungankk">Nama Hubungan</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <a class="btn btn-primary" href="/HubunganKK">Kembali</a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{ asset('js/scripts.js')}}"></script>
        <script>
                document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Get the value of the 'hubungankk' input
        const hubungankkValue = document.getElementById('hubungankk').value;

        // Fetch existing data to check if it already exists
        fetch('https://api-group4-prognet.manpits.xyz/api/HubunganKK', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
        .then(response => response.json())
        .then(existingData => {
            // Check if the data already exists
            const dataExists = existingData.some(item => {
                return item.hubungankk === hubungankkValue;
            });

            if (dataExists) {
                // Handle the case where the data already exists
                alert('Hubungan Ini Sudah Ada!');
            } else {
                // Data doesn't exist, proceed with insertion or saving
                const updatedData = {
                    hubungankk: hubungankkValue
                    // Add other fields if needed
                };

                fetch('https://api-group4-prognet.manpits.xyz/api/HubunganKK', {
                    method: 'POST', // or 'PUT' for updating existing data
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    body: JSON.stringify(updatedData),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Insertion response:', data);
                    // Handle success or redirect if needed
                    if (data !== null) {
                        window.location.href = '/HubunganKK';
                    }
                })
                .catch(error => {
                    console.error('Error inserting data:', error);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching existing data:', error);
        });
    });
        </script>
    </body>
</html>
