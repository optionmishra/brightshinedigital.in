var base_url = $("base").attr('href');
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
$('.bs-component [data-toggle="popover"]').popover();
$('.bs-component [data-toggle="tooltip"]').tooltip();
// User Start
var userTable = $('.userTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/users',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
        {"data": "mobile"},
        {"data": "email"},
        {"data": "level"},
        {"data": "last_login"},
        {"data": "action"}
    ]
});

$("#addUser").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    console.log(data);
    if (data.type === 'success') {
        userTable.ajax.url(base_url + "admin_master/users").load();
        $(this).trigger('reset');
        $("#add-new-user").modal('hide');
    }
});

$("#update-user").on('aftersubmit', function (e, data) {
    toastr[data.type](data.message);
    if (data.type === 'success') {
        location.reload(true);
    }
});

$(".userTables").on('click', '.delete_user', function () {
    var id = $(this).attr('user_id');
    console.log(id);
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_user',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        userTable.ajax.url(base_url + "admin_master/users").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});

$(".home-side").on('click', '.new-search', function () {
    var id = $(this).attr('tab_id');
    $('#pleasewait').modal('show');
    $.ajax({
        url: base_url + 'admin_master/change_product',
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            
            if (data.type === 'success') {
                location.reload();
                $('#pleasewait').modal('hide');
            } else if (data.type === "error") {
                $('#pleasewait').modal('hide');
            }

        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#updateUserPro").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        location.reload(true);
    }
});

$("#updateUserProfile").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    if (data.type === 'success') {
        toastr[data.type](data.message)
        $.ajax({
            url: base_url + 'superadmin/logout'
        });
    }
});


$("#wupdateUserPro").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        location.reload(true);
    }
});

$("#wupdateUserProfile").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    if (data.type === 'success') {
        toastr[data.type](data.message)
        $.ajax({
            url: base_url + 'superadmin/logout'
        });
    }
});


$(document).ready(function () {
    $(document).on('change', '#logo_img_schooll', function () {
        var form_data = new FormData();
        form_data.append('logo_img', $('#logo_img_schooll').prop('files')[0]);
        $.ajax({
            url: base_url + 'admin_master/editSchoolLogo',
            type: 'post',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                toastr[data.type](data.message);
            },
            error: function (data) {
                console.log('unable to send request..');
            }
        });
    });
});

$(document).ready(function () {
    $(document).on('change', '#logo_profile', function () {
        var form_data = new FormData();
        form_data.append('logo_img', $('#logo_profile').prop('files')[0]);
        $.ajax({
            url: base_url + 'admin_master/editProfileLogo',
            type: 'post',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                toastr[data.type](data.message);
            },
            error: function (data) {
                console.log('unable to send request..');
            }
        });
    });
});
// User End

// Permission Start
var permissionTable = $('.permissionTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/permissions',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
        {"data": "action"}
    ]
});

$("#addPermission").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        permissionTable.ajax.url(base_url + "admin_master/permissions").load();
        $(this).trigger('reset');
        $("#add-new-permission").modal('hide');
    }
});

$(".permissionTables").on('click', '.edit-permission', function () {
    var id = $(this).attr('permission_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/permission/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var permission = data.data[0];
            $("#permission_id").val(permission.id);
            $("#getname").val(permission.name);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-permission").on('aftersubmit', function (e, data) {
    console.log(data)
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-permission").modal('hide');
        permissionTable.ajax.url(base_url + "admin_master/permissions").load();
    }
});

$(".permissionTables").on('click', '.delete_permission', function () {
    var id = $(this).attr('permission_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_permission',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        permissionTable.ajax.url(base_url + "admin_master/permissions").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Permission End
// Web User Start
var webuTable = $('.webuTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/webu',
	"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLink = aData['status'];
        if(imgLink == '1'){
        $('td:eq(7)', nRow).html('Active');
		}else{
			$('td:eq(7)', nRow).html('Block');
		}
        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "fullname"},
        {"data": "user_type"},
        {"data": "mobile"},
        {"data": "email"},
        {"data": "password"},
        {"data": "dated"},
		{"data": "status"},
        {"data": "action"}
    ]
});

$(".webuTables").on('click', '.edit-webu', function () {
    var id = $(this).attr('webu_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/web_user/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var webu = data.data[0];
            $("#webu_id").val(webu.id);
            $("#webu_name").val(webu.fullname);
            $("#webu_pin").val(webu.pin);
            $("#webu_mobile").val(webu.mobile);
            $("#webu_email").val(webu.email);
            $("#webu_address").val(webu.address);
            $("#webu_city").val(webu.city);
            $("#webu_subject").val(webu.subject);
            $("#webu_state").val(webu.state);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-webu").on('aftersubmit', function (e, data) {
    toastr[data.type](data.message);
    $('#pleasewait').modal('hide');
    if (data.type === 'success') {
        $("#edit-webu").modal('hide');
        webuTable.ajax.url(base_url + "admin_master/webu").load();
    }
});

$(".webuTables").on('click', '.delete_webu', function () {
    var id = $(this).attr('webu_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_webu',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        webuTable.ajax.url(base_url + "admin_master/webu").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Client End
// State Start
var stateTable = $('.stateTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/states',
    "columns": [
        {"data": "sr_no"},
        {"data": "StateName"},
        {"data": "zone"},
        {"data": "action"}
    ]
});

$("#addState").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        stateTable.ajax.url(base_url + "admin_master/states").load();
        $(this).trigger('reset');
        $("#add-new-state").modal('hide');
    }
});

$(".stateTables").on('click', '.edit-state', function () {
    var id = $(this).attr('state_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/state/StateID/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var permission = data.data[0];
            $("#state_id").val(permission.StateID);
            $("#gstate_name").val(permission.StateName);
            $("#gstate_zone").val(permission.zone);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-state").on('aftersubmit', function (e, data) {
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-state").modal('hide');
        stateTable.ajax.url(base_url + "admin_master/states").load();
    }
});

$(".stateTables").on('click', '.delete_state', function () {
    var id = $(this).attr('state_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_state',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        stateTable.ajax.url(base_url + "admin_master/states").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// State End
// Board Start
var boardTable = $('.boardTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/boards',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
        {"data": "action"}
    ]
});

$("#addBoard").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        boardTable.ajax.url(base_url + "admin_master/boards").load();
        $(this).trigger('reset');
        $("#add-new-board").modal('hide');
    }
});

$(".boardTables").on('click', '.edit-board', function () {
    var id = $(this).attr('board_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/board/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var board = data.data[0];
            $("#board_id").val(board.id);
            $("#getname").val(board.name);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-board").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-board").modal('hide');
        boardTable.ajax.url(base_url + "admin_master/boards").load();
    }
});

$(".boardTables").on('click', '.delete_board', function () {
    var id = $(this).attr('board_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_board',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        boardTable.ajax.url(base_url + "admin_master/boards").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Board End

// content Start
var contTable = $('.contTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/conts',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLink = aData['file_name']; // if your JSON is 3D
        // var imgLink = aData[4]; // where 4 is the zero-origin column for 2D

        var imgTag = '<img src="assets/img/' + imgLink + '"/>';
        $('td:eq(1)', nRow).html(imgTag); // where 4 is the zero-origin visible column in the HTML

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "file_name"},
        {"data": "name"},
        {"data": "value"},
        {"data": "action"}
    ]
});

$("#addContent").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        contTable.ajax.url(base_url + "admin_master/conts").load();
        $(this).trigger('reset');
        $("#add-new-cont").modal('hide');
    }
});

$(".contTables").on('click', '.edit-cont', function () {
    var id = $(this).attr('cont_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/web_content/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var board = data.data[0];
            $("#cont_id").val(board.id);
            $("#cont_name").val(board.name);
            $("#cont_value").val(board.value);
            if (!(board.file_name == null)) {
                $('#cont_image').attr('src', 'assets/img/' + board.file_name);
            }
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-cont").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-cont").modal('hide');
        contTable.ajax.url(base_url + "admin_master/conts").load();
    }
});

$(".contTables").on('click', '.delete_cont', function () {
    var id = $(this).attr('cont_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_cont',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        contTable.ajax.url(base_url + "admin_master/conts").load();

                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// cONTENT End


// Publication Start
var publicationTable = $('.publicationTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/publications',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
        {"data": "action"}
    ]
});

$("#addPublication").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        publicationTable.ajax.url(base_url + "admin_master/publications").load();
        $(this).trigger('reset');
        $("#add-new-publication").modal('hide');
    }
});

$(".publicationTables").on('click', '.edit-publication', function () {
    var id = $(this).attr('publication_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/publication/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var publication = data.data[0];
            $("#publication_id").val(publication.id);
            $("#getname").val(publication.name);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-publication").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-publication").modal('hide');
        publicationTable.ajax.url(base_url + "admin_master/publications").load();
    }
});

$(".publicationTables").on('click', '.delete_publication', function () {
    var id = $(this).attr('publication_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_publication',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        publicationTable.ajax.url(base_url + "admin_master/publications").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Publication End

// Category Start
var categoryTable = $('.categoryTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/categorys',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
		{"data": "orders"},
        {"data": "action"}
    ]    
});

$("#addCategory").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        categoryTable.ajax.url(base_url + "admin_master/categorys").load();
        $(this).trigger('reset');
        $("#add-new-category").modal('hide');
    }
});

$(".categoryTables").on('change', '.edit-categoryss', function () {
    var id = $(this).attr('category_id');
	var val = $(this).val();
    $.ajax({
        url: base_url + 'admin_master/chg',
        type: 'post',
        dataType: 'json',
        data: {
			id: id,
			val: val
		},
        success: function (data) {
			toastr[data.type](data.message);
            categoryTable.ajax.url(base_url + "admin_master/categorys").load();
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".categoryTables").on('click', '.edit-category', function () {
    var id = $(this).attr('category_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/category/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var category = data.data[0];
            $("#category_id").val(category.id);
            $("#getname").val(category.name);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-category").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-category").modal('hide');
        categoryTable.ajax.url(base_url + "admin_master/categorys").load();
    }
});

$(".categoryTables").on('click', '.delete_category', function () {
    var id = $(this).attr('category_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_category',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        categoryTable.ajax.url(base_url + "admin_master/categorys").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Category End
// Subject Start
var subjectTable = $('.subjectTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/subjects',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
        {"data": "action"}
    ]
});

$("#addSubject").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        subjectTable.ajax.url(base_url + "admin_master/subjects").load();
        $(this).trigger('reset');
        $("#add-new-subject").modal('hide');
    }
});

$(".subjectTables").on('click', '.edit-subject', function () {
    var id = $(this).attr('subject_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/subject/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var subject = data.data[0];
            $("#subject_id").val(subject.id);
            $("#getname").val(subject.name);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-subject").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-subject").modal('hide');
        subjectTable.ajax.url(base_url + "admin_master/subjects").load();
    }
});

$(".subjectTables").on('click', '.delete_subject', function () {
    var id = $(this).attr('subject_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_subject',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        subjectTable.ajax.url(base_url + "admin_master/subjects").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Subject End
// Classes Start
var classesTable = $('.classesTables').DataTable({
    serverSide: false,
    ajax: base_url + 'admin_master/classess',
    "columns": [
        {"data": "sr_no"},
        {"data": "name"},
        {"data": "action"}
    ]
});

$("#addClasses").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        classesTable.ajax.url(base_url + "admin_master/classess").load();
        $(this).trigger('reset');
        $("#add-new-classes").modal('hide');
    }
});

$(".classesTables").on('click', '.edit-classes', function () {
    var id = $(this).attr('classes_id');
    $.ajax({
        url: base_url + 'admin_master/retrieve/classes/id/' + id,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            var classes = data.data[0];
            $("#classes_id").val(classes.id);
            $("#getname").val(classes.name);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#update-classes").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#edit-classes").modal('hide');
        classesTable.ajax.url(base_url + "admin_master/classess").load();
    }
});

$(".classesTables").on('click', '.delete_classes', function () {
    var id = $(this).attr('classes_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_classes',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        classesTable.ajax.url(base_url + "admin_master/classess").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
// Classes End
// web support
$("#checkAll").click(function () {
    $('#addSupport input:checkbox').not(this).prop('checked', this.checked);
});
$("#checkAlln").click(function () {
    $('input.north:checkbox').not(this).prop('checked', this.checked);
});
$("#checkAlls").click(function () {
    $('input.south:checkbox').not(this).prop('checked', this.checked);
});
$("#checkAlle").click(function () {
    $('input.east:checkbox').not(this).prop('checked', this.checked);
});
$("#checkAllw").click(function () {
    $('input.west:checkbox').not(this).prop('checked', this.checked);
});
$("#checkAlll").click(function () {
    $('#update-support input:checkbox').not(this).prop('checked', this.checked);
});
$("#selAll").click(function () {
    $('.supportTables input:checkbox').not(this).prop('checked', this.checked);
});
var supportTable = $('.supportTables').DataTable({
    "serverSide": false,
    "ajax": {
        url: base_url + 'admin_master/support',
        type: 'post',
        data: {id: $("#supportt_type").val()}
    },
    "columns": [
        {"data": "check"},
        {"data": "sr_no"},
        {"data": "title"},
        {"data": "boardName"},
        {"data": "publicationName"},
        {"data": "className"},
        {"data": "subjectName"},
        {"data": "edition"},
        {"data": "year"},
        {"data": "date"},
        {"data": "action"}
    ]
});


$("#addSupport").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        $("#add-new-support").modal('hide');
                        $(this).trigger('reset');
                        supportTable.ajax.url(base_url + "admin_master/support").load();
    }
});

$(".supportTables").on('click', '.delete_support', function () {
    var id = $(this).attr('support_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_support',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        supportTable.ajax.url(base_url + "admin_master/support").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});

$(".spa").on('click', '#delete-support-all', function () {
    var id = [];
    $.each($("input[name='checkDelete']:checked"), function () {
        id.push($(this).val());
    });
    console.log(id);
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/delete_support_all',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        supportTable.ajax.url(base_url + "admin_master/support").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});


$("#update-support").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message);
    if (data.type === 'success') {
        history.go(-1);
    }
});

$("#Selform").on('aftersubmit', function (e, data) {
    $('#pleasewait').modal('hide');
    if (data.type === 'success') {
        location.reload();
    }
});
// end web support

// web js start

$(".reg_student").on('click', function () {
    var type = 'Student';
    $("#add-new-student").modal('show');
});

$(".reg_teacher").on('click', function () {
    var type = 'Teacher';
    $("#add-new-teacher").modal('show');
});

$("#add-new-student").on('input', '#student_email', function () {
    var id = $(this).val();
    $.ajax({
        url: base_url + 'admin_master/validate_email',
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            console.log(data.type);
            if (data.type === "success")
            {
                $("#getemail_desc").html(data.message);
                $("#getemail_desc").css('color', 'green');
            } else if (data.type === "error") {
                $("#getemail_desc").html(data.message);
                $("#getemail_desc").css('color', 'red');
            }
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#add-new-teacher").on('input', '#teacher_email', function () {
    var id = $(this).val();
    $.ajax({
        url: base_url + 'admin_master/validate_email',
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            console.log(data.type);
            if (data.type === "success")
            {
                $("#getemail_descc").html(data.message);
                $("#getemail_descc").css('color', 'green');
            } else if (data.type === "error") {
                $("#getemail_descc").html(data.message);
                $("#getemail_descc").css('color', 'red');
            }
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#addStudent").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        $(this).trigger('reset');
        $("#add-new-student").modal('hide');
        $(".register-message-box").removeClass('d-none');
        $(".register-message-box").html('You are Successfully registerd with us, Please Check your registerd email for your account credentials...');
    }
});

$("#addTeacher").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    toastr[data.type](data.message)
    if (data.type === 'success') {
        $(this).trigger('reset');
        $("#add-new-teacher").modal('hide');
        $(".register-message-box").removeClass('d-none');
        $(".register-message-box").html('You are Successfully registerd with us, Please Check your registerd email for your account credentials...');
    }
});
$("#teacher_class").click(function () {
    $('input:checkbox').not(this).prop("checked", this.checked);
});

$("#webLogin").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    $(this).trigger('reset');
    toastr[data.type](data.message);

    if (data.type === 'success') {
        window.location.href = base_url + 'dashboard';
    }
});

$(".webuTables").on('click', '.status_webu', function () {
    var id = $(this).attr('webu_id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Block User !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/reject_emp',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        webuTable.ajax.url(base_url + "admin_master/webu").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});
$(".webuTables").on('click', '.statuss_webu', function () {
    var id = $(this).attr('webu_id');
    swal({
        title: 'Are you sure?',
        text: "After thar please set further steps!",
        type: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Unblock User !'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'admin_master/select_emp',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    if (data.type === "success")
                    {
                        toastr[data.type](data.message);
                        webuTable.ajax.url(base_url + "admin_master/webu").load();
                    } else if (data.type === "error") {
                        toastr[data.type](data.message);
                    }

                },
                error: function (data) {
                    console.log('unable to send request..');
                }
            });
        }
    });
});

$('#select_board, #select_publication, #select_classes').change(function () {
    var board_id = $('#select_board').val();
    var pub_id = $('#select_publication').val();
    var class_id = $('#select_classes').val();
    $.ajax({
        url: base_url + 'admin_master/get_sub',
        method: 'post',
        data: {
            bid: board_id,
            pid: pub_id,
            cid: class_id
        },
        dataType: 'json',
        success: function (response) {
            $('#select_subject')
                .find('option')
                .remove()
                .end()
                .append('<option value="" disabled>Select Subject</option>')
                .val('')
            ;
            $('#select_subject').find('option').not(':first').remove();
            $.each(response, function (index, data) {
                $('#select_subject').append('<option value="' + data['subjectId'] + '">' + data['subjectName'] + '</option>');
            });
        }
    });
});


$(document).ready(function () {
    var board_id = $('#select_board').val();
    var pub_id = $('#select_publication').val();
    var class_id = $('#select_classes').val();
    var sub_d = $('#sub_d').val();
    $.ajax({
        url: base_url + 'admin_master/get_sub',
        method: 'post',
        data: {
            bid: board_id,
            pid: pub_id,
            cid: class_id
        },
        dataType: 'json',
        success: function (response) {
            $('#select_subject')
                .find('option')
                .remove()
                .end()
                .append('<option value="" disabled>Select Subject</option>')
                .val('')
            ;
            $('#select_subject').find('option').not(':first').remove();
            $.each(response, function (index, data) {
                $('#select_subject').append('<option value="' + data['subjectId'] + '">' + data['subjectName'] + '</option>');
            });
            $("#select_subject option").each(function(){
              if ($(this).val() == sub_d)
                $(this).attr("selected","selected");
            });
        }
    });
});

$('#student_class').change(function () {
    var id = $(this).val();
    $.ajax({
        url: base_url + 'admin_master/get_subs',
        method: 'post',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#student_subject')
                .find('option')
                .remove()
                .end()
                .append('<option value="" disabled>Select Subject</option>')
                .val('')
            ;
            $('#student_subject').find('option').not(':first').remove();
            $.each(response, function (index, data) {
                $('#student_subject').append('<option value="' + data['subjectId'] + '">' + data['subjectName'] + '</option>');
            });
        }
    });
});

$("#checkForgot").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    $(this).trigger('reset');
	 $("#forgot_passs").modal('show');
	  $(".swd").html(data.message);
	  if (data.type === 'success') {
        $("#forgot_pass").modal('hide');
    }

});

$(".forgt").on("click", function () {
     $("#forgot_pass").modal('show');
});

$(".sder").on('click', function () {
    var id = $(this).attr('sid');
    $.ajax({
        url: base_url + 'admin_master/ret_r',
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (response) {
            console.log(response);
            $("#add-new-cls").modal('show');
			$(".ser").empty();
			var j = 1;
			$.each(response, function (index, data) {
                $('.ser').append('<tr><td>' + j + '</td><td>'+ data['name'] + '</td><td>' + data['total'] + '</td></tr>');
				j++;
            });
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
        /* For each option in the original select element,
         create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /* When an item is clicked, update the original select box,
             and the selected item: */
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /* When the select box is clicked, close any other select boxes,
         and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
     except the current select box: */
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

/* If the user clicks anywhere outside the select box,
 then close all select boxes: */
document.addEventListener("click", closeAllSelect);


