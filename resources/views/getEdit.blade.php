@extends('link')
@section('menu1') 
active

@endsection

@section('kethuagiua')
<br><br>
        <div class="form_sua">
            @include('baoloi')
            <form method="post" action="admin/sua/{{$sach->id}}">
                @csrf

                    <br>Mã sách<br>
                    <input type="text" name="ma_sach" value="{{$sach->ma_sach}}" class="form-control col-md-4">

                    <br>Tên sách<br>
                    <input type="text" name="ten_sach" value="{{$sach->ten_sach}}" class="form-control col-md-4">
    
                    <br>NĂM XUẤT BẢN<br>
                    <input type="number" name="namxb" value="{{$sach->namxb}}" class="form-control col-md-4">

                    <br>Nhà XB<br>
                    <select name="ma_nxb" id="" class="form-control col-md-4">
                        
                        @foreach ($nhaxb as $nxb)
                            <option <?php if($nxb->ma_nxb==$sach->ma_nxb) echo "selected" ?>  value="{{ $nxb->ma_nxb  }}">{{ $nxb->ten_nxb }}</option>
                            {{-- <option value="giá trị là mã Nhà XB =>để thêm vào CSDL">hiển thị ra là tên Nhà xb</option> --}}
                        @endforeach
                     
                    </select>
        
                    <br>Tác giả <br>
                    <input type="text" name="tacgia" value="{{$sach->tacgia}}" class="form-control col-md-4">

                    <br><br>
                    <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>

@endsection


