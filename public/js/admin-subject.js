$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add subject
    $('#btnAddSubject').click(function () {
        var data = {
            name: $('#inputName').val(),
            code: $('#inputCode').val()
        };

        $.ajax({
            url: '/subjects',
            method: 'POST',
            data: data
        }).done(function (res) {
            location.href = '/admin/subjects?message=Thêm môn học thành công!';
        }).fail(function (err) {
            console.log(err);
            toastr.error(err.responseJSON.message);
        })
    });

    // Edit subject modal
    $('.btnEdit').click(function () {
        var modal = $('#editSubjectModal');
        var id = $(this).attr('data-id');
        modal.find('#btnEditSubject').attr('data-id', id);

        toastr.warning('Loading data...');

        $.ajax({
            url: '/subjects/' + id,
            method: 'GET'
        }).done(function (res) {
            modal.find('.modal-title').text(res.name);
            modal.find('#inputEditName').val(res.name);
            modal.find('#inputEditCode').val(res.code);

            modal.modal('show');
            toastr.remove();
            toastr.success('Load data success! Start editing...', res.name);
        }).fail(function (err) {
            console.log(err);
            toastr.error(err.responseJSON.message);
        })
    });

    // Edit subject
    $('#btnEditSubject').click(function () {
        toastr.warning('Save change...');
        var id = $(this).attr('data-id');
        var data = {
            name: $('#inputEditName').val(),
            code: $('#inputEditCode').val(),
        };

        $.ajax({
            url: '/subjects/' + id + '/edit',
            method: 'PUT',
            data: data
        }).done(function (res) {
            location.href = '/admin/subjects?message=Saved change!';
        }).fail(function (err) {
            console.log(err);
            toastr.error(err.responseJSON.message);
        })
    });

    // Delete subject
    $('.btnDelete').click(function () {
        var c = confirm('Do you want to delete this subject?');
        if (c) {
            var id = $(this).attr('data-id');
            toastr.warning('Deleting this subject...');
            $.ajax({
                url: '/subjects/' + id,
                method: 'DELETE'
            }).done(function (res) {
                location.href = '/admin/subjects?message=Deleted subject!';
            }).fail(function (err) {
                console.log(err);
                toastr.error(err.responseJSON.message);
            })
        }
    });
})
