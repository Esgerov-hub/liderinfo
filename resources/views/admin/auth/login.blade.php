<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Liderinfo.org - Daxil ol</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Liderinfo.org" name="description" />
    <meta content="Liderinfo.org" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">

                        <div class="card-body pt-0">

                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('admin.loginAccept') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">E-poçt</label>
                                        <input type="text" name="email" class="form-control" id="username" placeholder="Zəhmət olmas e-poçtunuzu qeyd edin">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Şifrə</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control" placeholder="*******" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Daxil ol</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>  <i class="mdi mdi-heart text-danger"></i>
                                by Anvar Asgarov
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>
</html>
