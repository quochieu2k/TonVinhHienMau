@extends('layouts.app')

@section('title', 'Tôn Vinh Hiến Máu')

@section('content')

        <div id="main-content">
          <div class="page-heading">
            <h3>Thống kê thành viên</h3>
          </div>
          <div class="page-content">
            <section class="row">
              <!-- Cột đầu tiên trong main -->
              <div class="col-12 col-lg-9">
                <!-- Hàng thứ nhất -->
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/7.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Bình</h5>
                              <h6 class="text-muted mb-0">@scrummaster</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/8.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Hiếu</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/5.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Hương</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/1.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Hoàng</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/3.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Thu</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/4.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Tấn</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Hàng thứ hai -->
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header mb-1">
                        <h4>Truy cập</h4>
                      </div>
                      <div class="card-body">
                        <div id="chart-profile-visit"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Hàng thứ ba -->
                <div class="row">
                  <!-- Cột thứ nhất -->
                  <div class="col-12 col-xl-4">
                    <div class="card">
                      <div class="card-header mb-1">
                        <h4>Truy cập</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <div class="d-flex align-items-center">
                              <svg
                                class="bi text-primary"
                                width="32"
                                height="32"
                                fill="blue"
                                style="width: 10px"
                              >
                                <use
                                  xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"
                                />
                              </svg>
                              <h5 class="mb-0 ms-3">Table</h5>
                            </div>
                          </div>
                          <div class="col-6">
                            <h5 class="mb-0">862</h5>
                          </div>
                          <div class="col-12">
                            <div id="chart-europe"></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="d-flex align-items-center">
                              <svg
                                class="bi text-success"
                                width="32"
                                height="32"
                                fill="blue"
                                style="width: 10px"
                              >
                                <use
                                  xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"
                                />
                              </svg>
                              <h5 class="mb-0 ms-3">Mobile</h5>
                            </div>
                          </div>
                          <div class="col-6">
                            <h5 class="mb-0">375</h5>
                          </div>
                          <div class="col-12">
                            <div id="chart-america"></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="d-flex align-items-center">
                              <svg
                                class="bi text-danger"
                                width="32"
                                height="32"
                                fill="blue"
                                style="width: 10px"
                              >
                                <use
                                  xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"
                                />
                              </svg>
                              <h5 class="mb-0 ms-3">Laptop</h5>
                            </div>
                          </div>
                          <div class="col-6">
                            <h5 class="mb-0">1025</h5>
                          </div>
                          <div class="col-12">
                            <div id="chart-indonesia"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Cột thứ hai -->
                  <div class="col-12 col-xl-8">
                    <div class="card">
                      <div class="card-header">
                        <h4>Nhận xét mới nhất</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-lg">
                            <thead>
                              <tr>
                                <th>Tên</th>
                                <th>Nhận xét</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="col-3">
                                  <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                      <img src="assets/images/faces/5.jpg" />
                                    </div>
                                    <p class="font-bold ms-3 mb-0">Hương</p>
                                  </div>
                                </td>
                                <td class="col-auto">
                                  <p class="mb-0">
                                    Thiết kế tuyệt vời! Bạn có thể hướng dẫn thiết kế được không?
                                  </p>
                                </td>
                              </tr>
                              <tr>
                                <td class="col-3">
                                  <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                      <img src="assets/images/faces/7.jpg" />
                                    </div>
                                    <p class="font-bold ms-3 mb-0">Bình</p>
                                  </div>
                                </td>
                                <td class="col-auto">
                                  <p class="mb-0">Giao diện bắt mắt, tươi sáng và đẹp.</p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Cột thứ hai trong main -->
              <div class="col-12 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                        <img src="assets/images/faces/2.jpg" alt="Face 1" />
                      </div>
                      <div class="ms-3 name">
                        <h5 class="font-bold">Vu Son Lam</h5>
                        <h6 class="text-muted mb-0">@productowner</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Tin nhắn gần đây</h4>
                  </div>
                  <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="assets/images/faces/4.jpg" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">Tấn</h5>
                        <h6 class="text-muted mb-0">@developer</h6>
                      </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="assets/images/faces/5.jpg" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">Hương</h5>
                        <h6 class="text-muted mb-0">@developer</h6>
                      </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="assets/images/faces/1.jpg" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">Hoàng</h5>
                        <h6 class="text-muted mb-0">@developer</h6>
                      </div>
                    </div>
                    <div class="px-4">
                      <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">
                        Bắt đầu trò chuyện
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Thành viên</h4>
                  </div>
                  <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
    <script src="{{  url('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{  url('assets/js/pages/dashboard.js') }}""></script>
  @endsection