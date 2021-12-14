@extends('layouts.app')

@section('title', 'Tìm Kiếm Thông Tin')

@section('content')

      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tìm kiếm</h3>
                <p class="text-subtitle text-muted">Tìm kiếm, tra cứu thông tin người hiến máu.</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
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
                      <form action="/TimKiemTonVinh" method="GET">
                        <div class="row">
                          <div class="col-3 col-lg-2 col-md-6">
                            <input type="search" class="form-control" placeholder="Họ và tên" name="name">
                          </div>
                          <div class="col-3 col-lg-2 col-md-6">
                            <fieldset class="form-group">
                              <select class="form-select" name="diachi">
                                <option selected disabled>Huyện/TP</option>
                                <option>Quy Nhơn</option>
                                <option>An Nhơn</option>
                                <option>Tuy Phước</option>
                                <option>An Lão</option>
                                <option>Hoài Ân</option>
                                <option>Hoài Nhơn</option>
                                <option>Phù Mỹ</option>
                                <option>Phù Cát</option>
                                <option>Vĩnh Thạnh</option>
                                <option>Vân Canh</option>
                                <option>Tây Sơn</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-3 col-lg-2 col-md-6">
                            <fieldset class="form-group">
                              <select class="form-select" name="solanhienmau">
                                <option selected disabled>Số lần hiến máu</option>
                                <option value="5-9">5 đến dưới 10</option>
                                <option value="10-14">10 đến dưới 15</option>
                                <option value="15-19">15 đến dưới 20</option>
                                <option value="20-29">20 đến dưới 30</option>
                                <option value="30-39">30 đến dưới 40</option>
                                <option value="40-49">40 đến dưới 50</option>
                                <option value="50-59">50 đến dưới 60</option>
                                <option value="60-69">60 đến dưới 70</option>
                                <option value="70-79">70 đến dưới 80</option>
                                <option value="80-89">80 đến dưới 90</option>
                                <option value="90-100">90 đến 100</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-3 col-lg-2 col-md-6">
                            <fieldset class="form-group">
                              <select class="form-select" name="nhommau">
                                <option selected disabled>Nhóm máu</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                                <option value="tatca">Tất cả</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-3 col-lg-2 col-md-6">
                            <fieldset class="form-group">
                              <select class="form-select" name="muctonvinh">
                                <option selected disabled>Mức tôn vinh</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="60">60</option>
                                <option value="70">70</option>
                                <option value="80">80</option>
                                <option value="100">100</option>
                                <option value="tatca">Tất cả</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-3 col-lg-2 col-md-6">
                            <fieldset class="form-group">
                              <select class="form-select" name="trangthai">
                                <option selected disabled>Trạng thái</option>
                                <option value="tonvinh">Tôn vinh</option>
                                <option value="chuatonvinh">Chưa tôn vinh</option>
                              </select>
                            </fieldset>
                          </div>
                        </div>
                        <div id="btn-right">
                          <button class="btn btn-primary btn-set" type="submit" id="btn-timkiem">
                            Tìm kiếm
                          </button>
                        </div>
                        <div class="row">
                          <div class="col-3 col-lg-3 col-md-6">
                            <h6>Sắp xếp</h6>
                            <fieldset class="form-group">
                              <select id="selectSapXep" class="form-select" onchange="sapXep();">
                                <option selected disabled>Chọn sắp xếp</option>
                                <option value="0">Theo tên</option>
                                <option value="8">Theo mức tôn vinh</option>
                                <option value="5">Theo số lần hiến máu</option>
                              </select>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                      <div class="line-set"></div>
                      <div class="card-body">
                        <div class="text-center">
                          <h6 style="font-size: 19px;">Kết Quả Tìm Kiếm</h6><br>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table id="tableData" class="table table-bordered mb-0">
                          <thead>
                            <tr>
                              <th>Họ và tên</th>
                              <th>Ngày sinh</th>
                              <th>Nơi làm việc</th>
                              <th>Số điện thoại</th>
                              <th>Địa chỉ</th>
                              <th>Số lần đã hiến</th>
                              <th>Nhóm máu</th>
                              <th>Nhóm Rh</th>
                              <th>Đã tôn vinh</th>
                              <th>Sửa</th>
                              <th>Chọn</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($nguoihienmau as $pep)
                            <tr>
                              <td class="text-bold-500">{{ $pep->HoTen }}</td>
                              <td>{{ date('d/m/Y',strtotime($pep->NgaySinh)) }}</td>
                              <td class="text-bold-500">{{ $pep->NoiLamViec }}</td>
                              <td>{{ $pep->SDT }}</td>
                              <td>{{ $pep->DiaChi }}</td>
                              <td>{{ $pep->SoLanHien }}</td>
                              <td>{{ $pep->Nhom_ABO }}</td>
                              <td>{{ $pep->Nhom_Rh }}</td>
                              <td>
                              @if( $pep->Muc_5 != NULL )
                                <img src="assets/images/logo/5_48px.png" />
                              @endif
                              @if( $pep->Muc_10 != NULL )
                                <img src="assets/images/logo/10_48px.png" />
                              @endif
                              @if( $pep->Muc_15 != NULL )
                                <img src="assets/images/logo/15_48px.png" />
                              @endif
                              @if( $pep->Muc_20 != NULL )
                                <img src="assets/images/logo/20_48px.png" />
                              @endif
                              @if( $pep->Muc_30 != NULL )
                                <img src="assets/images/logo/30_48px.png" />
                              @endif
                              @if( $pep->Muc_40 != NULL )
                                <img src="assets/images/logo/40_48px.png" />
                              @endif
                              @if( $pep->Muc_50 != NULL )
                                <img src="assets/images/logo/50_48px.png" />
                              @endif
                              @if( $pep->Muc_60 != NULL )
                                <img src="assets/images/logo/60_48px.png" />
                              @endif
                              @if( $pep->Muc_70 != NULL )
                                <img src="assets/images/logo/70_48px.png" />
                              @endif
                              @if( $pep->Muc_80 != NULL )
                                <img src="assets/images/logo/80_48px.png" />
                              @endif
                              @if( $pep->Muc_90 != NULL )
                                <img src="assets/images/logo/90_48px.png" />
                              @endif
                              @if( $pep->Muc_100 != NULL )
                                <img src="assets/images/logo/100_48px.png" />
                              @endif
                              </td>
                              <td><a href="/TimKiemTonVinh/{{$pep->Id}}" class="btn btn-primary btn-size">Sửa</a></td>
                              <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div id="btn-right">
                        <button class="btn btn-primary btn-set" type="button" id="btn-tonvinh">
                          Tôn vinh
                        </button>
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
      <script>
function sapXep() {
    var selectBox = document.getElementById("selectSapXep");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    sortTable("tableData",selectedValue);
}

function sortTable(table_id, sortColumn){
    var tableData = document.getElementById(table_id).getElementsByTagName('tbody').item(0);
    var rowData = tableData.getElementsByTagName('tr');            
    for(var i = 0; i < rowData.length - 1; i++){
        for(var j = 0; j < rowData.length - (i + 1); j++){
            //sort by name
            if(sortColumn == 0){
              x = rowData[j].getElementsByTagName("TD")[sortColumn];
              y = rowData[j+1].getElementsByTagName("TD")[sortColumn];
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                tableData.insertBefore(rowData.item(j+1),rowData.item(j));
              }
            }else
            //sort by number
            if(Number(rowData.item(j).getElementsByTagName('td').item(sortColumn).innerHTML.replace(/[^0-9\.]+/g, "")) < Number(rowData.item(j+1).getElementsByTagName('td').item(sortColumn).innerHTML.replace(/[^0-9\.]+/g, ""))){
                tableData.insertBefore(rowData.item(j+1),rowData.item(j));
            }
        }
    }
}
  // var table, rows, switching, i, x, y, shouldSwitch;
  // table = document.getElementById(idTable);
  // switching = true;
  // /*Make a loop that will continue until
  // no switching has been done:*/
  // while (switching) {
    
  // //   //start by saying: no switching is done:
  // //   switching = false;
  // //   rows = table.rows;
  // //   /*Loop through all table rows (except the
  // //   first, which contains table headers):*/
  // //   for (i = 1; i < (rows.length - 1); i++) {
  // //     //start by saying there should be no switching:
  // //     shouldSwitch = false;
  // //     /*Get the two elements you want to compare,
  // //     one from current row and one from the next:*/
  // //     x = rows[i].getElementsByTagName("TD")[rowIndex];
  // //     y = rows[i + 1].getElementsByTagName("TD")[rowIndex];
  // //     if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
  // //       if(rowIndex == 5){
  // //         if(parseInt(x.innerHTML.toLowerCase())>parseInt(y.innerHTML.toLowerCase())){
  // //           shouldSwitch = true;
  // //           break;
  // //         }
  // //       }else{
  // //         //if so, mark as a switch and break the loop:
  // //         shouldSwitch = true;
  // //         break;
  // //       }
        
  // //     }
  // //   }
  // //   if (shouldSwitch) {
  // //     /*If a switch has been marked, make the switch
  // //     and mark that a switch has been done:*/
  // //     rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
  // //     switching = true;
  // //   }
  // // }

</script>
@endsection