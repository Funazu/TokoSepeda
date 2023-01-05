<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Register | TokoSepeda</title>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-sm-6 col-md-6">
                @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops </strong>Input Gagal. <br> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">Form Register</h3>
                        <hr>
                        <form action="/register" method="POST">
                        @csrf
                        <div class="mb-2">
                            <strong>Nama</strong>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-2">
                            <strong>Username</strong>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username">
                        </div>
                        <div class="mb-2">
                            <strong>Email</strong>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email">
                        </div>
                        <div class="mb-2">
                            <strong>Password</strong>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password">
                        </div>
                        <div class="mb-2">
                            <strong>Address</strong>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="mb-2">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>