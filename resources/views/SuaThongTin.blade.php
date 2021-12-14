@extends('layouts.app')

@section('title', 'Sửa Tài Khoản')

@section('content')

      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sửa tài khoản</h3>
                <p class="text-subtitle text-muted">Sửa thông tin tài khoản cho cán bộ.</p>
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
                          <h3>SỬA THÔNG TIN TÀI KHOẢN</h3>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="card">
                            <div class="card-content">
                              <div class="card-body">
                                <form class="form border border-secondary" method="POST" action="/UpdateTaiKhoan/{{$user->Id}}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <div class="form-body">
                                    <div class="form-group">
                                      <label>Họ Tên</label>
                                      <input type="text" class="form-control mt-2 py-2" name="name" value="{{$user->Name}}">
                                      @if ($errors->has('name'))
                                      {{ $errors->first('name')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Số Điện Thoại</label>
                                      <input type="text" class="form-control mt-2 py-2 " name="phone" value="{{$user->Phone}}">
                                      @if ($errors->has('phone'))
                                      {{ $errors->first('phone')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Tên Tài Khoản</label>
                                      <input type="text" class="form-control mt-2 py-2 " name="username" value="{{$user->UserName}}">
                                      @if ($errors->has('username'))
                                      {{ $errors->first('username')}}
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="text" class="form-control mt-2 py-2 " name="email" value="{{$user->Email}}">
                                      @if ($errors->has('email'))
                                      {{ $errors->first('email')}}
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-actions d-flex justify-content-end mt-4">
                                    <a href="/UpdateTaiKhoan/{{ $user->Id }}">
                                      <button class="btn btn-light-primary me-2">Hủy bỏ
                                      </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary ">Cập nhập
                                    </button>
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