<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/examRegisterCss.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body id="body">
<div id =content>
    <div class="heade">
        <div class="text">
            <h2 id="word"> ĐĂNG KÝ THI KẾT THÚC HỌC PHẦN  VNU</h2>
        </div>
    </div>
    <hr>
    <h3> PHIẾU BÁO DỰ THI</h3>
    <p style="font-size: 25px; margin-left: 20px;"> các môn đã đăng ký</p>
    <div style="margin-left: 20px;">
        <table >

            <tbody>
            <tr>
                <th style="border:1px solid #000; text-align: center;">&nbsp;STT</th>
                <th style="border:1px solid #000; text-align: center;">&nbsp;Mã môn học</th>
                <th style="border:1px solid #000; text-align: center;">&nbsp;Môn học</th>
                <th style="border:1px solid #000; text-align: center;">&nbsp;Thời gian</th>
                <th style="border:1px solid #000; text-align: center;">&nbsp;Giảng đường</th>
            </tr>
            <?php
            $i = 1;
            ?>
            @foreach($users as $user)
            <tr>
                <td style="border:1px solid #000; text-align: center;"><?= $i++ ?></td>
                <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->code }}</td>
                <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->name }}</td>
                <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->time }}</td>
                <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->room }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div >
        <table style="width: 100%; border: none; border-collapse: collapse; margin-top: 30px;">
            <tbody>
            <tr>
                <td style="width: 50%; vertical-align: top; text-align: center;">
                    <p style="font-weight: bold; margin: 0; padding: 0; font-size: 12pt; text-transform:uppercase;">SINH VIÊN</p>

                    <p style="margin-top:30px;"><b>Nguyễn Việt Hoàng</b></p>
                </td>
                <td style="width: 50%; text-align: center; vertical-align: top; ">
                    <p style="font-size: 12pt; margin:0; padding:0;">Hà Nội, ngày ..... tháng ..... năm 2019</p>
                    <p style="font-weight: bold; margin: 0; padding: 0; text-transform: uppercase; font-size: 12pt;">XÁC NHẬN CỦA PHÒNG ĐÀO TẠO</p>
                    <p style="font-weight: bold; margin-top: 80px;">&nbsp;</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/examRegisterJs.js') }}"></script>
<button type="button" class="btn btn-primary" style="margin-left: 920px" onclick="Export2Doc()">XUẤT PHIẾU BÁO DỰ THI  </button>

</body>
</html>
