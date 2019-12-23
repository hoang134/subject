$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add exam
    $('#btnAddExam').click(function () {
        var data = {
            subjectId: $('#inputSubjectId').val(),
            time: $('#inputTime').val(),
            room: $('#inputRoom').val(),
            quantity: $('#inputQuantity').val(),
        };

        $.ajax({
            url: '/exams',
            method: 'POST',
            data: data
        }).done(function (res) {
            location.href = '/admin/exams?message=Thêm ca thi thành công!';
        }).fail(function (err) {
            console.log(err);
            toastr.error(err.responseJSON.message);
        })
    });

    // Edit exam modal
    $('.btnEdit').click(function () {
        var modal = $('#editExamModal');
        var id = $(this).attr('data-id');
        modal.find('#btnEditExam').attr('data-id', id);

        toastr.warning('Loading data...');

        $.ajax({
            url: '/exams/' + id,
            method: 'GET'
        }).done(function (res) {
            $("#inputEditSubjectId option").each(function(){
                $(this).removeAttr('selected');
                if ($(this).val() == res.subject_id)
                    $(this).attr("selected","selected");
            });

            // var times = res.time.match(/(\d+)/g);

            modal.find('#inputEditTime').val(res.time);
            modal.find('#inputEditRoom').val(res.room);
            modal.find('#inputEditQuantity').val(res.quantity);

            modal.modal('show');
            toastr.remove();
            toastr.success('Load data success! Start editing...', res.name);
        }).fail(function (err) {
            console.log(err);
            toastr.error(err.responseJSON.message);
        })
    });

    // Edit exam
    $('#btnEditExam').click(function () {
        toastr.warning('Save change...');
        var id = $(this).attr('data-id');
        var data = {
            subjectId: $('#inputEditSubjectId').val(),
            time: $('#inputEditTime').val(),
            room: $('#inputEditRoom').val(),
            quantity: $('#inputEditQuantity').val(),
        };

        $.ajax({
            url: '/exams/' + id + '/edit',
            method: 'PUT',
            data: data
        }).done(function (res) {
            location.href = '/admin/exams?message=Saved change!';
        }).fail(function (err) {
            console.log(err);
            toastr.error(err.responseJSON.message);
        })
    });

    // Delete exam
    $('.btnDelete').click(function () {
        var c = confirm('Do you want to delete this exam?');
        if (c) {
            var id = $(this).attr('data-id');
            toastr.warning('Deleting this exam...');
            $.ajax({
                url: '/exams/' + id,
                method: 'DELETE'
            }).done(function (res) {
                location.href = '/admin/exams?message=Deleted exam!';
            }).fail(function (err) {
                console.log(err);
                toastr.error(err.responseJSON.message);
            })
        }
    });
})
