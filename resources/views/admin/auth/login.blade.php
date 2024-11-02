<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin-assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin-assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('admin-assets') }}/css/style.css" rel="stylesheet">

</head>

<body class="homebgadmin">

<div class="container login-form">

    <div>
        <h1 class="text-white">Welcome Back!</h1>
        <h6 class="text-white">ADMIN LOGIN</h6>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-12">

            <div class=" o-hidden border-0">

                <div class=" p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"></h1>
                                    @include('admin.auth.message')
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="alert-ul">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ route('admin.authenticate') }}" method="POST" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control form-control-user"
                                               name="email" value="{{ @old('email') }}" @error ('email') is-invalid @enderror placeholder="Enter Email Address...">
                                        @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Password </label>
                                        <input type="password" class="form-control form-control-user" id="password"
                                               name="password" @error ('password') is-invalid @enderror placeholder="Password">
                                        @error('password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin-assets') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin-assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('admin-assets') }}/js/sb-admin-2.min.js"></script>

</body>

</html>
