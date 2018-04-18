<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>inter.com</title>
    <link rel="shortcut icon" href="{{asset('img/icons/icon.ico')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">I</h1>

            </div><br><br>
            <!-- <p>Please Login.</p> -->
            <form class="m-t" role="form" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password"  class="form-control" placeholder="Password" required="">
                </div>
                {{-- <div class="form-group">
                  <label> <input type="checkbox" class="i-checks"> Remember me </label>
                </div> --}}
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!-- <a href="{{ route('password.request') }}"><small>Forgot password?</small></a> -->
                {{-- <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> --}}
            </form>
            <p class="m-t"> <small>inter.com App by Romusha Team &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
