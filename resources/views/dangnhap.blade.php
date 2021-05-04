@include('thuvienbootstrap')
<title>Trang Login</title>
{{--  neu ton lai loi nhập sai TK hoặc MK -->in ra loi ,Neu khong ton tai loi-->khong lam gi ca --}}
@if (isset($loi))
<p class="alert alert-danger" style="  text-align: center;">{{$loi}}</p>
 {{--  In Ra LỖI  --}}

@else
@endif



<body>
    <div class="container">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5 border border-primary">
            <div class="card-body">
              <h5 class="card-title text-center">ĐĂNG NHẬP</h5>

              <form action="{{route('xulydangnhap')}}" method="POST">
                @csrf
                <input name="txtusername" type="text" class="form-control" value="admin_qls" placeholder="Nhập tài khoản..." required autofocus><br>

                <input name="txtpassword" type="password" id="inputPassword" value="123" class="form-control" placeholder="Mật Khẩu......" required><br>
                
                <button type="submit" class="btn btn-warning btn-block text-uppercase ">ĐĂNG NHẬP</button><br>
                
                {{-- <a href="dangky" class="btn btn-primary btn-block text-uppercase">ĐĂNG KÝ</a> --}}


                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>

    </div>

</body>
