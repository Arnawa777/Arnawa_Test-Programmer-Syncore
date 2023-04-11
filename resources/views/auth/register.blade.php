<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/sign.css">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container" id="container-register"></div>
    <div>
        <a href="/">
            <i class="close-left fa-solid fa-xmark"></i>
        </a>
        <div class="forms-container">
            <div class="register">
                <form action="{{ route('user.register') }}" method="POST" class="register-form">
                    @csrf
                    <h2 class="title">{{ $title }}</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-at"></i>
                        <input type="email" name="email" id="email" 
                        placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        <small><span> {{ $message }} </span></small>
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password">
                        @error('password')
                        <small><span> {{ $message }} </span></small>
                        @enderror
                    </div>
                    <input type="submit" value="Register" class="btn solid">
                    <div id="link-responsive" style="text-align: center;">
                        <h5>Sudah memiliki Akun?</h5>
                        <a href="/login">Login</a>
                    </div>
                    
                </form>

                <div class="panel right-panel">
                    <div class="content-register">
                        <h3>Sudah memiliki Akun?? </h3>  
                        <a href="{{ route('login') }}"><button class="btn transparent" id="login-btn">Login</button></a>
                        
                    </div>
                    {{-- <img src="/img/gunung-wayang.svg" class="gunung-wayang" alt=""> --}}
                </div>
            </div> 
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076c9a6eb.js" crossorigin="anonymous"></script>
</body>
</html>


