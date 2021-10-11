<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-signup p-0">
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">
                <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
                <h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>

                <div class="auth-form-container text-start mx-auto">
                    <form class="auth-form auth-signup-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="email mb-3">
                            <label class="sr-only" for="email">Your Name</label>
                            <input id="name" name="name" type="text" class="form-control signup-name @error('name') is-invalid @enderror" name="name" placeholder="Full name" required="required">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="email mb-3">
                            <label class="sr-only" for="email">Your Email</label>
                            <input id="email" name="email" type="email" class="form-control signup-email @error('email') is-invalid @enderror" placeholder="Email" required="required">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="password mb-3">
                            <label class="sr-only" for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control signup-password @error('password') is-invalid @enderror" placeholder="Create a password" required="required">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="password mb-3">
                            <label class="sr-only" for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control signup-password" placeholder="Confirm Password" required="required">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
                        </div>
                    </form><!--//auth-form-->

                    <div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="{{route('login')}}" >Log in</a></div>
                </div><!--//auth-form-container-->
            </div><!--//auth-body-->
        </div>
    </div>
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder">
        </div>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
                <div class="h-100"></div>
                <div class="overlay-content p-3 p-lg-4 rounded">
                    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>

