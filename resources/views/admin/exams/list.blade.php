@extends('admin.layout')
@section('title', 'List exam')

@section('content')
    <h2 class="text-center">List exam</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModal">+ Add exam</button>

    {{--    Add exam modal--}}
    <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <form class="row">
                            <div class="col-6">
                                <label for="inputSubjectId">Chọn môn học</label>
                                <select class="form-control" id="inputSubjectId">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 row">
                                <label for="inputTime">Thời gian</label>
                                <input type="text" class="form-control" id="inputTime" placeholder="Thời gian">
                            </div>

                            <div class="col-6">
                                <label for="inputRoom">Phòng thi</label>
                                <input type="text" class="form-control" id="inputRoom" placeholder="Nhập số phòng">
                            </div>

                            <div class="col-6">
                                <label for="inputQuantity">Số lượng</label>
                                <input type="number" class="form-control" id="inputQuantity" placeholder="Nhập số lượng">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnAddExam" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--    Edit exam modal--}}
    <div class="modal fade" id="editExamModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <form class="row">
                            <div class="col-6">
                                <label for="inputEditSubjectId">Chọn môn học</label>
                                <select class="form-control" id="inputEditSubjectId">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 row">
                                <label for="inputEditTime">Thời gian</label>
                                <input type="text" class="form-control" id="inputEditTime" placeholder="Thời gian">
                            </div>

                            <div class="col-6">
                                <label for="inputEditRoom">Phòng thi</label>
                                <input type="text" class="form-control" id="inputEditRoom" placeholder="Nhập số phòng">
                            </div>

                            <div class="col-6">
                                <label for="inputEditQuantity">Số lượng</label>
                                <input type="number" class="form-control" id="inputEditQuantity" placeholder="Nhập số lượng">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnEditExam" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Môn học</th>
                <th>Thời gian</th>
                <th>Phòng thi</th>
                <th>Số lượng</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($exams as $exam)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $exam->subject->name }}</td>
                    <td>{{ $exam->time }}</td>
                    <td>{{ $exam->room }}</td>
                    <td>{{ $exam->quantity }}</td>
                    <td>
                        <a class="btnEdit" href="javascript:void(0)" title="Edit" data-id="{{ $exam->id }}">
                            <span data-feather="edit"></span>
                        </a>
                        <a class="btnDelete" href="javascript:void(0)" title="Delete" data-id="{{ $exam->id }}">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $exams->links('admin.paginator') }}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/admin-exam.js') }}"></script>
@endsection
