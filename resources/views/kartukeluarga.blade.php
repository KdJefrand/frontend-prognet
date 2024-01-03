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
    <title>KartuKK - KK</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        table {
            width: 100%;
            table-layout: fixed;
        }

        table th:nth-child(1),
        table td:nth-child(1) {
            width: 5%;
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
                <h1 class="mt-4">KARTU KELUARGA</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        Data-data Kartu Keluarga
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <a href="/KK/create" type="button" class="btn btn-primary">Tambah KK</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No KK</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('https://api-group4-prognet.manpits.xyz/api/KK', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Get the table body element
                    const tableBody = document.querySelector('tbody');
                    let num = 1;

                    // Loop through the data and create table rows
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        const numCell = document.createElement('td');
                        const nokkCell = document.createElement('td');
                        const statusaktifCell = document.createElement('td');
                        const actionCell = document.createElement('td');

                        // Set the content of each cell
                        numCell.textContent = num;
                        nokkCell.textContent = item.nokk;
                        if (item.statusaktif == 1) {
                            statusaktifCell.textContent = 'Aktif';
                        } else {
                            statusaktifCell.textContent = 'Tidak Aktif';
                        }
                        num++;

                        // Create detail button
                        const detailButton = document.createElement('button');
                        detailButton.textContent = 'Detail';
                        detailButton.className = 'btn btn-secondary me-2';
                        detailButton.addEventListener('click', () => {
                            // Add logic to handle detail button click (e.g., redirect to detail page)
                            window.location.href = `/KK/Anggota/${item.nokk}`
                        });

                        // Create Edit button
                        const editButton = document.createElement('button');
                        editButton.textContent = 'Edit';
                        editButton.className = 'btn btn-warning me-2';
                        editButton.addEventListener('click', () => {
                            // Add logic to handle edit button click (e.g., redirect to edit page)
                            window.location.href = `/KK/${item.id}`
                        });

                        // Create Delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.className = 'btn btn-danger';
                        deleteButton.addEventListener('click', () => {
                            fetch(`https://api-group4-prognet.manpits.xyz/api/KK/${item.id}`, {
                                    headers: {
                                        'Authorization': 'Bearer ' + localStorage.getItem(
                                            'token')
                                    },
                                    method: 'DELETE'
                                })
                                .then(response => {
                                    if (response.ok) {
                                        // Handle successful deletion (e.g., remove the row from the table)
                                        row.remove();
                                        console.log(
                                            `Item with ID ${item.id} deleted successfully`
                                        );
                                    } else {
                                        // Handle unsuccessful deletion (e.g., show an error message)
                                        console.error('Error deleting item:', response
                                            .statusText);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error deleting item:', error);
                                });
                        });

                        // Append buttons to the action cell
                        actionCell.appendChild(detailButton);
                        actionCell.appendChild(editButton);
                        actionCell.appendChild(deleteButton);

                        // Append cells to the row
                        row.appendChild(numCell);
                        row.appendChild(nokkCell);
                        row.appendChild(statusaktifCell);
                        row.appendChild(actionCell);

                        // Append the row to the table body
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    </script>
</body>

</html>
