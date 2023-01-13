<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="DexignZone" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <title>Authentication - {{ config('app.name') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/favicon.png">
    <link href="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/css/style.css" rel="stylesheet">
    {{-- SweetAlert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="javascript:void(0);"><img src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Login ke akunmu!</h4>
                                    @include('notification.index')
                                    <form action="{{ route('login.post') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ms-1 text-white">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Ingat saya!</label>
												</div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div> --}}
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="page-register.html">Sign up</a></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/custom.min.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/deznav-init.js"></script>

</body>
</html>
