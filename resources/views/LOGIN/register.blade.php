<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .form-container {
            width: 50%;
            max-width: 700px;
            text-align: center;
        }
    </style>
</head>
<body>
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

    <div class="container">
        <div class="form-container">
            <div class="text-center">
                <img src="{{ asset('img/logo4.png') }}" alt="Logo" width="300">
            <form method="POST" action="{{ route('validar-registro') }}">
                @csrf
                <br><br>
                <div class="mb-3">
                    <label for="userInput" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="userInput" name="name" required autocomplete="disable">
                </div>
                <br>
                <div class="mb-3">
                    <label for="nitInput" class="form-label">NIT</label>
                    <input type="text" class="form-control" id="nitInput" name="nit" required autocomplete="disable">
                </div>
                <br>         
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email" required autocomplete="disable">
                </div>
                <br>
                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password" required>
                </div>
                <br><br>
                <div class="">
                    <p>
                        ¿Ya tienes cuenta? <a style="color: RGB(0 130 130);" href="{{ route('login') }}">Inicia sesion</a>
                    </p>
                    
                </div>
                <br>
                <button type="submit" class="fas fa" style="color:white;background-color: RGB(0 130 130); border: RGB(0 130 130); border-radius:20px; height:30px;">REGISTRARSE</button>
                
            </form>
        </div>
    </div>
</body>
</html>
