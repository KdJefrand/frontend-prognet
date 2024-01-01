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
        <title>Agama - Edit - KK</title>
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
                        <h1 class="mt-4">AGAMA</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Edit Agama
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-3 mb-3">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Input Agama Baru</h3></div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="agama" name="agama" type="text" placeholder="" />
                                                    <label for="agama">Nama Agama</label>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <input type="hidden" id="editItemId" name="editItemId">
                                                    <a class="btn btn-primary" href="/Agama">Kembali</a>
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
        <!-- Script to Populate Form with Existing Data -->
        <script>
        // Get the item ID from the URL
        const itemId = window.location.pathname.split('/').pop();

        // Fetch existing data for editing
        fetch(`https://api-group4-prognet.manpits.xyz/api/Agama/${itemId}`, {
            headers:{
                'Authorization' : 'Bearer ' + localStorage.getItem('token')
            }
        })
            .then(response => response.json())
            .then(existingData => {
            // Fill the form fields with existing data
            document.getElementById('agama').value = existingData.agama;
            document.getElementById('editItemId').value = existingData.id;
            })
            .catch(error => {
            console.error('Error fetching existing data:', error);
            });
        </script>

        <!-- Script to Handle Edit Form Submission -->
        <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the edited values
            const editedAgama = document.getElementById('agama').value;
            const itemId = document.getElementById('editItemId').value;

            // Prepare the data to be sent to the server for update
            const updatedData = {
            id: itemId,
            agama: editedAgama,
            };

            // Make a PUT request using the Fetch API (replace 'http://example.com/update-endpoint' with your actual update endpoint)
            fetch(`https://api-group4-prognet.manpits.xyz/api/Agama/${itemId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Authorization' : 'Bearer ' + localStorage.getItem('token')
            },
            body: JSON.stringify(updatedData),
            })
            .then(response => response.json())
            .then(data => {
            // Handle the response from the server
            console.log('Update response:', data);

            // Redirect to /Agama on successful update
            if (data !== null) {
                window.location.href = '/Agama';
            }
            })
            .catch(error => {
            console.error('Error updating data:', error);
            });
        });
        </script>
    </body>
</html>
