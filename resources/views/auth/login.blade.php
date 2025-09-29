<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Skydash</title>
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4>Halo! Selamat datang</h4>
                            <h6 class="fw-light">Silakan login untuk melanjutkan.</h6>

                            <form class="pt-3" method="POST" action="{{ url('/login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="username" class="form-control form-control-lg" name="username" placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                                        LOGIN
                                    </button>
                                </div>
                                @error('username')
                                    <div class="text-danger mt-2 small">{{ $message }}</div>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>

    <script src="{{ asset('skydash/dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('skydash/dist/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('skydash/dist/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('skydash/dist/assets/js/template.js') }}"></script>
</body>
</html>
