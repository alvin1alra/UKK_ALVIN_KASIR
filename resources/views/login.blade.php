<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: #2f2f2f;
            color: #ffffff;
        }

        .container {
            background-color: #2f2f2f;
            border-color: #2f2f2f;
        }

        .form-control {
            background-color: #4a4a4a;
            color: #ffffff;
            border-color: #2f2f2f;
        }

        .btn-primary {
            background-color: #6a5acd;
            border-color: #6a5acd;
        }

        .btn-primary:hover {
            background-color: #8470ff;
            border-color: #8470ff;
        }

        .btn-secondary {
            background-color: #2f2f2f;
            border-color: #4a4a4a;
        }

        .btn-secondary:hover {
            background-color: #a3a3a3;
            border-color: #a3a3a3;
        }

        .alert-danger {
            background-color: #943434;
            border-color: #943434;
            color: #ffffff;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1>Login</h1>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>
