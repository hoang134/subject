@extends('admin.layout')
@section('title', 'Export')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/exportListExam.css') }}">
    <meta name="subjectName" content="<?= $exams->subject->name ?>">
    <body id="body">

    <div id=content>
        <div class="Header">
            <div class="text">
                <h2 id="word"> ĐĂNG KÝ THI KẾT THÚC HỌC PHẦN VNU</h2>
            </div>
        </div>
        <hr>
        <div>
            <a href="/admin/export"></a>
            <table>
                <tbody>
                <tr>
                    <th style="border:1px solid #000; text-align: center;">&nbsp;STT</th>
                    <th style="border:1px solid #000; text-align: center;">&nbsp;họ và tên</th>
                    <th style="border:1px solid #000; text-align: center;">&nbsp;ngày sinh</th>
                    <th style="border:1px solid #000; text-align: center;">&nbsp;giới tính</th>
                    <th style="border:1px solid #000; text-align: center;">&nbsp;lớp</th>
                </tr>
                <?php
                $i = 1;
                ?>
                @foreach($exams->users as $user)
                    <tr>
                        <td style="border:1px solid #000; text-align: center;">&nbsp;<?= $i++ ?></td>
                        <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->name }}</td>
                        <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->birthday }}</td>
                        <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->gender }}</td>
                        <td style="border:1px solid #000; text-align: center;">&nbsp;{{ $user->class }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <table class="a" style="width: 100%; border: none; border-collapse: collapse; margin-top: 30px;">
                <tbody>
                <tr>
                    <td style="width: 50%; float: right; vertical-align: top; ">
                        <p style="font-size: 12pt; margin:0; padding:0;">Hà Nội, ngày ..... tháng ..... năm 2019</p>
                        <p style="font-weight: bold; margin: 0; padding: 0; text-transform: uppercase; font-size: 12pt;">
                            XÁC NHẬN CỦA PHÒNG ĐÀO TẠO</p>
                        <p style="font-weight: bold; margin-top: 80px;">&nbsp;</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <button style="height: 30px;width: 100px; background-color: #00acec;" value="xuất file" onclick="Export2Doc()">xuất file
    </button>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/ExportListExam.js') }}"></script>
@endsection
