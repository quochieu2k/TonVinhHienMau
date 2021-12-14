@extends('layouts.app')

@section('title', 'Kết Quả Tôn Vinh')

@section('content')
<!-- Section table -->
<section class="bootstrap-select">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="text-center mt-1 mb-3">
                            <h3>DANH SÁCH CÁC ĐỀ XUẤT TÔN VINH ĐƯỢC DUYỆT</h3>
                          </div>
                          <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php
                                $arr = array(5,10,15,20,30,40,50,60,70,80,90,100); 
                            ?>
                                @for($i = 0; $i <= array_search($max,$arr); $i++)
                                    <li class="nav-item" role="presentation">
                                        <a
                                        class="nav-link {{ $i==0 ? 'active' : '' }}"
                                        id="tab-{{ $arr[$i] }}"
                                        data-bs-toggle="tab"
                                        href="#muc{{ $arr[$i] }}"
                                        role="tab"
                                        aria-controls="muc{{ $arr[$i] }}"
                                        aria-selected="{{ $i==0 ? 'true' : 'false' }}"
                                        >Mức {{ $arr[$i] }}</a
                                        >
                                        </li>
                                @endfor

                        
                           
                              
                              
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <!-- Mức 5 -->
                              @for ($i = 0; $i <= array_search($max,$arr); $i++)
                              <div
                                class="tab-pane fade{{ $i==0 ? 'show active' : '' }}"
                                id="muc{{ $arr[$i] }}"
                                role="tabpanel"
                                aria-labelledby="tab-{{ $arr[$i] }}"
                              >
                                <strong style="font-weight: 800; font-size: 16px">
                                  Tổng số người được đề xuất tôn vinh: 
                                  <?php
                                    $tong=0;
                                    for ($j = 0; $j < count($data); $j++){
                                        if($data[$j]->MucTonVinh == $arr[$i])
                                            $tong++;
                                    }
                                    echo $tong;
                                  ?>
                                </strong>
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
                                        <th>Sửa tôn vinh</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td
                                          colspan="11"
                                          style="
                                            text-align: center;
                                            background: rgba(67, 190, 133, 0.25);
                                          "
                                        >
                                          <b>{{ $tenDV }}</b>
                                        </td>
                                      </tr>
                                      <?php
                                        $stt = 1;
                                      ?>
                                      @for ($j = 0; $j < count($data); $j++)
                                      @if($data[$j]->MucTonVinh == $arr[$i])
                                      <tr>
                                        <td>{{ $stt }}</td>
                                        <td class="text-bold-500">{{ $data[$j]->HoTen }}</td>
                                        <td>{{ date('d/m/Y',strtotime($data[$j]->NgaySinh)) }}</td>
                                        <td class="text-bold-500">{{ $data[$j]->NoiLamViec }}</td>
                                        <td>{{ $data[$j]->SDT }}</td>
                                        <td>{{ $data[$j]->DiaChi }}</td>
                                        <td>{{ $data[$j]->SoLanHien }}</td>
                                        <td>{{ $data[$j]->Nhom_ABO }}</td>
                                        <td>{{ $data[$j]->Nhom_Rh }}</td>
                                        <td>
                                    @if( $data[$j]->Muc_5 != NULL )
                                      <img src="assets/images/logo/5_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_10 != NULL )
                                      <img src="assets/images/logo/10_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_15 != NULL )
                                      <img src="assets/images/logo/15_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_20 != NULL )
                                      <img src="assets/images/logo/20_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_30 != NULL )
                                      <img src="assets/images/logo/30_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_40 != NULL )
                                      <img src="assets/images/logo/40_48px.png" />
                                      @endif
                                    @if( $data[$j]->Muc_50 != NULL )
                                      <img src="assets/images/logo/50_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_60 != NULL )
                                      <img src="assets/images/logo/60_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_70 != NULL )
                                      <img src="assets/images/logo/70_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_80 != NULL )
                                      <img src="assets/images/logo/80_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_90 != NULL )
                                      <img src="assets/images/logo/90_48px.png" />
                                    @endif
                                    @if( $data[$j]->Muc_100 != NULL )
                                      <img src="assets/images/logo/100_48px.png" />
                                    @endif
                                        </td>
                                        <td>
                                          <select
                                            class="select-no-width mb-3"
                                            id="select-{{ $data[$j]->IdE }}"
                                            disabled="true"
                                          >
                                            <option value="0">Không</option>
                                            <option value="5" {{ ($data[$j]->MucTonVinh==5) ? ' selected="selected"' : '' }}>Mức 5</option>
                                            <option value="10" {{ ($data[$j]->MucTonVinh==10) ? ' selected="selected"' : '' }}>Mức 10</option>
                                            <option value="15" {{ ($data[$j]->MucTonVinh==15) ? ' selected="selected"' : '' }}>Mức 15</option>
                                            <option value="20" {{ ($data[$j]->MucTonVinh==20) ? ' selected="selected"' : '' }}>Mức 20</option>
                                            <option value="30" {{ ($data[$j]->MucTonVinh==30) ? ' selected="selected"' : '' }}>Mức 30</option>
                                            <option value="40" {{ ($data[$j]->MucTonVinh==40) ? ' selected="selected"' : '' }}>Mức 40</option>
                                          </select>
                                          <a class="btn btn-primary btn-size mb-3" onclick="enableButton({{ $data[$j]->IdE }})" id="sua-{{ $data[$j]->IdE }}">Sửa</a>
                                          <a class="btn btn-primary btn-size mb-3" style="display:none" id="ok-{{ $data[$j]->IdE }}" onclick="EditMucTV({{ $data[$j]->IdE }})">OK</a>
                                          <a class="btn btn-primary btn-size mb-3" style="display:none" onclick="Huy({{ $data[$j]->IdE }})" id="huy-{{ $data[$j]->IdE }}">Hủy</a>
                                        </td>
                                      </tr>
                                      <?php
                                        $stt++;
                                      ?>
                                      @endif
                                      @endfor
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              @endfor
                            </div>
                            <!-- Button  -->
                            <div id="btn-right">
                              <button
                                class="btn-width btn-primary btn-set"
                                type="button"
                                id="btn-xuat-excel"
                                onclick="XuatExcel({{ $idTV }},{{ $max }})"
                              >
                                Xuất excel
                              </button>
                              <button
                                class="btn-width btn-primary btn-set ms-3"
                                type="button"
                                id="btn-xac-nhan"
                                onclick="XacNhan({{ $idTV }})"
                              >
                                Xác nhận
                              </button>
                            </div>
                          </div>
                        </div>
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
        function Huy(id){
            $("#ok-"+id).hide();
            $("#huy-"+id).hide();
            $("#sua-"+id).show();
            $("#select-"+id).prop('disabled', true);
        }
        function enableButton(id){
            $("#ok-"+id).show();
            $("#huy-"+id).show();
            $("#sua-"+id).hide();
            $("#select-"+id).prop('disabled', false);
        }
        function EditMucTV(id) {
        var valueSelected = $("#select-"+id).children(":selected").val();
        $.ajax({
                url: "/api/EditMucTonVinh",
                method: "POST",
                data: { "_token": "{{ csrf_token() }}", Id: id, MucTV: valueSelected },
                success: function () {
                    $("#ok-"+id).hide();
                    $("#huy-"+id).hide();
                    $("#sua-"+id).show();
                    $("#select-"+id).prop('disabled', true);
                    alert("Thay đổi thành công!");
                },
                error: function(){
                alert("Không thể thay đổi thành mức tôn vinh này!");
                }
        })
        }
        function XuatExcel(id,maxTV){
            if($("#btn-xac-nhan").is(':visible')){
                alert("Vui lòng xác nhận trước khi xuất Excel");
                return;
            }
            $.ajax({
                url: "/XuatExcel",
                method: "POST",
                data: { "_token": "{{ csrf_token() }}", Id: id, max: maxTV },
                xhr: function () {
                  var xhr = new XMLHttpRequest();
                  xhr.responseType = "blob";
                  return xhr;
                },
                success: function (data, status, xhr) {
                  let filename = "";
                  let disposition = xhr.getResponseHeader('Content-Disposition');
                  if (disposition && disposition.indexOf('attachment') !== -1) {
                      let filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                      let matches = filenameRegex.exec(disposition);
                      if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                  }
                  let a = document.createElement('a');
                  let url = window.URL.createObjectURL(data);
                  a.href = url;
                  a.download = filename.replace('UTF-8', '');;
                  document.body.append(a);
                  a.click();
                  a.remove();
                  window.URL.revokeObjectURL(url);
                },
                error: function(){
                    alert("Không thể xuất file excel, vui lòng thử lại sau!");
                }
            })
        }
        function XacNhan(id){
          if (confirm('Bạn chắc chắn muốn xác nhận thông tin không?')) {
            $.ajax({
                url: "/XacNhan",
                method: "POST",
                data: { "_token": "{{ csrf_token() }}", Id: id },
                success: function () {
                    $("#btn-xac-nhan").hide();
                    alert("Lưu thông tin thành công!");
                },
                error: function(){
                    alert("Đã xảy ra lỗi!");
                }
            })
          }
        }
        </script>
@endsection