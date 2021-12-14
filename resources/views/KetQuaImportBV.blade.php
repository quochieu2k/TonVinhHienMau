@extends('layouts.app')

@section('title', 'Kết Quả Import Bệnh Viện')

@section('content')

            @php
                $listDuplicate = $data['listDuplicate'];
                $listInsert = $data['listInsert'];
                $listUpdate = $data['listUpdate'];
            @endphp
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Kết quả import</h3>
                                <p class="text-subtitle text-muted">Kết quả import từ bệnh viện.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Kết quả import</li>
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
										<form action ="/ImportBenhVien/ImportAll" method="post">
                                        {{ csrf_field() }}
                                            <div class="row">
                                                <div class="text-center mt-1">
                                                    <h3>KẾT QUẢ IMPORT</h3>
                                                    <table class="mx-auto mb-5">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-left">Số người được cập nhật:</td>
                                                                <td>{{ $count['update'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Số người được thêm mới:</td>
                                                                <td>{{ $count['insert'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Số người cần xử lý:</td>
                                                                <td>{{ $count['duplicate'] }}</td>
                                                            </tr>
															@if($count['error']>0)
															<tr>
                                                                <td class="text-left">Lỗi:</td>
                                                                <td>{{ $count['error'] }}</td>
                                                            </tr>
															@endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="line-set mb-4"></div>
                                                <div class="table-responsive">
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
                                                                <th>Chọn</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <!-- những người cần xử lý -->
                                                        @if ($count['duplicate'] > 0)
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="11">
                                                                        <h4>Cần Xử Lý</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            @for ($i = 0; $i < count($listDuplicate); $i++)
                                                                <tbody id="tbody_{{ $listDuplicate[$i][0]->Id }}">
                                                                    @for ($j = 0; $j < count($listDuplicate[$i]); $j++)
                                                                        @if ($j == 0)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $i + 1 }}
                                                                                    <img class="icon"
                                                                                        src="assets/images/logo/excel.png" />
																					<input type="hidden" name="dataID[]" value="{{ $listDuplicate[$i][$j]->Id }}"/>
                                                                                </td>
                                                                                <td class="text-bold-500">
                                                                                    {{ $listDuplicate[$i][$j]->HoTen }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->NgaySinh->format('d/m/Y') }}
                                                                                </td>
                                                                                <td class="text-bold-500">
                                                                                    {{ $listDuplicate[$i][$j]->NoiLamViec }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SDT }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->DiaChi }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SoLanHien }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_ABO }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_Rh }}
                                                                                </td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        @else
                                                                            <tr id="row_{{ $listDuplicate[$i][$j]->Id }}">
                                                                                <td>
                                                                                    {{ $i + 1 }}
                                                                                    <img class="icon"
                                                                                        src="assets/images/logo/database_16px.png" />
																				</td>
                                                                                <td class="text-bold-500"></td>
                                                                                <td></td>
                                                                                <td class="text-bold-500">
                                                                                    {{ $listDuplicate[$i][$j]->NoiLamViec }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SDT }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->DiaChi }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SoLanHien }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_ABO }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_Rh }}
                                                                                </td>
                                                                                <td>
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="flexRadioDefault"
                                                                                        id="flexRadioDefault1" />
                                                                                </td>
                                                                                <td><a onclick="Xoa({{ $listDuplicate[$i][$j]->Id }})"
                                                                                        class="btn btn-primary btn-size">Xóa</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                    <tr>
                                                                        <td colspan="11" style="text-align: right">
                                                                            <button class="btn btn-primary"
                                                                                type="button" id="btn-import" onclick="Import({{ $listDuplicate[$i][0]->Id }})">
                                                                                Import
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endfor
                                                        @endif

                                                        <!-- những người được thêm mới -->
                                                        @if ($count['insert'] > 0)
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="11">
                                                                        <h4>Thêm Mới</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            @for ($i = 0; $i < count($listInsert); $i++)
                                                                <tbody id="tbody_{{ $listInsert[$i]->Id }}">
                                                                    <tr>
                                                                        <td>
                                                                            {{ $i + 1 }}
                                                                            <img class="icon"
                                                                                src="assets/images/logo/excel.png" />
																			<input type="hidden" name="dataID[]" value="{{ $listInsert[$i]->Id }}""/>
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listInsert[$i]->HoTen }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->NgaySinh->format('d/m/Y') }}
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listInsert[$i]->NoiLamViec }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->SDT }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->DiaChi }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->SoLanHien }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->Nhom_ABO }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->Nhom_Rh }}
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td colspan="11" style="text-align: right">
                                                                            <button class="btn btn-primary"
                                                                                type="button" id="btn-import" onclick="Import({{ $listInsert[$i]->Id }})">
                                                                                Import
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endfor
                                                        @endif

                                                        <!-- những người được cập nhật -->
                                                        @if ($count['update'] > 0)
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="11">
                                                                        <h4>Cập Nhật</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            @for ($i = 0; $i < count($listUpdate); $i++)
                                                                <tbody id="tbody_{{ $listUpdate[$i]->Id }}">
                                                                    <tr>
                                                                        <td>
                                                                            {{ $i + 1 }}
                                                                            <img class="icon"
                                                                                src="assets/images/logo/excel.png" />
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listUpdate[$i]->HoTen }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->NgaySinh->format('d/m/Y') }}
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listUpdate[$i]->NoiLamViec }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->SDT }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->DiaChi }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->SoLanHien }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->Nhom_ABO }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->Nhom_Rh }}
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            @endfor
                                                        @endif
														
                                                    </table>
                                                </div>
                                                <div id="btn-right">
                                                    <button class="btn btn-primary btn-set" type="submit"
                                                        id="btn-import-all">
                                                        Import All
                                                    </button>
                                                </div>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    function Xoa(id) {
        $.ajax({
            url: "/api/ImportBenhVien/Xoa",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id },
            success: function (data) {
                $("#row_"+id).remove();
                alert("Xóa thành công!");
            },
			error: function(){
				alert("Có lỗi xảy ra! Vui lòng thử lại");
			}
        })
    }
	function Import(id) {
        $.ajax({
            url: "/api/ImportBenhVien/Import",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id },
            success: function (data) {
                $("#tbody_"+id).remove();
                alert("Import thành công!");
            },
			error: function(){
				alert("Có lỗi xảy ra! Vui lòng thử lại");
			}
        })
    }
</script>
@endsection