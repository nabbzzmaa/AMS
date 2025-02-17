<!doctype html>
<html lang="en">
<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", serif !important;
            background-image: url('img/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000;
        }

        .login-wrap {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 25px;
            width: 65%;
            max-width: 320px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.2);
            transform: scale(1);
            transition: all 0.3s ease-in-out;
        }

        .login-wrap:hover {
            transform: scale(1.02);
            transition: all 0.3s ease-in-out;
        }

        .form-group {
            margin-bottom: 10px;
            position: relative;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(176, 196, 222, 0.5);
            padding: 12px 15px 12px 40px;
            font-size: 16px;
            border-radius: 12px;
            color: #002855;
            width: 100%;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #004080;
            box-shadow: 0 0 5px rgba(0, 64, 128, 0.5);
            outline: none;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            } 
            100% {
                background-position: 0% 50%;
            }
        }

        .btn-primary {
            background: linear-gradient(45deg, #002855, rgb(102, 156, 209), #ffffff); /* Menambahkan warna putih */
            background-size: 200% 200%; /* Membuat gradien lebih besar untuk efek gerakan */
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            animation: gradientMove 6s infinite; /* Animasi gradien berjalan terus */
            color: #fff; /* Tetap putih untuk teks */
        }

        .checkbox-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .checkbox-wrap label {
            margin: 0;
            color: #004080;
        }

        .checkbox-wrap a {
            text-decoration: none;
            color: #004080;
            /* font-weight: bold; */
        }

        .checkbox-wrap a:hover , .checkbox-wrap label:hover{
            color: #002855;
            text-decoration: underline;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #002855;
            font-size: 18px;
            pointer-events: none;
            z-index: 10;
        }

        .form-control {
            padding-left: 45px;
        }

        .logo-container {
            width: 100%;
            max-width: 200px;
            margin: 0 auto 10px auto;
        }

        .logo-container img {
            width: 100%;
            height: auto;
            margin-bottom: 5px;
        }

        .invalid-feedback {
            font-size: 12px;
            color: #002855;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px; /* Sesuaikan ukuran font jika diperlukan */
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <!-- Logo -->
        <div class="logo-container">
            <img src="img/pgncom.png" alt="Logo">
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Field -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-icon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input id="email" type="email" 
                        class="form-control padding-left @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="email" 
                        autofocus 
                        placeholder="Email Address">
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-icon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input id="password-field" type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                        placeholder="Password">
                    <i id="togglePassword" class="fas fa-eye toggle-password"></i>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Remember Me, Register, Forgot Password -->
            <div class="checkbox-wrap">
                <!-- Remember Me -->
                <div>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>

                <!-- Register -->
                <a href="{{ route('register') }}">Register</a>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password-field');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Ubah ikon mata sesuai dengan tipe input
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
