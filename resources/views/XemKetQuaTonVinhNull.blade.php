@extends('layouts.app')

@section('title', 'Xem Kết Quả Tôn Vinh')

@section('content')

<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Year-Picker-Text-Input/yearpicker.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kết quả</h3>
                <p class="text-subtitle text-muted">Xem kết quả tôn vinh của một năm bất kỳ.</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kết quả</li>
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
                      <div class="text-center mt-3 mb-5">
                        <h3>LỊCH SỬ TÔN VINH</h3>
                      </div>

                      <div class="row justify-content-center">
                        <form class="col-3 col-lg-3 col-md-6"method="POST">
                        {{ csrf_field() }}
                          <div class="input-group">
                            <input type="text" class="yearpicker form-control" value="" name="time" />
                            <button class="btn btn-primary" type="submit">Xem Kết Quả</button>
                          </div>
                        </form>


                        <div class="card-body">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"></a>
                            </li>
                          </ul>

                          <div class="tab-content" id="myTabContent">
                            <!-- Năm 2020 -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="table-responsive mt-2">
                                <table class="table table-bordered mb-0">
                                  <thead>
                                    <tr>
                                      <th>Số thứ tự</th>
                                      <th>Họ và tên</th>
                                      <th>Ngày sinh</th>
                                      <th>Nơi làm việc</th>
                                      <th>Số điện thoại</th>
                                      <th>Địa chỉ</th>
                                      <th>Số lần đã hiến</th>
                                      <th>Nhóm máu</th>
                                      <th>Nhóm Rh</th>
                                      <th>Đã tôn vinh</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                  </tbody>
                                </table>
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
      <script src="https://www.jqueryscript.net/demo/Year-Picker-Text-Input/yearpicker.js" async></script>
  @endsection