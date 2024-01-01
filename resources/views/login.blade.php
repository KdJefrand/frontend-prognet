<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg-primary">
    <div class="container">
    <div class="card mt-5 mx-auto p-3" style="width: 450px;">
        <div class="card-body">
            <form action="https://api-group4-prognet.manpits.xyz/api/login" method="POST">
              @csrf
                <div>
                    <p class="text-center fs-4">Selamat Datang</p>
                    <br>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Email Anda" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-100" >Login</button>
                </div>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="register.html" style="text-decoration: none;">Belum punya akun? Register</a>
            </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('exampleInputPassword1').value;

        axios.post('https://api-group4-prognet.manpits.xyz/api/login', {
            email: email,
            password: password,
        })
        .then(function (response) {
            // Handle successful login (e.g., redirect)
            console.log(response.data);
            const token = response.data.token;
            localStorage.setItem('token', token);
            
            const redirectTo = response.data.redirectTo;
            window.location.href = redirectTo;
        })
        .catch(function (error) {
            // Handle login error
            console.error(error.response.data);
            alert('Login failed. ' + error.response.data.message);
        });
    });
</script>
</html>