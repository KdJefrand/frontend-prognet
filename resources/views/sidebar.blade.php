<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/Dashboard">Sensus Pintar</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <button id="logoutButton" class="dropdown-item">Logout</button>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="/KK">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kartu Keluarga
                            </a>
                            <a class="nav-link" href="/AnggotaKK">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Anggota Keluarga
                            </a>
                            <a class="nav-link" href="/HubunganKK">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Hubungan Keluarga
                            </a>
                            <a class="nav-link" href="/Penduduk">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Penduduk
                            </a>
                            <a class="nav-link" href="/Agama">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Agama
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script>
                document.getElementById('logoutButton').addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default action

                    axios.get('https://api-group4-prognet.manpits.xyz/api/logout', {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token') // Use the token from local storage
                        }
                    })
                    .then(function(response) {
                        // Handle successful logout (e.g., redirect to login page)
                        console.log(response.data);
                        localStorage.removeItem('token'); // Remove the token from local storage
                        window.location.href = '/'; // Redirect to login page
                    })
                    .catch(function(error) {
                        // Handle logout error
                        console.error(error.response.data);
                    });
                });
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css"/>
            <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>