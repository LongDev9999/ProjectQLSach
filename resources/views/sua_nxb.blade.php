@extends('link')
@section('menu2')active @endsection

@section('kethuagiua')
<br><br>
        <div class="form_sua">
            <form method="POST" action="admin/suanxb/{{$nhaxb->id_nxb}}">
                @csrf

                    <br>Mã NXB<br>
                    <input type="text" name="ma_nxb" value="{{$nhaxb->ma_nxb}}" class="form-control col-md-4">

                    <br>Tên NXB<br>
                    <input type="text" name="ten_nxb" value="{{$nhaxb->ten_nxb}}" class="form-control col-md-4">
    
                    <br><br>
                    <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
            @include('baoloi')
        </div>

@endsection


