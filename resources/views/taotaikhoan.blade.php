@extends('layouts.app')

@section('title', 'Tạo Tài Khoản')

@section('content')

      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tạo tài khoản</h3>
                <p class="text-subtitle text-muted">Tạo tài khoản mới cho cán bộ.</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tạo tài khoản</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <section class="bootstrap-select">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="row justify-content-center">
                        <div class="text-center mt-4 mb-4">
                          <h3>TẠO TÀI KHOẢN MỚI</h3>
                        </div>
                        @if (session('message'))
                        <span class="aler aler-danger">
                          <strong>{{session('message')}}</strong>
                        </span>
                        @endif
                        <div class="col-md-6 col-12">
                          <div class="card">
                            <div class="card-content">
                              <div class="card-body">
                                <form class="form border border-secondary" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <div class="form-body">
                                    <div class="form-group">
                                      <label>Họ Tên</label>
                                      <input type="text" class="form-control mt-2 py-2" name="name">
                                      @if ($errors->has('name'))
                                      {{ $errors->first('name')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="text" class="form-control mt-2 py-2" name="email">
                                      @if ($errors->has('email'))
                                      {{ $errors->first('email')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Số Điện Thoại</label>
                                      <input type="text" class="form-control mt-2 py-2" name="phone">
                                      @if ($errors->has('phone'))
                                      {{ $errors->first('phone')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Tên Tài Khoản</label>
                                      <input type="text" class="form-control mt-2 py-2" name="username">
                                      @if ($errors->has('username'))
                                      {{ $errors->first('username')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label for="password-vertical">Mật khẩu mới</label>
                                      <input type="password" id="password" class="form-control mt-2 py-2" name="password" placeholder="********">
                                      @if ($errors->has('password'))
                                      {{ $errors->first('password')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label for="password-vertical">Xác nhận mật khẩu</label>
                                      <input type="password" id="password-confirm" class="form-control mt-2 py-2" name="password_confirm" placeholder="********">
                                      @if ($errors->has('password_confirm'))
                                      {{ $errors->first('password_confirm')}}
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-actions d-flex justify-content-end mt-4">
                                    <button type="reset" class="btn btn-light-primary me-2">Hủy bỏ</button>
                                    <button type="submit" class="btn btn-primary ">Lưu</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Bootstrap Select end -->
        </div>
      </div>
 @endsection