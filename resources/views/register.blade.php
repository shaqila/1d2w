<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ODTW | Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet"/>  
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link href="{{asset('assets/style/main.css')}}" rel="stylesheet" />
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="login-box">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @endif
                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card card-signin">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">One Day To Write</p>

                            <form class="form-signin" action="{{route('register_process')}}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="New Email">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
                                </div>
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </form>
                            <a href="{{route('signin')}}" class="sign-text">
                            <p><u>Already Have Account</u></p></a>
                        </div>
                </div>
            </div>
        </div>
    </div>

        <!-- jQuery -->
        <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src=" {{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App 
        -->
        <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

</body>

</html>