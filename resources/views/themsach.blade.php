@extends('link')
@section('menu1') 
active

@endsection

@section('kethuagiua')
<br><br>
        <div class="form_them">
            @include('baoloi')
            <form method="post" action="{{ route('xulythem') }}" enctype="multipart/form-data">
                @csrf
                
                    <br> Mã Sách <br>
                    <input name="ma_sach" type="text"  class="form-control col-md-4">
                    
                    <br> Tên sách <br>
                    <input name="ten_sach" type="text"  class="form-control col-md-4">
        
                    <br> Năm XB <br>
                    <input name="namxb"  type="number" class="form-control col-md-4">
        
                    <br> Nhà XB <br>
                    <select name="ma_nxb" id="" class="form-control col-md-4">
                        
                        @foreach ($nhaxb as $nxb)
                            <option  value="{{ $nxb->ma_nxb  }}">{{ $nxb->ten_nxb }}</option>
                            {{-- <option value="giá trị là mã Nhà XB =>để thêm vào CSDL">hiển thị ra là tên Nhà xb</option> --}}
                        @endforeach
                     
                    </select>
        
                    <br>Tác giả<br>
                    <input name="tacgia" type="text"  class="form-control col-md-4">
                    
                    <br>
                    <button type="submit" class="btn btn-success" >THÊM</button>   
  
            </form>
            
        </div>

@endsection



    


  
