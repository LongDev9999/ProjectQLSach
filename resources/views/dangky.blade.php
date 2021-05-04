@include('thuvienbootstrap')
@include('baoloi')
{{-- Báo lỗi tại đây --}}
<title>Trang Đăng Ký</title> 


<div align="center" class="tong">
	<h3 class="text-center">ĐĂNG KÝ</h3>

	<form action="{{route('taoadmin')}}" method="post">
		@csrf

	<input type="text" name="txttaikhoan" placeholder="Nhập tài khoản..." class="form-control col-md-4"><br><br>
	<input type="Password" name="txtmatkhau" placeholder="Nhập mật khẩu...." class="form-control col-md-4"><br>
	<input type="Password" placeholder="Nhập lại mật khẩu...." class="form-control col-md-4"><br>
		
		<button type="submit" class="btn btn-primary">ĐĂNG KÝ</button>
	</form>
</div>



