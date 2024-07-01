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
            <form class="login-form" action="{{route('updatePassword')}}" method="post">
                @csrf
                <h3 class="login-head">Change Password</h3>
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
                    <label class="control-label">New Password</label>
                    <input class="form-control w-100" required id='newPss' type="password" name="password" placeholder="New Password">
                    <input type="hidden" name="old_token" value="{{$old_token}}">
                </div>
                <div class="form-group">
                    <label for='conPss'>Confirm Password</label>
                    <input class="form-control w-100" required id='conPss' type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block">Update Password</button>
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
