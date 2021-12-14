<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}" />
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" type="image/x-icon" />
</head>

<body>
    <div id="app">
      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl ms-3">
                <a href="{{ url('/Index') }}">
                  <img src="{{ url('assets/images/faces/1.jpg') }}" alt="Logo" srcset="" />
                </a>
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">{{ Session::get('name') }}</h5>
                <h6 class="text-teal mb-0">{{ '@'.Session::get('username') }}</h6>
              </div>
              <div class="toggler ms-2">
                <a href="#" class="sidebar-hide d-xl-none d-block"
                  ><i class="bi bi-x bi-middle"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Menu</li>

              <li class="sidebar-item @yield('trang-chu')">
                <a href="{{ url('/Index') }}" class="sidebar-link">
                  <i class="bi bi-grid-fill"></i>
                  <span>Trang chủ</span>
                </a>
              </li>

              <li class="sidebar-item has-sub {{ Request::is('ImportCoSo')||Request::is('TimKiemTonVinh') ? ' active' : '' }}">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-stack"></i>
                  <span>Quản lý tôn vinh</span>
                </a>
                <ul class="submenu ">
                  <li class="submenu-item{{ Request::is('ImportCoSo') ? ' active' : '' }}">
                    <a href="{{ url('/ImportCoSo') }}">Kiểm Duyệt Tôn Vinh</a>
                  </li>
                  <li class="submenu-item{{ Request::is('TimKiemTonVinh') ? ' active' : '' }}">
                    <a href="{{ url('/TimKiemTonVinh') }}"> Tìm kiếm thông tin </a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item has-sub {{ Request::is('TaoMoiTonVinh')||Request::is('XemKetQua') ? ' active' : '' }}">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-hexagon-fill"></i>
                  <span>Lịch sử tôn vinh</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item{{ Request::is('TaoMoiTonVinh') ? ' active' : '' }}">
                    <a href="{{ url('/TaoMoiTonVinh') }}">Tạo Mới Tôn Vinh</a>
                  </li>
                  <li class="submenu-item{{ Request::is('XemKetQua') ? ' active' : '' }}">
                    <a href="{{ url('/XemKetQuaTonVinh') }}">Xem Kết Quả</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item has-sub {{ Request::is('ImportBenhVien') ? ' active' : '' }}">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-droplet-fill"></i>
                  <span>Quản lý nguồn máu</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item{{ Request::is('ImportBenhVien') ? ' active' : '' }}">
                    <a href="{{ url('/ImportBenhVien') }}">Import Từ Bệnh viện</a>
                  </li>
                </ul>
              </li>


              <li class="sidebar-item has-sub {{ Request::is('TaoTaiKhoan')||Request::is('DoiMatKhau')||Request::is('UpdateTaiKhoan') ? ' active' : '' }}">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-person-badge-fill"></i>
                  <span>Quản lý tài khoản</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item{{ Request::is('TaoTaiKhoan') ? ' active' : '' }}">
                    <a href="{{ url('/TaoTaiKhoan') }}">Tạo tài khoản</a>
                  </li>
                  <li class="submenu-item{{ Request::is('DoiMatKhau') ? ' active' : '' }}">
                    <a href="{{ url('/DoiMatKhau') }}">Đổi mật khẩu</a>
                  </li>
                  <li class="submenu-item{{ Request::is('UpdateTaiKhoan') ? ' active' : '' }} ">
                    <a href="{{ url('/UpdateTaiKhoan') }}">Sửa/Xóa tài khoản</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a href="{{ url('/Logout') }}" class="sidebar-link">
                  <i class="bi bi-arrow-bar-right"></i>
                  <span>Đăng xuất</span>
                </a>
              </li>
            </ul>
          </div>
          <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
          </button>
        </div>
      </div>

        <div id="main" class="layout-navbar">
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-envelope bi-sub fs-4 text-gray-600"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ Session::get('name') }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ url('assets/images/faces/1.jpg') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ Session::get('name') }}!</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-mid bi bi-gear me-2"></i>
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/Logout') }}">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"> </i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')
        </div>
    </div>
    <script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('assets/js/main.js') }}"></script>
</body>

</html>
