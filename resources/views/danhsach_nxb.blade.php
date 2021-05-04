@extends('link')
@section('menu2') 
active

@endsection

@section('kethuagiua')

<div class="tong">

  <a href="admin/themnhaxb"   class="btn btn-success" >Thêm Nhà XB</a>
    
      <table class="table-responsive-sm table table-bordered" id="editable-usage">
          <thead>
              <tr>
             
                  <th>Mã Nhà Xuất Bản</th>
                  <th>Tên Nhà Xuất Bản</th>
                 
                  <th colspan="2">Action</th>
              </tr>
          </thead>
          <tbody>
    
              @foreach($nhaxb as $row)
              <tr>
                  <td>{{$row->ma_nxb}}</td>
                  <td>{{$row->ten_nxb}}</td>
              
                  <td>
                      <a href="admin/suanxb/{{$row->id_nxb}}" class="btn btn-primary btn-sm ">Sửa</a> 
                      <a href="admin/xoanxb/{{$row->id_nxb}}" class="btn btn-danger btn-sm" >Xóa</a>
                  </td>
              </tr>
              @endforeach

          </tbody>
      </table>
  
</div>

@endsection




    








