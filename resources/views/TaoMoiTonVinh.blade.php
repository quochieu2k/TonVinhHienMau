@extends('layouts.app')

@section('title', 'Tạo Mới Tôn Vinh')

@section('content')

      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tạo mới tôn vinh</h3>
                <p class="text-subtitle text-muted">Tạo mới đợt tôn vinh.</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tạo mới tôn vinh</li>
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
                          <h3>TẠO MỚI TÔN VINH</h3>
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
                                <form class="form border border-secondary" method="POST">
                                  {{ csrf_field() }}
                                  <div class="form-body">
                                    <div class="form-group">
                                      <label>Chọn Tháng/Năm Đợt Tôn Vinh</label>
                                      <input type="month" class="form-control mt-2 py-2" name="thoi-gian">
                                      @if ($errors->has('thoi-gian'))
                                      {{ $errors->first('thoi-gian')}}
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
                      <div class="row">
                        <div class="table-responsive">
                          <table class="table table-bordered mb-0">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Thông Tin Đợt Tôn Vinh</th>
                                <th>Xóa</th>
                              </tr>
                            </thead>
                            @foreach($list as $item)
                            <tbody>
                              <tr>
                                <td>{{ $item->Id }}</td>
                                <td class="text-bold-500">{{ $item->month."/".$item->year }}</td>
                                <td>
                                  <a href="{{ url('XoaDotTonVinh?id='.$item->Id) }}" class="btn btn-danger btn-size">Xóa</a>
                                </td>
                              </tr>
                            </tbody>
                            @endforeach
                          </table>
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