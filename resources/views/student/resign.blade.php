<!DOCTYPE html>
<html>
<head>
    <title>Subject Register</title>
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/cssMain.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="http://www.prthuonghieu.com/js-noel/snow.mini.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src={{ secure_asset("js/noel/haloRegister.js") }}></script>
</head>
<body>
<div class="heade">
    <div class="logo">
        <a href="">
            <img src="{{ secure_asset('image/logo.png') }}">
        </a>
    </div>
    <div class="text">
        <h2>TRANG ĐĂNG KÝ THI KẾT THÚC HỌC PHẦN VNU</h2>
    </div>
</div>
<hr>

<div class="content">

    <div>
        <form action="/search" method="POST">
            @csrf
            <input type="text" name="searchExam">
            <input type="submit" value="Tìm Kiếm">
        </form>
        <a href="/logout"><button class="btn btn-danger" style="float: right; margin-bottom: 5px; "> Đăng xuất</button></a>
        <h6 style="float: right;margin-right: 50px "><a href="/profile"><?= \Illuminate\Support\Facades\Auth::user()->name ?></a></h6>


    </div>

    <div class="main" id="main">
        @if(!$subjects->isEmpty())
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Môn Học</th>
                    <th scope="col">Mã Môn Học</th>
                    <th scope="col">Thời Gian</th>
                    <th scope="col">Phòng Thi</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                ?>
                @foreach($subjects as $subject)
                    @foreach($subject->exams as $exam)
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td>{{ $subject->name}}</td>
                            <td>{{ $subject->code}}</td>
                            <td>{{ $exam->time }}</td>
                            <td>{{ $exam->room }}</td>
                            <td>{{ $exam->quantity }}</td>
                            <td>
                                <button class="btnSubject btn btn-success" value="{{ $exam->id }}">Thêm</button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        @else
            <h5 class="text-center">Không có dữ liệu hợp lệ</h5>
        @endif
    </div>

    <h5 class="text-center mt-3" style="color: #047f48">Môn bạn đã đăng ký</h5>
    <span id="error"  style="font-size: 20px;margin-left: 580px; "></span>
    <div class="main2" >

        <table id="main2" class="table table-striped">
            <thead>
            <tr >
                <th scope="col">STT</th>
                <th scope="col">Tên Môn Học</th>
                <th scope="col">Mã Môn Học</th>
                <th scope="col">Thời Gian</th>
                <th scope="col">Phòng Thi</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Thao Tác</th>
            </tr>
            </thead>
            <tbody id="subjectRegister">
            </tbody>
        </table>
        <a href="/export">
            <button type="button" class="btn btn-primary" style="float: right; margin-right: 90px" >Xác  Nhận </button></a>

    </div>
</div>
<div class="footer"  style="text-align: center">
    <hr style="margin-top: 3px">
    Công thông tin đào tạo ĐHQG Hà Nội - Phát triển bởi Trung tâm Ứng dụng CNTT @2011
    -
    2019
    <br>
    144 đường Xuân Thủy, Quận Cầu Giấy, Hà Nội, Việt Nam
    <br>
    Webmaster: support@vnu.edu.vn
    <br>
</div>
<script type="text/javascript" src="{{ secure_asset('js/mainJs.js') }}"></script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ secure_asset('js/register.js') }}"></script>
