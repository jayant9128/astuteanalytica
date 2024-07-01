<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->

    <title>Admin Login</title>
   <link rel="stylesheet" type="text/css" href="{{URL::asset('public/masters/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <section class="login-content">
        <div class="logo text-center">
             
        </div>
        <div class="login-box">
            <form class="login-form" action="{{route('login')}}" method="post">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </p>
                    @endif
                    @endforeach
                </div>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="email" placeholder="Email" autofocus name="email">
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <!-- <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>-->
                        </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
            <form class="forget-form" action="{{route('forgotpassword')}}" method="post">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="email" placeholder="Email" name="email" required>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
     <script src="{{URL::asset('public/masters/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('public/masters/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('public/masters/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('public/masters/js/main.js')}}"></script> 
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{URL::asset('public/masters/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });

    </script>
</body>

</html>
