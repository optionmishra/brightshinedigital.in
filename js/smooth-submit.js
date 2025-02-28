$(document).on('submit', 'form.smooth-submit', get_response).on('click', 'a.smooth-submit', get_response);
function get_response() {
    var confirm_txt = $(this).attr('data-confirm') || '';
    element = this;
    if (confirm_txt.length > 0) {
        bootbox.confirm(confirm_txt, function (result) {
            if (result == true) {
                send(element);
            }
        });
    } else {
        send(this);
    }
    return false;
}

function send(element) {

    var data = new FormData(element) || {};
    var dataType = $(element).attr('data-type') || 'json';
    var url = $(element).attr('action') || $(element).attr('href');
    var type = $(element).attr('method') || 'get';
    $.ajax({
        url: url,
        type: type,
        dataType: dataType,
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        statusCode: {
            404: function () {
                toastr['error']("404 page not found");
//                $('#pleasewait').modal('hide');
            },
            500: function (response) {
                toastr['error'](response.statusText);
//                $('#pleasewait').modal('hide');
            },
        },
        beforeSend: function () {
            $('#pleasewait').modal('show');
        },
        success: function (data) {
            $(element).trigger('aftersubmit', [data]);
            $('#pleasewait').modal('hide');
        },
        error: function (error) {
            console.log(error);
        }
    });
}