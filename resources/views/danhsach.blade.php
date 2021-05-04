@extends('link')
@section('menu1') 
active

@endsection

@section('kethuagiua')

<div class="tong">

  <a href="admin/them"   class="btn btn-success" >Thêm Sách</a>
    
      <table class="table-responsive-sm table table-bordered" id="editable-usage">
          <thead>
              <tr>
             
                  <th>TÊN SÁCH</th>
                  <th>NĂM XB</th>
                  <th>NHÀ XB</th>
                  <th>TÁC GIẢ</th>
              
                  <th colspan="2">Options</th>
              </tr>
          </thead>
          <tbody>
              <?php if(isset($all_data)){ ?>
              @foreach($all_data as $row)
              <tr>
                  
                 
                  <td>{{$row->ten_sach}}</td>
                  <td>{{$row->namxb}}</td>
                  <td>{{$row->ten_nxb}}</td>
                  <td>{{$row->tacgia}}</td>

               
                  <td>
                      <a href="admin/sua/{{$row->id}}" class="btn btn-primary btn-sm ">Sửa</a> 
                      <a href="admin/xoa/{{$row->id}}" class="btn btn-danger btn-sm" >Xóa</a>
                  </td>
              

              </tr>
              @endforeach
          <?php } ?>

          </tbody>
      </table>
  
</div>

@endsection




    








