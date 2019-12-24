$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Thêm ca thi
$('.btnSubject').click(function (e) {
    var check = document.getElementById('error').innerHTML;
    if(check == "đăng ký thành công") {
        var id = $(this).val();
        var quantity = $(this).parent().parent().children()[5].innerText;

        $.ajax({
            url: '/check-quantity/' + id,
            method: 'GET'
        }).done(function (res) {
            console.log("số người đã đăng ký  "+res);
            if (res < quantity) {
                $.ajax({
                    url: '/registration',
                    method: 'POST',
                    data: {
                        examId: id
                    }
                }).done(function (res) {
                    //load lại dữ liệu
                    loadSubjectRegister();
                }).fail(function (err) {
                    console.log(err);
                });
            } else {
                document.getElementById('error').style.color = "#ff0000";
                document.getElementById('error').innerHTML = "Phòng thi đã đầy";
            }
        }).fail(function (err) {
            console.log(err);
        });

    }
});

// Xóa ca thi
$(document).on('click','.btnDelete', function () {
    var id = $(this).val();
    $.ajax({
        url: '/registration',
        method:'DELETE',
        data: {
            examId: id,
        }
    }).done(function (res) {
        loadSubjectRegister();
        console.log(res);
    }).fail(function (err) {
        console.log(err);
    })
});

$(document).ready(function () {
    loadSubjectRegister();
});

function loadSubjectRegister() {
    $.ajax({
        url: '/subject-register',
        method: 'GET',
    }).done(function (res) {
        console.log(res);
        $('#subjectRegister').empty();
        $.each(res, function( index, value ) {
            $('#subjectRegister').append('<tr>\n' +
                '                    <th scope="row">' + (index + 1) + '</th>\n' +
                '                    <td>' + value.subject.name + '</td>\n' +
                '                    <td class="subjectCode">' + value.subject.code + '</td>\n' +
                '                    <td  class="subjectTimes">' + value.time + '</td>\n' +
                '                    <td>' + value.room + '</td>\n' +
                '                    <td>' + value.quantity + '</td>\n' +
                '                    <td>\n' +
                '                        <button class="btnDelete btn btn-danger" value="' + value.id + '">Xóa</button>\n' +
                '                    </td>\n' +
                '                </tr>')
        });

    }).fail(function (err) {
        console.log(err);
    });
}
