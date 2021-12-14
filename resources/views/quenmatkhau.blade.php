<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quên mật khẩu</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/pages/auth.css" />
  </head>

  <body>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-6 col-12">
          <div id="auth-left">
            <h1 class="auth-title">Quên mật khẩu</h1>
            <p class="auth-subtitle mb-5">
              Nhập email của bạn và chúng tôi sẽ gửi mật khẩu mới về email của bạn.
            </p>
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form action="{{ url('/QuenMatKhau') }}" method="POST">
            {{ csrf_field() }}
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" placeholder="Email" name="email"/>
                @if ($errors->has('email'))
                  {{ $errors->first('email')}}
                @endif
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Gửi</button>

            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Nhớ tài khoản của bạn?
                <a href="{{ url('/Login') }}" class="font-bold">Đăng nhập</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
  </body>
</html>
