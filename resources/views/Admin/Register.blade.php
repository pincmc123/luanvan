
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('CoolAdmin-master/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('CoolAdmin-master/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('CoolAdmin-master/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/wow/animate.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/slick/slick.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/select2/select2.min.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('CoolAdmin-master/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('/CoolAdmin-master/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger" style="z-index:2;   position: fixed;
  right: 50px;
  bottom: 50px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="login-form">
                            <form action="{{route('register')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="au-input au-input--full" type="phone" name="phone" placeholder="phone">
                                </div>
                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="gender" value="Male" class="form-check-input">Male
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="gender" value="Female" class="form-check-input">Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="#">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('CoolAdmin-master/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('CoolAdmin-master/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('CoolAdmin-master/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('CoolAdmin-master/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('CoolAdmin-master/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('CoolAdmin-master/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('CoolAdmin-master/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
