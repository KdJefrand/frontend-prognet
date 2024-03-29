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
        <title>Kartu - Tambah - KK</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet">   
    </head>
    <body class="sb-nav-fixed">
        @include('sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">KARTU KELUARGA</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Tambah Kartu Keluarga
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Input Kartu Keluarga Baru</h3></div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="nokk" type="number" placeholder="name@example.com" />
                                                    <label for="nokk">No KK</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <Select class="form-control" id="statusaktif">
                                                        <option selected hidden>Pilih Status</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </Select>
                                                    <label for="statusaktif">Status</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <a class="btn btn-primary" href="/KK">Kembali</a>
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
            document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get the value of the 'nokk' input
    const nokkValue = document.getElementById('nokk').value;
    const statusaktifValue = document.getElementById('statusaktif').value;

    // Fetch existing data to check if NoKK already exists
    fetch('https://api-group4-prognet.manpits.xyz/api/KK', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
    })
    .then(response => response.json())
    .then(existingData => {
        // Check if the NoKK already exists
        const nokkExists = existingData.some(kk => {
            return kk.nokk === nokkValue;
        });

        if (nokkExists) {
            // Handle the case where the NoKK already exists
            alert('No KK Sudah Ada!! Gunakan No KK Lain!');
        } else {
            // If NoKK is unique, continue to submit the form data

            // Prepare the form data
            const formData = new FormData();
            formData.append('nokk', nokkValue);
            formData.append('statusaktif', statusaktifValue);

            // Make a POST request using the Fetch API
            fetch('https://api-group4-prognet.manpits.xyz/api/KK', {
                method: 'POST',
                body: formData,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                console.log('Server response:', data);
                if (data !== null) {
                    window.location.href = '/KK';
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

        </script>
    </body>
</html>
