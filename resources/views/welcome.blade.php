<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssIndex.css') }}">
    <script type="text/javascript" src="http://www.prthuonghieu.com/js-noel/snow.mini.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src={{ asset("js/noel/haloLogin.js") }}></script>

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
    <form action="/login" method="post">
        @csrf
        <div class="login">
            <h3> Đăng Nhập Hệ Thống</h3> <br>
            <span class="use">Tên đăng nhập</span>  <br>
            <input type="text" name="username" autofocus><br>

            <span class="use">Mật khẩu</span> <br>
            <input type="password" name="password"><br>

            <input type="submit" value="Đăng Nhập">
            <a href="/">Quên mật khẩu</a>
        </div>
    </form>
    <b>THÔNG TIN ĐĂNG KÝ THI</b>
    <ul>
        <li>Trường Đại học Khoa học Tự nhiên -  từ 2019-12-09 19:00:00 đến 2019-12-22 23:59:00 </li>

        <li>Trường Đại học Khoa học Xã hội và Nhân văn -  từ 2019-12-21 20:00:00 đến 2019-12-23 08:00:00 </li>

        <li>Trường Đại học Giáo dục -  từ 2019-12-13 07:00:00 đến 2019-12-22 23:00:00 </li>

        <li>Khoa Quốc tế -  từ 2019-12-18 20:00:00 đến 2019-12-22 23:59:00 </li>

        <li>Khoa Luật -  từ 2019-12-21 09:00:00 đến 2019-12-31 09:00:00 </li>

    </ul>
</div>


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



<div class="footer" style="text-align: center">
    <hr style="margin-top: 250px">
    Công thông tin đào tạo ĐHQG Hà Nội - Phát triển bởi Trung tâm Ứng dụng CNTT @2011
    -
    2019
    <br>
    144 đường Xuân Thủy, Quận Cầu Giấy, Hà Nội, Việt Nam
    <br>
    Webmaster: support@vnu.edu.vn
    <br>
</div>
</body>
</html>
