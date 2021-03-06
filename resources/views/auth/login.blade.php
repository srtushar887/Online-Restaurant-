<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FooYes - Quality delivery or takeaway food">
    <meta name="author" content="Ansonika">
    <title>FooYes - Quality delivery or takeaway food</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('assets/frontend/')}}/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('assets/frontend/')}}/css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="{{asset('assets/frontend/')}}/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('assets/frontend/')}}/css/order-sign_up.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('assets/frontend/')}}/css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">

<div id="register">
    <aside>
        <figure>
            <a href="index.html"><img src="{{asset('assets/frontend/')}}/img/logo_sticky.svg" width="140" height="35"
                                      alt=""></a>
        </figure>
        <div class="access_social">
            <a href="#0" class="social_bt facebook">Login with Facebook</a>
            <a href="#0" class="social_bt google">Login with Google</a>
        </div>
        <div class="divider"><span>Or</span></div>
        <form autocomplete="off" action="{{route('user.login.submit')}}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                
                <div class="float-right"><a id="forgot" href="#0">Forgot Password?</a></div>
            </div>

            <button type="submit" class="btn_1 gradient full-width">Login Now!</button>
            <div class="text-center mt-2"><small>Don't have an acccount? <strong><a href="{{route('register')}}">Sign
                            Up</a></strong></small></div>
        </form>
        <div class="copy">?? 2020 FooYes</div>
    </aside>
</div>
<!-- /login -->

<!-- COMMON SCRIPTS -->
<script src="{{asset('assets/frontend/')}}/js/common_scripts.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/common_func.js"></script>
{{--<script src="{{asset('assets/frontend/')}}/assets/validate.js"></script>--}}

</body>
</html>
