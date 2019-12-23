<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cssIndex.css') }}">

</head>

<body>
	<div class="heade">
		<div class="logo">
			<a href="">
				<img src="{{ asset('image/logo.png') }}">
			</a>
		</div>
		<div class="text">
			<h2>TRANG ĐĂNG KÝ THI KẾT THÚC HỌC PHẦN  VNU</h2>
		</div>
	</div>
	<hr>
	<div class="content">
		<div>THÔNG TIN KÝ THI</div>
			<form action="/login" method="post">
                @csrf
				<div class="login">
					<h3> Đăng Nhập Hệ Thống</h3> <br>
					<span class="use">Tên đăng nhập</span>  <br>
					<input type="" name="name"><br>
					 <span class="use">Mật khẩu</span> <br>
					<input type="password" name="password"><br>
                    <input type="submit" value="Đăng Nhập">
				</div>
			</form>

{{--        Báo Lỗi--}}
        <div class="validateLogin">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

	</div>

	<div class="footer">
		<hr style="margin-top: 350px">
	</div>
</body>
</html>
