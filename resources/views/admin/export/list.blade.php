@extends('admin.layout')
@section('title', 'Export')

@section('content')
    <table class="table table-striped">
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
        @foreach($exams as $exam)
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td>{{ $exam->subject->name }}</td>
            <td>{{ $exam->subject->code }}</td>
            <td>{{ $exam->time }}</td>
            <td>{{ $exam->room }}</td>
            <td>{{ $exam->quantity }}</td>
            <td><a href="/admin/{{$exam->id}}/export">
                    Xuất File
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
