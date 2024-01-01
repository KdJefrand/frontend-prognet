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
                        <h1 class="mt-4">AGAMA</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Data-data agama
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="/Agama/create" type="button" class="btn btn-primary">Tambah Agama</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Agama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="badan">
                                
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{ asset('js/scripts.js')}}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch('https://api-group4-prognet.manpits.xyz/api/Agama', {
                    headers: {
                        'Authorization' : 'Bearer '+ localStorage.getItem('token')
                    }
                })
                .then(response => response.json())
                .then(data => {
                // Get the table body element
                const tableBody = document.querySelector('tbody');
                let number = 1;
    
                // Loop through the data and create table rows
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        const numCell = document.createElement('td');
                        const agamaCell = document.createElement('td');
                        const actionCell = document.createElement('td');
        
                        // Set the content of each cell
                        numCell.textContent = number;
                        agamaCell.textContent = item.agama;
                        number++;
        
                        // Create Edit button
                        const editButton = document.createElement('button');
                        editButton.textContent = 'Edit';
                        editButton.className = 'btn btn-warning me-2';
                        editButton.addEventListener('click', () => {
                        // Add logic to handle edit button click (e.g., redirect to edit page)
                        window.location.href = `/Agama/${item.id}`
                        });
        
                        // Create Delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.className = 'btn btn-danger';
                        deleteButton.addEventListener('click', () => {
                            fetch(`https://api-group4-prognet.manpits.xyz/api/Agama/${item.id}`, {
                                headers: {
                                    'Authorization' : 'Bearer '+ localStorage.getItem('token')
                                },
                                method: 'DELETE'
                            })
                            .then(response => {
                            if (response.ok) {
                            // Handle successful deletion (e.g., remove the row from the table)
                            row.remove();
                            console.log(`Item with ID ${item.id} deleted successfully`);
                            } else {
                            // Handle unsuccessful deletion (e.g., show an error message)
                            console.error('Error deleting item:', response.statusText);
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting item:', error);
                        });
                        });
        
                        // Append buttons to the action cell
                        actionCell.appendChild(editButton);
                        actionCell.appendChild(deleteButton);
        
                        // Append cells to the row
                        row.appendChild(numCell);
                        row.appendChild(agamaCell);
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
