@extends('admin.layout')
@section('title', 'List subject')

@section('content')
    <h2 class="text-center">List subject</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubjectModal">+ Add subject</button>

    {{--    Add subject modal--}}
    <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="inputName">Tên môn học</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Nhập tên môn học">
                        <label for="inputCode">Mã môn học</label>
                        <input type="text" class="form-control" id="inputCode" placeholder="Nhập mã môn học">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnAddSubject" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--    Edit subject modal--}}
    <div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="inputEditName">Tên môn học</label>
                        <input type="text" class="form-control" id="inputEditName" placeholder="Nhập tên môn học">

                        <label for="inputEditCode">Mã môn học</label>
                        <input type="text" class="form-control" id="inputEditCode" placeholder="Nhập mã môn học">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnEditSubject" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Tên môn học</th>
                <th>Mã môn học</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>
                        <a class="btnEdit" href="javascript:void(0)" title="Edit" data-id="{{ $subject->id }}">
                            <span data-feather="edit"></span>
                        </a>
                        <a class="btnDelete" href="javascript:void(0)" title="Delete" data-id="{{ $subject->id }}">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $subjects->links('admin.paginator') }}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/admin-subject.js') }}"></script>
@endsection
