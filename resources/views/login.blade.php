<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
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
            <h1 class="auth-title">Đăng nhập.</h1>
            <p class="auth-subtitle mb-5">Đăng nhập thông tin của bạn đã đăng ký.</p>
            @if(isset($message))
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @endif
            <form action="{{ url('/Login') }}" method="POST">
            {{ csrf_field() }}
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Tài khoản" name="username"/>
                @if ($errors->has('username'))
                  {{ $errors->first('username')}}
                @endif
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  placeholder="Mật khẩu"
                  name="password"
                />
                @if ($errors->has('password'))
                  {{ $errors->first('password')}}
                @endif
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <div class="form-check form-check-lg d-flex align-items-end">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                  Ghi nhớ
                </label>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Đăng nhập</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p><a class="font-bold" href="{{ url('/QuenMatKhau') }}">Quên mật khẩu?</a></p>
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
