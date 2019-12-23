$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // View
    $.ajax({
        url: '/schools/get-schools',
        type:'get',
    })
        .done(function(response) {
            console.log(response);

            $.each(response, function (key, value) {
                $('.tbody').append("<tr>" +
                    "<td>" + value.id + "</td>" +
                    "<td>" + value.name + "</td>" +
                    "<td>" + value.age + "</td>" +
                    "<td>" + value.weight + "</td>" +
                    "<td>" + value.height + "</td>" +
                    "<td>" +
                    "<button type='button' class='edit-click btn btn-primary mr-2' data-toggle='modal' data-target='#editModal' value='" + value.id + "'>Edit</button>" +
                    "<button type='button' class='delete-click btn btn-danger' value='" + value.id + "'>Delete</button>" +
                    "</td>" +
                    "</tr>")
            })
        })
        .fail(function (response) {
            console.log("Error!");
        });

    // Toast
    var toastCounter=0;
    function CreateToast(massage) { // Toast notification
        var toastDiv = document.createElement("div");

        // Give it a unique id
        toastDiv.id = "toast_" + toastCounter;

        // Make it hidden (necessary to slideDown)
        toastDiv.style.display = "none";

        var toastMessage = massage;
        var foreColor = 'text-success';
        var backgroundColor = 'bg-warning';
        var borderColor = '';

        toastDiv.innerHTML = toastMessage;
        toastDiv.setAttribute("class", foreColor);
        document.body.appendChild(toastDiv);

        // Increment toastCounter
        toastCounter++;
    }
    // End Toast

    // Massage
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    var massage = getUrlParameter('massage');
    if (typeof massage !== 'undefined') {
        CreateToast(massage);
        var thisToast = toastCounter-1;

        // Make it slide down
        $(document).find("#toast_"+thisToast).slideDown(600);

        setTimeout(function(){
            $(document).find("#toast_"+thisToast).slideUp(600,function(){
                $(this).remove();
            });
        },3000);
    }

    // Create
    $('#createClick').click(function (event) {
        var data = {
            name: $('#inputName').val(),
            age: $('#inputAge').val(),
            weight: $('#inputWeight').val(),
            height: $('#inputHeight').val()
        };

        $.ajax({
            url: '/schools/create',
            type:'post',
            dataType: 'json',
            data: data
        })
            .done(function(response) {
                window.location = '/schools?massage=' + response.massage;
            })
            .fail(function (response) {
                console.log(response);
            });
    });

    // Edit click
    $(document).on('click', '.edit-click', function () {
        var id = $(this).attr('value');
        $('#saveChanges').val(id);
        $.ajax({
            url: '/schools/get-school/' + id,
            type:'get',
        })
            .done(function(response) {
                console.log(response);
                $('#inputEditName').val(response.name);
                $('#inputEditAge').val(response.age);
                $('#inputEditWeight').val(response.weight);
                $('#inputEditHeight').val(response.height);
            })
            .fail(function (response) {
                console.log("Error!");
            });
    });

    // Save Changes
    $('#saveChanges').click(function () {
        var id = $(this).attr('value');
        var data = {
            name: $('#inputEditName').val(),
            age: $('#inputEditAge').val(),
            weight: $('#inputEditWeight').val(),
            height: $('#inputEditHeight').val()
        };

        $.ajax({
            url: '/schools/edit/' + id,
            type:'put',
            dataType: 'json',
            data: data
        })
            .done(function(response) {
                window.location = '/schools?massage=' + response.massage;
            })
            .fail(function (response) {
                alert(response.massage);
            });
    });

    // Delete
    $(document).on('click', '.delete-click', function (event) {
        var id = $(this).attr('value');
        $.ajax({
            url: '/schools/delete/' + id,
            type:'delete',
        })
            .done(function(response) {
                window.location = '/schools?massage=' + response.massage;
            })
            .fail(function (response) {
                alert("Error!");
            });
    })

});
