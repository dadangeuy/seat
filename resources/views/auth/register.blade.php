<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Seat | Register</title>

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
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <h1 style="font-family: Moon">Create Account</h1>
              <div class="form-group">
                <select class="form-control" name="role" required>
                  <option value="" disabled selected>--- Select your role --</option>
                  <option value="user">User Biasa</option>
                  <option value="restoran">Restoran</option>
                </select>
              </div>
              <hr/>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Nama Mu/Restoranmu" name="name" required />
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="E-mail Anda" name="email" required />
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" required />
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              
              <div>
                <button type="submit" class="btn btn-success submit" style="width: 100%" >Register</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link" style="color: white!important;font-size: 18px">Sudah Punya Akun ?
                  <a href="{{url('/login')}}" style="color: yellow!important;font-size: 18px"> Masuk </a>
                </p>

                <div class="clearfix"></div>
                <br />

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
