@extends('layout')

@section('title', 'Môn học')
@section('main')

    <body>
    <div>
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
            @foreach($subjects as $subject)
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td>{{ $subject->name}}</td>
                    <td>{{ $subject->code}}</td>
                    <td>{{ $subject->time}}</td>
                    <td>{{ $subject->room}}</td>
                    <td>{{ $subject->quantity}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btnEdit" value="{{ $subject->id }}" data-toggle="modal" data-target="#updateSubjectModal">
                            Sửa
                        </button>

                        <button type="button" class="btn btn-danger btnDetele" value="{{ $subject->id }}">
                            Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

{{--Tạo môn học--}}
    <div class="modal fade" id="create-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Ca Thi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Môn Học</label>
                            <input type="text" class="form-control" id="newName" placeholder="Nhập Tên">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Môn Học</label>
                            <input type="text" class="form-control" id="newCode" placeholder="Nhập mã môn học">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời Gian</label>
                            <input type="text" class="form-control" id="newTime" placeholder="Nhập thời gian">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phòng Thi</label>
                            <input type="text" class="form-control" id="newRoom" placeholder="Nhập Phòng Thi">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng</label>
                            <input type="number" class="form-control" id="newQuantity" placeholder="Nhập Số Lượng">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="createSubject">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>

{{--    Sửa môn học--}}

    <div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa Ca Thi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Môn Học</label>
                            <input type="text" class="form-control" id="updateName" placeholder="Nhập Tên">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Môn Học</label>
                            <input type="text" class="form-control" id="updateCode" placeholder="Nhập mã môn học">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời Gian</label>
                            <input type="text" class="form-control" id="updateTime" placeholder="Nhập thời gian">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phòng Thi</label>
                            <input type="text" class="form-control" id="updateRoom" placeholder="Nhập Phòng Thi">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng</label>
                            <input type="number" class="form-control" id="updateQuantity" placeholder="Nhập Số Lượng">
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="update-submit-form">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="updateSubject">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Thêm môn học
        $('#createSubject').click(function (e) {
            e.preventDefault();
            var name = $('#newName').val();
            var code = $('#newCode').val();
            var time = $('#newTime').val();
            var room = $('#newRoom').val();
            var quantity = $('#newQuantity').val();
            $.ajax({
                url: '/subjects',
                type: 'POST',
                data: {
                    name: name,
                    code: code,
                    time: time,
                    room: room,
                    quantity: quantity
                }
            }).done(function (res) {
                console.log(res);
                location.reload();
            }).fail(function (error) {
                console.log(error);
            })
        });
// sửa môn học
        $('.btnEdit').click(function () {
           var id = $(this).val();
           $('#updateSubject').val(id);
            $.ajax({
                url: '/subjects/' + id,
                type:'get',
            }).done(function (res) {
                console.log(res);
                $('#updateName').val(res.name);
                $('#updateCode').val(res.code);
                $('#updateTime').val(res.time);
                $('#updateRoom').val(res.room);
                $('#updateQuantity').val(res.quantity);
            }).fail(function (error) {
                console.log(error);
            })
        });

        $('#updateSubject').click(function (e) {
            e.preventDefault();
            var name = $('#updateName').val();
            var code = $('#updateCode').val();
            var time = $('#updateTime').val();
            var room = $('#updateRoom').val();
            var quantity = $('#updateQuantity').val();
            var id = $(this).val();
            $.ajax({
                url: '/subjects/' + id,
                type:'PUT',
                data: {
                    name: name,
                    code: code,
                    time: time,
                    room: room,
                    quantity: quantity,
                }
            }).done(function (res) {
                console.log(res);
                location.reload();
            }).fail(function (error) {
                console.log(error);
            })
        });

        // Xóa Môn Học
        $('.btnDetele').click(function () {
            var id = $(this).val();
            $.ajax({
                url: '/subjects/' + id,
                type:'DELETE',
            }).done(function (res) {
                console.log(res);
                location.reload();
            }).fail(function (error) {
                console.log(error);
            })
        })

    </script>
@endsection
