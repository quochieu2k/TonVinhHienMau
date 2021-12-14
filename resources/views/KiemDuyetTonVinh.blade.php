@extends('layouts.app')

@section('title', 'Kiểm Duyệt Tôn Vinh')

@section('content')
        <div id="main-content">
          <div class="page-heading">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>Kiểm duyệt tôn vinh</h3>
                  <p class="text-subtitle text-muted">Kiểm duyệt các đề xuất tôn vinh</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Kiểm duyệt tôn vinh
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>

            <!-- Section table -->
            <section class="bootstrap-select">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                      <form action ="">
                      {{ csrf_field() }}
                        <div class="row">
                          <div class="text-center mt-4 mb-5">
                            <h3>DANH SÁCH KIỂM DUYỆT CÁC ĐỀ XUẤT TÔN VINH</h3>
                          </div>
                          <!-- Button -->
                          <div id="btn-right">
                            <button
                              class="btn btn-primary btn-set"
                              type="submit"
                              id="btn-apply-all"
                            >
                              Apply All
                            </button>
                            <a
                              class="btn btn-primary btn-set ms-3"
                              type="button"
                              id="btn-ket-qua"
                              href="{{ url('/KetQuaTonVinh?id='.$idTV.'&dv='.$idDV.'&max='.$max) }}"
                            >
                              Kết quả
                            </a>
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
                                  <th>Đề xuất tôn vinh</th>
                                  <th>Đã tôn vinh</th>
                                  <th>Năm tôn vinh</th>
                                  <th></th>
                                </tr>
                              </thead>
                              @for($i = 0; $i < count($data); $i++)
                              <tbody id="tbody_{{ $data[$i][0]->Id }}">
                              @for ($j = 0; $j < count($data[$i]); $j++)
                              @if ($j == 0)
                                <tr style="background: rgba(67, 190, 133, 0.25)">
                                  <td>
                                    {{ $i + 1 }}
                                    <img class="icon" src="assets/images/logo/excel.png" />
                                  </td>
                                  <td class="text-bold-500">{{ $data[$i][$j]->HoTen }}</td>
                                  <td>{{ $data[$i][$j]->NgaySinh->format('d/m/Y') }}</td>
                                  <td class="text-bold-500">{{ $data[$i][$j]->NoiLamViec ?? "-" }}</td>
                                  <td>{{ $data[$i][$j]->SDT ?? "-" }}</td>
                                  <td>{{ $data[$i][$j]->DiaChi ?? "-"}}</td>
                                  <td>{{ $data[$i][$j]->SoLanHien }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_ABO }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_Rh ?? "-"}}</td>
                                  <td>{{ $data[$i][$j]->MucTonVinh }}</td>
                                  <td></td>
                                  <td></td>
                                  <td>
                                    @if($data[$i][$j]->flag=='warning')
                                      <img src="assets/images/logo/high_priority_48px.png" alt="" />
                                    @endif
                                  </td>
                                </tr>
								                @else
								
                                <tr>
                                  <td>
                                  {{ $i + 1 }}
                                    <img class="icon" src="assets/images/logo/database_16px.png" />
                                    <input type="hidden" name="dataID[]" value="{{ $data[$i][0]->Id }}"/>
                                  </td>
                                  <td class="text-bold-500"></td>
                                  <td></td>
                                  <td class="text-bold-500">{{ $data[$i][$j]->NoiLamViec }}</td>
                                  <td>{{ $data[$i][$j]->SDT }}</td>
                                  <td>{{ $data[$i][$j]->DiaChi }}</td>
                                  <td>{{ $data[$i][$j]->SoLanHien }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_ABO }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_Rh }}</td>
                                  <td>
                                    <select class="select-no-width mb-2 ms-sm-2" id="select-{{ $data[$i][0]->Id }}" name="dataSelect[]">
                                      <option value="0">Không</option>
                                      <option value="5" {{ ($data[$i][$j]->MucTonVinh==5) ? ' selected="selected"' : '' }}>Mức 5</option>
                                      <option value="10" {{ ($data[$i][$j]->MucTonVinh==10) ? ' selected="selected"' : '' }}>Mức 10</option>
                                      <option value="15" {{ ($data[$i][$j]->MucTonVinh==15) ? ' selected="selected"' : '' }}>Mức 15</option>
                                      <option value="20" {{ ($data[$i][$j]->MucTonVinh==20) ? ' selected="selected"' : '' }}>Mức 20</option>
                                      <option value="30" {{ ($data[$i][$j]->MucTonVinh==30) ? ' selected="selected"' : '' }}>Mức 30</option>
                                      <option value="40" {{ ($data[$i][$j]->MucTonVinh==40) ? ' selected="selected"' : '' }}>Mức 40</option>
                                    </select>
                                    @if( $data[$i][$j]->flag == "green")
                                      <img src="assets/images/logo/green_circle_48px.png" />
                                    @elseif( $data[$i][$j]->flag == "yellow")
                                      <img src="assets/images/logo/yellow_circle_48px.png" />
                                    @else
                                      <img src="assets/images/logo/red_circle_48px.png" />
                                    @endif
                                  </td>
                                  <td>
                                    <!--<img src="assets/images/logo/5_48px.png" />-->
                                    @if( $data[$i][$j]->Muc_5 != NULL )
                                      <img src="assets/images/logo/5_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_10 != NULL )
                                      <img src="assets/images/logo/10_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_15 != NULL )
                                      <img src="assets/images/logo/15_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_20 != NULL )
                                      <img src="assets/images/logo/20_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_30 != NULL )
                                      <img src="assets/images/logo/30_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_40 != NULL )
                                      <img src="assets/images/logo/40_48px.png" />
                                      @endif
                                    @if( $data[$i][$j]->Muc_50 != NULL )
                                      <img src="assets/images/logo/50_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_60 != NULL )
                                      <img src="assets/images/logo/60_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_70 != NULL )
                                      <img src="assets/images/logo/70_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_80 != NULL )
                                      <img src="assets/images/logo/80_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_90 != NULL )
                                      <img src="assets/images/logo/90_48px.png" />
                                    @endif
                                    @if( $data[$i][$j]->Muc_100 != NULL )
                                      <img src="assets/images/logo/100_48px.png" />
                                    @endif
                                  </td>
                                  <td>
                                    @if( $data[$i][$j]->Muc_5 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_5))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_10 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_10))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_15 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_15))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_20 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_20))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_30 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_30))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_40 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_40))) }}<br>
                                      @endif
                                    @if( $data[$i][$j]->Muc_50 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_50))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_60 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_60))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_70 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_70))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_80 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_80))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_90 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_90))) }}<br>
                                    @endif
                                    @if( $data[$i][$j]->Muc_100 != NULL )
                                      {{ date("Y",strtotime(str_replace('-','/', $data[$i][$j]->Muc_100))) }}
                                    @endif
                                  </td>
                                  <td></td>
                                </tr>
                                @endif
                                @endfor
                                <tr>
                                  <td colspan="13" style="text-align: right">
                                    <button
                                      class="btn-width btn-primary"
                                      type="button"
                                      id="btn-import"
                                      onclick="EditMucTV({{ $data[$i][0]->Id }});"
                                    >
                                      Apply
                                    </button>
                                  </td>
                                </tr>
                              </tbody>
                            @endfor
                              
                            
                            @for ($j = 0; $j < count($dataWarning); $j++)
							            	<tbody id="tbody_{{ $dataWarning[$j]->Id }}">
                                <tr style="background: rgba(67, 190, 133, 0.25)">
                                  <td>
                                    {{ $j + $i + 1 }}
                                    <img class="icon" src="assets/images/logo/excel.png" />
                                    <input type="hidden" name="dataID[]" value="{{ $dataWarning[$j]->Id }}"/>
                                  </td>
                                  <td class="text-bold-500">{{ $dataWarning[$j]->HoTen }}</td>
                                  <td>{{ $dataWarning[$j]->NgaySinh->format('d/m/Y') }}</td>
                                  <td class="text-bold-500">{{ $dataWarning[$j]->NoiLamViec ?? "-" }}</td>
                                  <td>{{ $dataWarning[$j]->SDT ?? "-" }}</td>
                                  <td>{{ $dataWarning[$j]->DiaChi ?? "-"}}</td>
                                  <td>{{ $dataWarning[$j]->SoLanHien }}</td>
                                  <td>{{ $dataWarning[$j]->Nhom_ABO }}</td>
                                  <td>{{ $dataWarning[$j]->Nhom_Rh ?? "-"}}</td>
                                  <td>{{ $dataWarning[$j]->MucTonVinh }}
                                  <input type="hidden" name="dataSelect[]" value="{{ $dataWarning[$j]->MucTonVinh }}"/>
                                  </td>
                                  <td></td>
                                  <td></td>
                                  <td>
                                      <img src="assets/images/logo/high_priority_48px.png" alt="" />
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="13" style="text-align: right">
                                    <button
                                      class="btn-width btn-primary"
                                      type="button"
                                      id="btn-import"
                                      onclick="XoaXuLyRieng({{ $dataWarning[$j]->Id }})"
                                    >
                                      Xóa
                                    </button>
                                    <button
                                      class="btn-width btn-primary"
                                      type="button"
                                      id="btn-import"
                                      onclick="ApplyXuLyRieng({{ $dataWarning[$j]->Id }})"
                                    >
                                      Apply
                                    </button>
                                  </td>
                                </tr>
                              </tbody>
							              @endfor

                            </table>
                          </div>
                          <!-- Button -->
                          <div id="btn-right">
                            <a
                              href="{{ url('/TimKiemTonVinh') }}"
                              class="btn-width btn-primary btn-set ms-3"
                              type="button"
                              id="btn-tim-tc"
                            >
                              Tìm thủ công
                            </a>
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
    function ApplyXuLyRieng(id){
      $.ajax({
            url: "/api/ApplyXuLyRieng",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id},
            success: function () {
                $("#tbody_"+id).remove();
                alert("Apply thành công!");
            },
            error: function(){
              alert("Đã xảy ra lỗi khi apply!");
            }
      })
    }
    function XoaXuLyRieng(id){
      $.ajax({
            url: "/api/XoaXuLyRieng",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id},
            success: function () {
                $("#tbody_"+id).remove();
                alert("Xóa thành công!");
            },
            error: function(){
              alert("Đã xảy ra lỗi khi xóa!");
            }
      })
    }
    function EditMucTV(id) {
      var valueSelected = $("#select-"+id).children(":selected").val();
      $.ajax({
            url: "/api/EditMucTonVinh",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id, MucTV: valueSelected },
            success: function () {
              $("#tbody_"+id).remove();
                alert("Thay đổi thành công!");
            },
            error: function(){
              alert("Không thể thay đổi thành mức tôn vinh này!");
            }
      })
    }
    $("form").on("submit", function (e) {
    var dataString = $(this).serialize();
     
    $.ajax({
      type: "POST",
      url: "/ImportCoSo/ImportAll",
      data: dataString,
      success: function () {
        alert("Apply thành công!");
      $("#btn-apply-all").remove();
      }
    });
 
    e.preventDefault();
    });
    </script>
@endsection