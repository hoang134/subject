<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $user->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>{{ $user->name }}</h1>
    <form>
        <div class="form-group">
            <label for="inputPassword">Mật khẩu</label>
            <input type="password" class="form-control" id="inputPassword">
{{--            <small id="passwordHelp" class="form-text text-muted">Sai mật khẩu</small>--}}
        </div>
        <div class="form-group">
            <label for="rePassword">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="rePassword">
        </div>
        <button type="submit" id="btnSubmit" class="btn btn-primary" value="{{ $user->id }}">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnSubmit').click(function (e) {
        e.preventDefault();
        var password = $('#inputPassword').val();
        var rePassword = $('#rePassword').val();
        var id = $(this).val();
        if (password == rePassword) {
            $.ajax({
                url: '/users/'+ id +'/edit',
                method: 'PUT',
                data: {
                    password: password,
                }
            }).done(function (res) {
                console.log(res);
                location.href = '/registration';
            }).fail(function (err) {
                console.log(err);
            })
        }
    });
</script>
</body>
</html>
