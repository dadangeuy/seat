<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Seat | Login</title>

    <!-- Bootstrap -->
    <link href="{{asset('gentella/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('gentella/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('gentella/css/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('gentella/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('gentella/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/neon.css')}}" id="style-resource-3">
  </head>

  <body class="login" style="background: url(assets/frontend/images/restoran-2.jpg) no-repeat center center fixed;background-size: cover;color: white">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{route('login')}}">
            {{ csrf_field() }}
              <h1 style="font-family: Moon">Login Form</h1>
              @if (session('status'))
              <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              @if (session('warning'))
                  <div class="alert alert-warning">
                      {{ session('warning') }}
                  </div>
              @endif
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Email" name="email" required />
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" required/>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div> 
                <button type="submit" class="btn btn-success submit" style="width: 100%">Log in</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator" >
                <p class="change_link" style="color: white!important;font-size: 18px">Belum Punya akun?
                  <a href="{{url('/register')}}" style="color: yellow!important;font-size: 18px"> Buat Akun Baru </a>
                </p>
                

                <div>
                  <p style="color: white!important;font-size: 18px">©2018 All Rights Reserved. Seat</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
