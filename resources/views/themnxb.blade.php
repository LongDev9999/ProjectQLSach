@extends('link')
@section('menu2')active @endsection

@section('kethuagiua')

  <div class="form_them">
    <form method="post" action="{{ route('xuly_them_nhaxb') }}" enctype="multipart/form-data">
        @csrf
        
            <br> Mã Nhà Xuất Bản <br>
            <input name="ma_nxb" type="text"  class="form-control col-md-4">
            
            <br> Tên Nhà Xuất Bản <br>
            <input name="ten_nxb" type="text"  class="form-control col-md-4">

            <br>
            <button type="submit" class="btn btn-success" >THÊM</button>   

    </form>
    @include('baoloi')
  </div>

@endsection


