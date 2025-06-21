var base_url = $("base").attr("href");
toastr.options = {
  closeButton: false,
  debug: false,
  newestOnTop: false,
  progressBar: true,
  positionClass: "toast-top-right",
  preventDuplicates: false,
  onclick: null,
  showDuration: "300",
  hideDuration: "1000",
  timeOut: "5000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};
$('.bs-component [data-toggle="popover"]').popover();
$('.bs-component [data-toggle="tooltip"]').tooltip();
// User Start
var userTable = $(".userTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/users",
  columns: [
    { data: "sr_no" },
    { data: "name" },
    { data: "mobile" },
    { data: "email" },
    { data: "level" },
    { data: "last_login" },
    { data: "action" },
  ],
});

$("#addUser").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  console.log(data);
  if (data.type === "success") {
    userTable.ajax.url(base_url + "admin_master/users").load();
    //userTable.ajax.url(base_url + "admin_master/users").load();
    $(this).trigger("reset");
    $("#add-new-user").modal("hide");
  }
});

$("#update-user").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  if (data.type === "success") {
    location.reload(true);
  }
});

$("#update-teacher").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  if (data.type === "success") {
    window.location.href = base_url + "superadmin/web_user_teacher";
  }
});

$(".userTables").on("click", ".delete_user", function () {
  var id = $(this).attr("user_id");
  console.log(id);
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_user",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            userTable.ajax.url(base_url + "admin_master/users").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
//End User

// Salesman Start
var salesTable = $(".salesmanTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/salesman",
  columns: [
    { data: "sr_no" },
    { data: "name" },
    { data: "contact" },
    { data: "email" },
    { data: "action" },
  ],
});

$("#addSalesman").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  console.log(data);
  if (data.type === "success") {
    salesTable.ajax.url(base_url + "admin_master/salesman").load();
    $(this).trigger("reset");
    $("#add-new-salesman").modal("hide");
  }
});

$("#update-salesman").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  if (data.type === "success") {
    location.reload(true);
  }
});

$(".salesmanTables").on("click", ".delete_salesman", function () {
  var id = $(this).attr("salesman_id");
  console.log(id);
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_salesman",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            salesTable.ajax.url(base_url + "admin_master/salesman").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// End Sales

$(".home-side").on("click", ".new-search", function () {
  var id = $(this).attr("tab_id");
  $("#pleasewait").modal("show");
  $.ajax({
    url: base_url + "admin_master/change_product",
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      if (data.type === "success") {
        location.reload(); // #StopReload
        $("#pleasewait").modal("hide");
      } else if (data.type === "error") {
        $("#pleasewait").modal("hide");
      }
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
  // let board = $("#select_board").find(":selected").val();
  // board = board = "CBSE" ? "1" : "6";
  // const publication = $("#select_publication").find(":selected").val();
  // const classes = $("#select_classes").find(":selected").val();
  // const subject = $("#select_msubject").find(":selected").val();
  // const type = id;
  // $.ajax({
  //   url: base_url + "admin_master/change_product2",
  //   type: "post",
  //   dataType: "json",
  //   data: {
  //     board: board,
  //     publication: publication,
  //     classes: classes,
  //     subject: subject,
  //     type: type,
  //   },
  //   success: function (data) {
  //     if (data.type === "success") {
  //       // location.reload();
  //       $("#pleasewait").modal("hide");
  //       // console.log(data);
  //       $("#webSupportsTable").html(data);
  //     } else if (data.type === "error") {
  //       $("#pleasewait").modal("hide");
  //     }
  //   },
  //   error: function (data) {
  //     console.log("unable to send request..");
  //   },
  // });
});

$("#updateUserPro").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    location.reload(true);
  }
});

$("#updateUserProfile").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  if (data.type === "success") {
    toastr[data.type](data.message);
    $.ajax({
      url: base_url + "superadmin/logout",
    });
  }
});

$("#wupdateUserPro").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    location.reload(true);
  }
});

$("#wupdateUserProfile").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  if (data.type === "success") {
    toastr[data.type](data.message);
    $.ajax({
      url: base_url + "superadmin/logout",
    });
  }
});

$("#addContact").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $(this).trigger("reset");
    $("#add-new-contact").modal("hide");
  }
});

$(document).ready(function () {
  $(document).on("change", "#logo_img_schooll", function () {
    var form_data = new FormData();
    form_data.append("logo_img", $("#logo_img_schooll").prop("files")[0]);
    $.ajax({
      url: base_url + "admin_master/editSchoolLogo",
      type: "post",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        toastr[data.type](data.message);
      },
      error: function (data) {
        console.log("unable to send request..");
      },
    });
  });
});

$(document).ready(function () {
  $(document).on("change", "#logo_profile", function () {
    var form_data = new FormData();
    form_data.append("logo_img", $("#logo_profile").prop("files")[0]);
    $.ajax({
      url: base_url + "admin_master/editProfileLogo",
      type: "post",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        toastr[data.type](data.message);
      },
      error: function (data) {
        console.log("unable to send request..");
      },
    });
  });
});
// User End

// Permission Start
var permissionTable = $(".permissionTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/permissions",
  columns: [{ data: "sr_no" }, { data: "name" }, { data: "action" }],
});

$("#addPermission").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    permissionTable.ajax.url(base_url + "admin_master/permissions").load();
    $(this).trigger("reset");
    $("#add-new-permission").modal("hide");
  }
});

$(".permissionTables").on("click", ".edit-permission", function () {
  var id = $(this).attr("permission_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/permission/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var permission = data.data[0];
      $("#permission_id").val(permission.id);
      $("#getname").val(permission.name);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$(document).ready(function () {
  var id = $("#active").val();
  $("#active" + id).addClass("active");
});

$("#update-permission").on("aftersubmit", function (e, data) {
  console.log(data);
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-permission").modal("hide");
    permissionTable.ajax.url(base_url + "admin_master/permissions").load();
  }
});

$(".permissionTables").on("click", ".delete_permission", function () {
  var id = $(this).attr("permission_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_permission",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            permissionTable.ajax
              .url(base_url + "admin_master/permissions")
              .load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// Permission End
// Web User Start
var webuTable = $(".webuTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/webu",
  fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
    var countrych = aData["country_type"];
    if (countrych == "Others") {
      $("td:eq(7)", nRow).html(aData["oth_state"]);
      $("td:eq(8)", nRow).html(aData["oth_city"]);
    } else {
      $("td:eq(7)", nRow).html(aData["statename"]);
      $("td:eq(8)", nRow).html(aData["city"]);
    }

    return nRow;
  },
  columns: [
    { data: "sr_no" },
    { data: "status" },
    { data: "action" },
    { data: "fullname" },
    { data: "mobile" },
    { data: "classes" },
    { data: "email" },
    { data: "password" },
    { data: "address" },
    { data: "pin" },
    { data: "state" },
    { data: "city" },
    { data: "stu_teacher_id" },
  ],
  dom: "Bfrtip",
  buttons: [
    "excelHtml5",
    {
      extend: "pdfHtml5",
      orientation: "landscape",
      pageSize: "LEGAL",
    },
  ],
});

var twebuTable = $(".twebuTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/webu_teacher",
  fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
    var countrych = aData["country_type"];
    if (countrych == "Others") {
      $("td:eq(7)", nRow).html(aData["oth_state"]);
      $("td:eq(8)", nRow).html(aData["oth_city"]);
    } else {
      $("td:eq(7)", nRow).html(aData["statename"]);
      $("td:eq(8)", nRow).html(aData["city"]);
    }

    return nRow;
  },
  columns: [
    { data: "sr_no" },
    { data: "status" },
    { data: "action" },
    { data: "fullname" },
    { data: "mobile" },
    { data: "school_name" },
    { data: "subject" },
    { data: "classes" },
    { data: "email" },
    { data: "password" },
    { data: "address" },
    { data: "addresss" },
    { data: "pin" },
    { data: "principal_name" },
    { data: "country" },
    { data: "session_start" },
    { data: "referrel_name" },
    { data: "referrel_mobile" },
    { data: "dob" },
    { data: "stu_limit" },
  ],
  dom: "Bfrtip",
  buttons: [
    "excelHtml5",
    {
      extend: "pdfHtml5",
      orientation: "landscape",
      pageSize: "LEGAL",
    },
  ],
});

$(".webuTables").on("click", ".edit-webu", function () {
  var id = $(this).attr("webu_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/web_user/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var webu = data.data[0];
      $("#webu_id").val(webu.id);
      $("#webu_name").val(webu.fullname);
      $("#webu_pin").val(webu.pin);
      $("#webu_mobile").val(webu.mobile);
      $("#webu_email").val(webu.email);
      $("#webu_address").val(webu.address);
      $("#webu_city").val(webu.city);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$(".twebuTables").on("click", ".edit-webu", function () {
  var id = $(this).attr("webu_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/web_user/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var webu = data.data[0];
      $("#webu_id").val(webu.id);
      $("#webu_name").val(webu.fullname);
      $("#webu_pin").val(webu.pin);
      $("#webu_mobile").val(webu.mobile);
      $("#webu_email").val(webu.email);
      $("#webu_address").val(webu.address);
      $("#webu_city").val(webu.city);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-webu").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  $("#pleasewait").modal("hide");
  if (data.type === "success") {
    $("#edit-webu").modal("hide");
    webuTable.ajax.url(base_url + "admin_master/webu").load();
  }
});

$("#tupdate-webu").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  $("#pleasewait").modal("hide");
  if (data.type === "success") {
    $("#edit-webu").modal("hide");
    twebuTable.ajax.url(base_url + "admin_master/webu_teacher").load();
  }
});

$(".webuTables").on("click", ".delete_webu", function () {
  var id = $(this).attr("webu_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_webu",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            webuTable.ajax.url(base_url + "admin_master/webu").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$(".twebuTables").on("click", ".delete_webu", function () {
  var id = $(this).attr("webu_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_webu",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            twebuTable.ajax.url(base_url + "admin_master/webu_teacher").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// Client End

// State Start
var stateTable = $(".stateTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/states",
  columns: [
    { data: "sr_no" },
    { data: "StateName" },
    { data: "zone" },
    { data: "action" },
  ],
});

$("#addState").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    stateTable.ajax.url(base_url + "admin_master/states").load();
    $(this).trigger("reset");
    $("#add-new-state").modal("hide");
  }
});

$(".stateTables").on("click", ".edit-state", function () {
  var id = $(this).attr("state_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/state/StateID/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var permission = data.data[0];
      $("#state_id").val(permission.StateID);
      $("#gstate_name").val(permission.StateName);
      $("#gstate_zone").val(permission.zone);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-state").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-state").modal("hide");
    stateTable.ajax.url(base_url + "admin_master/states").load();
  }
});

$(".stateTables").on("click", ".delete_state", function () {
  var id = $(this).attr("state_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_state",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            stateTable.ajax.url(base_url + "admin_master/states").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// State End

// city Start
var cityTable = $(".cityTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/cities",
  columns: [
    { data: "sr_no" },
    { data: "state_name" },
    { data: "city_name" },
    { data: "action" },
  ],
});

$("#addCity").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    cityTable.ajax.url(base_url + "admin_master/cities").load();
    $(this).trigger("reset");
    $("#add-new-city").modal("hide");
  }
});

$(".cityTables").on("click", ".edit-city", function () {
  var id = $(this).attr("city_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/city/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var permission = data.data[0];
      $("#state_id").val(permission.state_id);
      $("#city_id").val(permission.id);
      $("#gcity_name").val(permission.city_name);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-city").on("aftersubmit", function (e, data) {
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-city").modal("hide");
    cityTable.ajax.url(base_url + "admin_master/cities").load();
  }
});

$(".cityTables").on("click", ".delete_city", function () {
  var id = $(this).attr("city_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_city",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            cityTable.ajax.url(base_url + "admin_master/cities").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$(document).ready(function () {
  $("#state").on("change", function () {
    var stateID = $(this).val();

    if (stateID) {
      $.ajax({
        url: "admin_master/ret_city",
        type: "post",
        dataType: "json",
        data: { id: stateID },
        success: function (response) {
          $("#city").find("option").not(":first").remove();
          $.each(response, function (index, data) {
            $("#city").append(
              '<option value="' +
                data["id"] +
                '">' +
                data["city_name"] +
                "</option>",
            );
          });
        },
      });
    } else {
      $("#city").html('<option value="">Select state first</option>');
    }
  });
});

// city End

// Board Start
var boardTable = $(".boardTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/boards",
  columns: [{ data: "sr_no" }, { data: "name" }, { data: "action" }],
});

$("#addBoard").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    boardTable.ajax.url(base_url + "admin_master/boards").load();
    $(this).trigger("reset");
    $("#add-new-board").modal("hide");
  }
});

$(".boardTables").on("click", ".edit-board", function () {
  var id = $(this).attr("board_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/board/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var board = data.data[0];
      $("#board_id").val(board.id);
      $("#getname").val(board.name);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-board").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-board").modal("hide");
    boardTable.ajax.url(base_url + "admin_master/boards").load();
  }
});

$(".boardTables").on("click", ".delete_board", function () {
  var id = $(this).attr("board_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_board",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            boardTable.ajax.url(base_url + "admin_master/boards").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$(document).ready(function () {
  $("#boardget").on("change", function (e) {
    var valueSelected = this.value;
    var web_id = $("#user_id").val();

    $.ajax({
      url: base_url + "admin_master/get_serieschange_update",
      method: "post",
      data: { bid: valueSelected, webid: web_id },
      success: function (response) {
        $("#ser_section").html(response);
      },
    });
  });
});
// #mod
// $(document).ready(function () {
//   if (sessionStorage.getItem("selectionClass")) {
//     alert(sessionStorage.getItem("selectionClass"));
//   } else {
//     const boardID = $("#select_board").find(":selected").val();
//     var sClasses;
//     fetch(base_url + "admin_master/getMainSubjects/" + boardID)
//       .then((res) => res.json())
//       .then((data) => {
//         data.forEach((item, index, arr) => {
//           $(".teacherClasses").append(
//             `<option value="${item.id}">${item.name}</option>`
//           );
//           sClasses += `<option value="${item.id}">${item.name}</option>`;
//         });
//       });
//     sessionStorage.setItem("selectionClass", sClasses);
//   }
//   if (sessionStorage.getItem("selectionBook")) {
//   } else {
//   }
//   if (sessionStorage.getItem("selectionCategory")) {
//   } else {
//   }
//   if (sessionStorage.getItem("selectedSubject")) {
//   } else {
//   }
//   if (sessionStorage.getItem("selectedClass")) {
//   } else {
//   }
//   if (sessionStorage.getItem("selectedBook")) {
//   } else {
//   }
//   if (sessionStorage.getItem("selectedCategory")) {
//   } else {
//   }
//   if (sessionStorage.getItem("selectedSubject")) {
//   } else {
//   }
// });

if ($(".teacherClasses").length) {
  // $(document).ready(() => {
  //   // $(".teacherClasses").html(`<option value="">Select Class</option>`);
  //   // $("#select_msubject").html(`<option value="">Select Book</option>`);
  //   // Set main subject
  //   const boardID = $("#select_board").find(":selected").val();
  //   fetch(base_url + "admin_master/getMainSubjects/" + boardID)
  //     .then((res) => res.json())
  //     .then((data) => {
  //       $("#mainSubject").html(`<option value="">Select Subject</option>`);
  //       data.forEach((item, key, arr) => {
  //         $("#mainSubject").append(
  //           `<option value="${item.id}">${item.name}</option>`
  //         );
  //       });
  //     });
  // });
  //   #mod
  $(document).ready(function () {
    $("#mainSubject").on("click, change", (e) => {
      const mainSubjectID = $("#mainSubject").find(":selected").val();
      fetch(base_url + "admin_master/getClasses/" + mainSubjectID)
        .then((res) => res.json())
        .then((data) => {
          $(".teacherClasses").html(`<option value="">Select Class</option>`);
          data.forEach((item, key, arr) => {
            $(".teacherClasses").append(
              `<option value="${item.id}">${item.name}</option>`,
            );
          });
        });
    });
    //   end
    $(".teacherClasses").on("click, change", (e) => {
      const mainSubjectID = $("#mainSubject").find(":selected").val();
      const classID = $(".teacherClasses").find(":selected").val();

      fetch(
        base_url + "admin_master/getSubjects/" + mainSubjectID + "/" + classID,
      )
        .then((res) => res.json())
        .then((data) => {
          $(".teacherMsubject").html(`<option value="">Select Book</option>`);
          data.forEach((item, key, arr) => {
            $(".teacherMsubject").append(
              `<option data-categories="${item.categories}" value="${item.id}">${item.name}</option>`,
            );
          });
        });
    });
    // #mod 8.10.21

    // function makeFirstActive() {
    //   $(".userTeacher li:first").addClass("active");
    //   console.log($(".userTeacher li:first").text()); //.addClass("active");
    // }

    // $("#searchBtn").on("click", (e) => {
    //   $(".userTeacher").length
    //     ? $(".userTeacher").html("")
    //     : $(".userStudent").html("");
    //   const categoriesString =
    //     "" + $(".teacherMsubject").find(":selected").data("categories") + "";
    //   // console.log(typeof categoriesString);
    //   const categoriesArray = categoriesString.split(",");
    //   // console.log(categoriesArray);
    //   categoriesArray.forEach((item, key, arr) => {
    //     fetch(base_url + "admin_master/getCategories/" + item)
    //       .then((res) => res.json())
    //       .then((data) => {
    //         //   $(".teacheurMsubject").html(`<option value="">Select Book</option>`);
    //         data.forEach((item, key, arr) => {
    //           if (item.allow == "Teacher" || "Both") {
    //     if ($(".userTeacher").length) {
    //       $(".userTeacher").append(
    //         `<li class="card col-xl-2 col-lg-2 col-sm-12 col-md-4 p-2 my-1" id="active${item.id}" style="box-shadow:none; border-radius:.5rem">
    // <a tab_id="${item.id}" class="new-search">${item.name}</a>
    // </li>`
    //       );
    //       if (Object.is(arr.length - 1, key)) {
    //         makeFirstActive();
    //       }
    //     }
    //   } else if (item.allow == "Student" || "Both") {
    //             if ($(".userStudent").length) {
    //               $(".userStudent").append(
    //                 `<option value="${item.id}">${item.name}</option>`
    //               );
    //             }
    //           }
    //         });
    //       });
    //   });
    // });
  });

  // end

  // For teacher query form in submitting the question
  $("#class").on("click, change", (e) => {
    const classID = $("#class").find(":selected").val();

    fetch(base_url + "admin_master/getSubjects/" + classID)
      .then((res) => res.json())
      .then((data) => {
        $("#book_sub").html(`<option value="">Select Book</option>`);
        data.forEach((item, key, arr) => {
          $("#book_sub").append(
            `<option value="${item.id}">${item.name}</option>`,
          );
        });
      });
  });
}
// #endmod

$("#boardget").on("change", function (e) {
  var valueSelected = $("#boardget").find(":selected").val();
  var web_id = $("#user_id").val();
  $.ajax({
    url: base_url + "admin_master/get_series_update",
    method: "post",
    data: { bid: valueSelected, webid: web_id },
    success: function (response) {
      $("#ser_section").html(response);
    },
  });
});

// Board End

// content Start
var contTable = $(".contTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/conts",
  fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
    var imgLink = aData["file_name"]; // if your JSON is 3D
    // var imgLink = aData[4]; // where 4 is the zero-origin column for 2D

    var imgTag = '<img src="assets/img/' + imgLink + '"/>';
    $("td:eq(1)", nRow).html(imgTag); // where 4 is the zero-origin visible column in the HTML

    return nRow;
  },
  columns: [
    { data: "sr_no" },
    { data: "file_name" },
    { data: "name" },
    { data: "value" },
    { data: "action" },
  ],
});

$("#addContent").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    contTable.ajax.url(base_url + "admin_master/conts").load();
    $(this).trigger("reset");
    $("#add-new-cont").modal("hide");
  }
});

$(".contTables").on("click", ".edit-cont", function () {
  var id = $(this).attr("cont_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/web_content/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var board = data.data[0];
      $("#cont_id").val(board.id);
      $("#cont_name").val(board.name);
      $("#cont_value").val(board.value);
      if (!(board.file_name == null)) {
        $("#cont_image").attr("src", "assets/img/" + board.file_name);
      }
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-cont").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-cont").modal("hide");
    contTable.ajax.url(base_url + "admin_master/conts").load();
  }
});

$(".contTables").on("click", ".delete_cont", function () {
  var id = $(this).attr("cont_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_cont",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            contTable.ajax.url(base_url + "admin_master/conts").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// cONTENT End

// Publication Start
var publicationTable = $(".publicationTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/publications",
  columns: [{ data: "sr_no" }, { data: "name" }, { data: "action" }],
});

$("#addPublication").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    publicationTable.ajax.url(base_url + "admin_master/publications").load();
    $(this).trigger("reset");
    $("#add-new-publication").modal("hide");
  }
});

$(".publicationTables").on("click", ".edit-publication", function () {
  var id = $(this).attr("publication_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/publication/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var publication = data.data[0];
      $("#publication_id").val(publication.id);
      $("#getname").val(publication.name);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-publication").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-publication").modal("hide");
    publicationTable.ajax.url(base_url + "admin_master/publications").load();
  }
});

$(".publicationTables").on("click", ".delete_publication", function () {
  var id = $(this).attr("publication_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_publication",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            publicationTable.ajax
              .url(base_url + "admin_master/publications")
              .load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// Publication End

// Category Start
var categoryTable = $(".categoryTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/categorys",
  columns: [
    { data: "sr_no" },
    { data: "name" },
    { data: "orders" },
    { data: "allow" },
    { data: "action" },
  ],
});

$("#addCategory").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    categoryTable.ajax.url(base_url + "admin_master/categorys").load();
    $(this).trigger("reset");
    $("#add-new-category").modal("hide");
  }
});

$(".categoryTables").on("change", ".edit-categoryss", function () {
  var id = $(this).attr("category_id");
  var val = $(this).val();
  $.ajax({
    url: base_url + "admin_master/chg",
    type: "post",
    dataType: "json",
    data: {
      id: id,
      val: val,
    },
    success: function (data) {
      toastr[data.type](data.message);
      categoryTable.ajax.url(base_url + "admin_master/categorys").load();
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$(".categoryTables").on("click", ".edit-category", function () {
  var id = $(this).attr("category_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/category/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var category = data.data[0];
      $("#category_id").val(category.id);
      $("#getname").val(category.name);
      $("#allow_per").val(category.allow);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-category").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-category").modal("hide");
    categoryTable.ajax.url(base_url + "admin_master/categorys").load();
  }
});

$(".categoryTables").on("click", ".delete_category", function () {
  var id = $(this).attr("category_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_category",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            categoryTable.ajax.url(base_url + "admin_master/categorys").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// Category End

// Summative Question Start

var summativeQue = $(".summativeQues").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/summativeQuestion",
  columns: [
    { data: "sr_no" },
    { data: "subsName" },
    { data: "class" },
    { data: "name" },
    { data: "marks" },
    { data: "created_by" },
    { data: "action" },
  ],
});

$("#addsummativeQuestion").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    summativeQue.ajax.url(base_url + "admin_master/summativeQuestion").load();
    $(this).trigger("reset");
    $("#madd-new-summative").modal("hide");
  }
});

$(".summativeQues").on("click", ".summative-QuestionEdit", function () {
  var id = $(this).attr("summativeQuestion_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/touch_question/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var summative = data.data[0];
      $("#summativeQuestion_id").val(summative.id);
      $("#summativegetseries").val(summative.series);
      $("#summativegetclass").val(summative.class);
      $("#summativegetname").val(summative.name);
      $("#summativegetmarks").val(summative.marks);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#summative-QuestionUpdate").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#summative-QuestionEdit").modal("hide");
    summativeQue.ajax.url(base_url + "admin_master/summativeQuestion").load();
  }
});

$(".summativeQues").on("click", ".summativeQuestionDelete", function () {
  var id = $(this).attr("summativeQuestion_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/summativeQuestionDelete",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            summativeQue.ajax
              .url(base_url + "admin_master/summativeQuestion")
              .load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// Summative Question End

// Objective Question Start

var objectiveQue = $(".objectiveQues").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/objectiveQuestion",
  columns: [
    { data: "sr_no" },
    { data: "subsName" },
    { data: "class" },
    { data: "name" },
    { data: "option_a" },
    { data: "option_b" },
    { data: "option_c" },
    { data: "option_d" },
    { data: "marks" },
    { data: "created_by" },
    { data: "action" },
  ],
});

$("#addobjectiveQuestion").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    objectiveQue.ajax.url(base_url + "admin_master/objectiveQuestion").load();
    $(this).trigger("reset");
    $("#madd-new-objective").modal("hide");
  }
});

$(".objectiveQues").on("click", ".objective-QuestionEdit", function () {
  var id = $(this).attr("objectiveQuestion_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/touch_question/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var objective = data.data[0];
      $("#objectiveQuestion_id").val(objective.id);
      $("#objectivegetseries").val(objective.series);
      $("#objectivegetclass").val(objective.class);
      $("#objectivegetname").val(objective.name);
      $("#objectivegetoption_a").val(objective.option_a);
      $("#objectivegetoption_b").val(objective.option_b);
      $("#objectivegetoption_c").val(objective.option_c);
      $("#objectivegetoption_d").val(objective.option_d);
      $("#objectivegetanswer").val(objective.answer);
      $("#objectivegetmarks").val(objective.marks);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#objective-QuestionUpdate").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#objective-QuestionEdit").modal("hide");
    summativeQue.ajax.url(base_url + "admin_master/objectiveQuestion").load();
  }
});

$(".objectiveQues").on("click", ".objectiveQuestionDelete", function () {
  var id = $(this).attr("objectiveQuestion_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/objectiveQuestionDelete",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            objectiveQue.ajax
              .url(base_url + "admin_master/objectiveQuestion")
              .load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// objective Question End

// Main Subject Start
var msubjectTable = $(".msubjectTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/msubjects",
  columns: [
    { data: "sr_no" },
    { data: "board" },
    { data: "name" },
    { data: "serial" },
    { data: "action" },
  ],
});
// #mod
$("#maddSubject").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    msubjectTable.ajax.url(base_url + "admin_master/msubjects").load();
    $(this).trigger("reset");
    $("#madd-new-subject").modal("hide");
  }
});
// #modend
$(".msubjectTables").on("click", ".medit-subject", function () {
  var id = $(this).attr("msubject_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/main_subject/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var subject = data.data[0];
      //   #mod
      $("#classesCheck input").attr("checked", false);
      if (subject.classes) {
        // perform these only if subject has classes
        let classes = subject.classes.split(",");
        classes.forEach((item, key, arr) => {
          $(`#edit${item}`).attr("checked", true);
        });
      }
      // end
      $("#msubject_id").val(subject.id);
      $("#upboard").val(subject.board);
      $("#mgetname").val(subject.name);
      $("#upserial").val(subject.serial);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});
// #mod
// $("#medit-subject").on("hidden.bs.modal", function (e) {
//   $("#mupdate-subject").trigger("reset");
// });
// end

$("#mupdate-subject").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#medit-subject").modal("hide");
    msubjectTable.ajax.url(base_url + "admin_master/msubjects").load();
  }
});

$(".msubjectTables").on("click", ".mdelete_subject", function () {
  var id = $(this).attr("msubject_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/mdelete_subject",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            msubjectTable.ajax.url(base_url + "admin_master/msubjects").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// Main Subject End

// Subject Start
var subjectTable = $(".subjectTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/subjects",
  columns: [
    { data: "sr_no" },
    { data: "name" },
    { data: "subsName" },
    { data: "action" },
  ],
});

$("#addSubject").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    subjectTable.ajax.url(base_url + "admin_master/subjects").load();
    $(this).trigger("reset");
    $("#add-new-subject").modal("hide");
  }
});

$(".subjectTables").on("click", ".edit-subject", function () {
  var id = $(this).attr("subject_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/subject/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var subject = data.data[0];
      //   #mod
      $("#categoriesCheck input").attr("checked", false);
      if (subject.categories) {
        // perform these only if subject has categories
        let categories = subject.categories.split(",");
        categories.forEach((item, key, arr) => {
          $(`#edit${item}`).attr("checked", true);
        });
      }
      // end
      $("#subject_id").val(subject.id);
      $("#getname").val(subject.name);
      $("#gsubject").val(subject.sid);
      $("#editBookClass").val(subject.class);
      $("#updateSeriesId").val(subject.series_id);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-subject").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-subject").modal("hide");
    $("#update-subject").trigger("reset");
    subjectTable.ajax.url(base_url + "admin_master/subjects").load();
  }
});

$(".subjectTables").on("click", ".delete_subject", function () {
  var id = $(this).attr("subject_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_subject",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            subjectTable.ajax.url(base_url + "admin_master/subjects").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// Subject End

// Series Start
var seriesTable = $(".seriesTable").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/series",
  columns: [
    { data: "sr_no" },
    { data: "name" },
    { data: "subject_names" },
    { data: "action" },
  ],
});

$("#addSeries").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    seriesTable.ajax.url(base_url + "admin_master/series").load();
    $(this).trigger("reset");
    $("#add-new-series").modal("hide");
  }
});

$(".seriesTable").on("click", ".edit-series", function () {
  $("#updateSubjects input").attr("checked", false);
  var id = $(this).attr("series_id");
  let subjects = $(this).attr("data-mSubIds").split(",");
  $.ajax({
    url: base_url + "admin_master/retrieve/series/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      // console.log(data.data[0]);
      var series = data.data[0];
      $("#series_id").val(series.id);
      $("#gseries").val(series.main_subject_id);
      $("#getname").val(series.name);
      if (subjects.length) {
        subjects.forEach((item, key, arr) => {
          $(`#update${item}`).attr("checked", true);
        });
      }
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-series").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-series").modal("hide");
    $("#update-series").trigger("reset");
    seriesTable.ajax.url(base_url + "admin_master/series").load();
  }
});

$(".seriesTable").on("click", ".delete_series", function () {
  var id = $(this).attr("series_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_series",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            seriesTable.ajax.url(base_url + "admin_master/series").load();
            toastr[data.type](data.message);
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
// Sereies End

// Assign Test Start

var assigntestTable = $(".assigntestTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/assigntest",
  columns: [
    { data: "sr_no" },
    { data: "class_name" },
    { data: "paper_mode" },
    { data: "date_start" },
    { data: "date_end" },
    { data: "action" },
  ],
});

$("#addassigntest").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    assigntestTable.ajax.url(base_url + "admin_master/assigntest").load();
    $(this).trigger("reset");
    // $("#add-new-classes").modal('hide');
  }
});

// Assign Test End

// Class Section Start

var classesSectionTable = $(".classesSectionTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/classesSection",
  columns: [
    { data: "sr_no" },
    { data: "className" },
    { data: "name" },
    { data: "action" },
  ],
});

$("#addClassesSection").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    classesSectionTable.ajax
      .url(base_url + "admin_master/classesSection")
      .load();
    $(this).trigger("reset");
    $("#add-new-classes").modal("hide");
  }
});

$(".classesSectionTables").on("click", ".edit-classesSection", function () {
  var id = $(this).attr("classesSection_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/class_section/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var classesSection = data.data[0];
      $("#classesSection_id").val(classesSection.id);
      $("#getclassid").val(classesSection.class_id);
      $("#getname").val(classesSection.name);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-classesSection").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-classes").modal("hide");
    classesSectionTable.ajax
      .url(base_url + "admin_master/classesSection")
      .load();
  }
});

$(".classesSectionTables").on("click", ".delete_classesSection", function () {
  var id = $(this).attr("classesSection_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_classesSection",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            classesSectionTable.ajax
              .url(base_url + "admin_master/classesSection")
              .load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// Class Section End

// Classes Start
var classesTable = $(".classesTables").DataTable({
  serverSide: false,
  ajax: base_url + "admin_master/classess",
  columns: [
    { data: "sr_no" },
    { data: "name" },
    { data: "class_position" },
    { data: "action" },
  ],
});

$("#addClasses").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    classesTable.ajax.url(base_url + "admin_master/classess").load();
    $(this).trigger("reset");
    $("#add-new-classes").modal("hide");
  }
});

$(".classesTables").on("click", ".edit-classes", function () {
  var id = $(this).attr("classes_id");
  $.ajax({
    url: base_url + "admin_master/retrieve/classes/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var classes = data.data[0];
      $("#classes_id").val(classes.id);
      $("#getname").val(classes.name);
      $("#getposition").val(classes.class_position);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#update-classes").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#edit-classes").modal("hide");
    classesTable.ajax.url(base_url + "admin_master/classess").load();
  }
});

$(".classesTables").on("click", ".delete_classes", function () {
  var id = $(this).attr("classes_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_classes",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            classesTable.ajax.url(base_url + "admin_master/classess").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// Assign start

$(".assignstudent").on("click", ".webuserEdit", function () {
  var id = $(this).attr("webuserEdit_id");
  //alert(id);
  $.ajax({
    url: base_url + "admin_master/retrieve/web_user/id/" + id,
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      var subject = data.data[0];
      $("#stu_id").val(subject.id);
      $("#stud_name").val(subject.fullname);
      $("#stud_mobile").val(subject.mobile);
      $("#stud_email").val(subject.email);
      $("#stud_school_address").val(subject.addresss);
      $("#stud_school_email").val(subject.emails);
      $("#pri_name").val(subject.principal_name);
      $("#ref_name").val(subject.referrel_name);
      $("#ref_contact").val(subject.referrel_mobile);
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#teacher-update-student").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $("#myModal").modal("hide");
    assignstudent.ajax.url(base_url + "web/teacher_panel").load();
  }
});

$(".assignstudent").on("click", ".webuserDelete", function () {
  var id = $(this).attr("web_user_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/teacher_remove_student",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            assignstudent.ajax.url(base_url + "web/teacher_panel").load();
            location.reload();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$(".paperassignstudent").on("click", ".paperassigndelete", function () {
  var id = $(this).attr("deletepaperassign_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/mdelete_assign_paper",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            paperassignstudent.ajax.url(base_url + "web/test_assign").load();
            location.reload();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

// Classes End
// web support
$("#checkAll").click(function () {
  $("#addSupport input:checkbox").not(this).prop("checked", this.checked);
});
$("#checkAlln").click(function () {
  $("input.north:checkbox").not(this).prop("checked", this.checked);
});
$("#checkAlls").click(function () {
  $("input.south:checkbox").not(this).prop("checked", this.checked);
});
$("#checkAlle").click(function () {
  $("input.east:checkbox").not(this).prop("checked", this.checked);
});
$("#checkAllw").click(function () {
  $("input.west:checkbox").not(this).prop("checked", this.checked);
});
$("#checkAlll").click(function () {
  $("#update-support input:checkbox").not(this).prop("checked", this.checked);
});
$("#selAll").click(function () {
  $(".supportTables input:checkbox").not(this).prop("checked", this.checked);
});
var supportTable = $(".supportTables").DataTable({
  serverSide: false,
  ajax: {
    url: base_url + "admin_master/support",
    type: "post",
    data: { id: $("#supportt_type").val() },
  },
  columns: [
    { data: "check" },
    { data: "sr_no" },
    { data: "title" },
    { data: "boardName" },
    { data: "publicationName" },
    { data: "className" },
    { data: "subjectName" },
    { data: "edition" },
    { data: "year" },
    { data: "date" },
    { data: "action" },
  ],
});

$(function () {
  var pbar = $("#progressBar"),
    currentProgress = 0;
  function trackUploadProgress(e) {
    if (e.lengthComputable) {
      currentProgress = (e.loaded / e.total) * 100; // Amount uploaded in percent
      $(pbar).width(currentProgress + "%");
      var tr = parseInt(currentProgress);
      $(pbar).html(tr + "%");
      if (currentProgress == 100) console.log("Progress : 100%");
    }
  }

  function uploadFile() {
    var formdata = new FormData($("form")[0]);

    // var form = new FormData();
    // form.append("support_image", "/C:/Users/sanjeet/Downloads/transaction table delete - Sheet1.csv");

    // var settings = {
    //     "async": true,
    //     "crossDomain": true,
    //     "url": base_url + 'admin_master/addSupport',
    //     "method": "POST",

    //     "processData": false,
    //     "contentType": false,
    //     "mimeType": "multipart/form-data",
    //     "data": formdata
    // }

    // $.ajax(settings).done(function (response) {
    //     console.log(response);
    // });

    // return;

    $.ajax({
      url: "admin_master/addSupport",
      type: "post",
      dataType: "json",
      data: formdata,
      xhr: function () {
        // Custom XMLHttpRequest
        var appXhr = $.ajaxSettings.xhr();

        // Check if upload property exists, if "yes" then upload progress can be tracked otherwise "not"
        if (appXhr.upload) {
          // Attach a function to handle the progress of the upload
          appXhr.upload.addEventListener(
            "progress",
            trackUploadProgress,
            false,
          );
        }
        return appXhr;
      },
      success: function (data) {
        toastr[data.type](data.message);
        $("#pleasewait").modal("hide");
        $("#add-new-support").modal("hide");
        $("#addSupport").trigger("reset");
        $("#progressBar").removeClass("active");
        supportTable.ajax.url(base_url + "admin_master/support").load();
      },
      error: function () {
        $("#pleasewait").modal("hide");
        toastr[data.type](data.message);
      },

      // Tell jQuery "Hey! don't worry about content-type and don't process the data"
      // These two settings are essential for the application
      contentType: false,
      processData: false,
    });
  }

  $("#addSupport").submit(function (e) {
    e.preventDefault();
    $("#pleasewait").modal("show");
    $(pbar).width(0).addClass("active");
    uploadFile();
  });
});

$(".supportTables").on("click", ".delete_support", function () {
  var id = $(this).attr("support_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_support",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            supportTable.ajax.url(base_url + "admin_master/support").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$(".spa").on("click", "#delete-support-all", function () {
  var id = [];
  $.each($("input[name='checkDelete']:checked"), function () {
    id.push($(this).val());
  });
  console.log(id);
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/delete_support_all",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            supportTable.ajax.url(base_url + "admin_master/support").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$("#update-support").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    history.go(-1);
  }
});

$("#Selform").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  // if (data.type === "success") {
  location.reload(); // #StopReload
  // }
});
// end web support

// web js start

$(".reg_student").on("click", function () {
  var type = "Student";
  $("#add-new-student").modal("show");
});

$(".reg_teacher").on("click", function () {
  var type = "Teacher";
  $("#add-new-teacher").modal("show");
});

$("#add-new-student").on("input", "#student_email", function () {
  var id = $(this).val();
  $.ajax({
    url: base_url + "admin_master/validate_email",
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      console.log(data.type);
      if (data.type === "success") {
        $("#getemail_desc").html(data.message);
        $("#getemail_desc").css("color", "green");
      } else if (data.type === "error") {
        $("#getemail_desc").html(data.message);
        $("#getemail_desc").css("color", "red");
      }
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#add-new-teacher").on("input", "#teacher_email", function () {
  var id = $(this).val();
  $.ajax({
    url: base_url + "admin_master/validate_email",
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      console.log(data);
      if (data.type === "success") {
        $("#getemail_descc").html(data.message);
        $("#getemail_descc").css("color", "green");
      } else if (data.type === "error") {
        $("#getemail_descc").html(data.message);
        $("#getemail_descc").css("color", "red");
      }
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

$("#addStudent").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $(this).trigger("reset");
    $("#add-new-student").modal("hide");
    window.location.href = "";
    $(".register-message-box").removeClass("d-none");
    $(".register-message-box").html(
      "You are Successfully registerd with us, Please Check your registerd email for your account credentials...",
    );
  }
});

$("#addTeacher").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  toastr[data.type](data.message);
  if (data.type === "success") {
    $(this).trigger("reset");
    $("#add-new-teacher").modal("hide");
    window.location.href = "";
    $(".register-message-box").removeClass("d-none");
    $(".register-message-box").html(
      "You are Successfully registerd with us, Please Check your registerd email for your account credentials...",
    );
  }
});
$("#teacher_class").click(function () {
  $(".cc").not(this).prop("checked", this.checked);
});
$("#teacher_subject").click(function () {
  $(".ss").not(this).prop("checked", this.checked);
});

$("#webLogin").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  $(this).trigger("reset");
  toastr[data.type](data.message);
  if (data.type === "success") {
    window.location.href = base_url + "dashboard";
  }
});

$("#downloadcode").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  $(this).trigger("reset");
  toastr[data.type](data.message);

  if (data.type === "success") {
    $("#download_link").show();
    $("#download_check").hide();
    window.location.href = base_url + "dashboard";
  }
});

$(".webuTables").on("click", ".status_webu", function () {
  var id = $(this).attr("webu_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Block User !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/reject_emp",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            webuTable.ajax.url(base_url + "admin_master/webu").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
$(".webuTables").on("click", ".statuss_webu", function () {
  var id = $(this).attr("webu_id");
  swal({
    title: "Are you sure?",
    text: "After thar please set further steps!",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Unblock User !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/select_emp",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            webuTable.ajax.url(base_url + "admin_master/webu").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$(".twebuTables").on("click", ".status_webu", function () {
  var id = $(this).attr("webu_id");
  swal({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Block User !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/reject_emp",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            twebuTable.ajax.url(base_url + "admin_master/webu_teacher").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});
$(".twebuTables").on("click", ".statuss_webu", function () {
  var id = $(this).attr("webu_id");
  swal({
    title: "Are you sure?",
    text: "After thar please set further steps!",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Unblock User !",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: base_url + "admin_master/select_emp",
        type: "post",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          if (data.type === "success") {
            toastr[data.type](data.message);
            twebuTable.ajax.url(base_url + "admin_master/webu_teacher").load();
          } else if (data.type === "error") {
            toastr[data.type](data.message);
          }
        },
        error: function (data) {
          console.log("unable to send request..");
        },
      });
    }
  });
});

$("#support_msubject").change(function () {
  var board_id = $("#support_msubject").val();
  $.ajax({
    url: base_url + "admin_master/get_subm",
    method: "post",
    data: {
      bid: board_id,
    },
    dataType: "json",
    success: function (response) {
      $("#support_subject").find("option").not(":first").remove();
      $.each(response, function (index, data) {
        $("#support_subject").append(
          '<option value="' + data["id"] + '">' + data["name"] + "</option>",
        );
      });
    },
  });
});

$("#teacher_panel_class").change(function () {
  var class_id = $("#teacher_panel_class").val();
  $.ajax({
    url: base_url + "admin_master/get_sectionName",
    method: "post",
    data: {
      bid: class_id,
    },
    dataType: "json",
    success: function (response) {
      $("#class_section_name").find("option").not(":first").remove();
      $.each(response, function (index, data) {
        $("#class_section_name").append(
          '<option value="' + data["id"] + '">' + data["name"] + "</option>",
        );
      });
    },
  });
});

$("#class_section_name").change(function () {
  var section_id = $("#class_section_name").val();
  var class_id = $("#teacher_panel_class").val();
  $.ajax({
    url: base_url + "admin_master/get_sectionclass",
    method: "post",
    data: {
      sid: section_id,
      cid: class_id,
    },
    success: function (response) {
      $("#hide_student_tbl").hide();
      $("#techr_tbl_sect").show();
      // $('#techr_tbl').show();
      $("#studentexamsub").html(response);
    },
  });
});

$(".selectBoard_change").change(function () {
  //alert('ram');
  var board_id = $("#select_board").val();
  $.ajax({
    url: base_url + "admin_master/change_board",
    method: "post",
    data: {
      bid: board_id,
    },
    dataType: "json",
    success: function (response) {
      window.location.reload();
    },
  });
});

/*
$('#select_board, #select_publication, #select_classes, #select_msubject').change(function () {
    var board_id = $('#select_board').val();
    var pub_id = $('#select_publication').val();
    var class_id = $('#select_classes').val();
    var sid = $('#select_msubject').val();
    $.ajax({
        url: base_url + 'admin_master/get_subr',
        method: 'post',
        data: {
            bid: board_id,
            pid: pub_id,
            cid: class_id,
            sid: sid
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
*/
/*
$(document).ready(function () {
    var board_id = $('#select_board').val();
    var pub_id = $('#select_publication').val();
    var class_id = $('#select_classes').val();
    var msub_id = $('#msub_d').val();
   // var ssub_d = $('#sub_d').val();
    $.ajax({
        url: base_url + 'admin_master/get_subr',
        method: 'post',
        data: {
            bid: board_id,
            pid: pub_id,
            cid: class_id,
            mid: msub_id
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $('#select_msubject')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="" disabled>Select Subject</option>')
                    .val('')
                    ;
            $('#select_msubject').find('option').not(':first').remove();
            $.each(response, function (index, data) {
                $('#select_msubject').append('<option value="' + data['subjectId'] + '">' + data['subjectName'] + '</option>');
            });
            $("#select_msubject option").each(function () {
                if ($(this).val() == msub_id)
                    $(this).attr("selected", "selected");
            });
        }
    });
});
*/

//section
$(".get_section").change(function () {
  var classid = $(this).val();
  // alert('check');
  var dataString = classid;
  $.ajax({
    type: "POST",
    url: base_url + "admin_master/get_sectionName",
    data: dataString,
    success: function (result) {
      //alert(result);
      $("#student_section").html(result);
    },
  });
});

$("#student_class").change(function () {
  var id = $(this).val();
  $.ajax({
    url: base_url + "admin_master/get_subs",
    method: "post",
    data: {
      id: id,
    },
    dataType: "json",
    success: function (response) {
      $("#student_subject")
        .find("option")
        .remove()
        .end()
        .append('<option value="" disabled>Select Subject</option>')
        .val("");
      $("#student_subject").find("option").not(":first").remove();
      $.each(response, function (index, data) {
        $("#student_subject").append(
          '<option value="' +
            data["subjectId"] +
            '">' +
            data["subjectName"] +
            "</option>",
        );
      });
    },
  });
});

$("#checkForgot").on("aftersubmit", function (e, data) {
  $("#pleasewait").modal("hide");
  $(this).trigger("reset");
  $("#forgot_passs").modal("show");
  $(".swd").html(data.message);
  if (data.type === "success") {
    $("#forgot_pass").modal("hide");
  }
});

$(".forgt").on("click", function () {
  $("#forgot_pass").modal("show");
});

$(".sder").on("click", function () {
  var id = $(this).attr("sid");
  $.ajax({
    url: base_url + "admin_master/ret_r",
    type: "post",
    dataType: "json",
    data: { id: id },
    success: function (response) {
      console.log(response);
      $("#add-new-cls").modal("show");
      $(".ser").empty();
      var j = 1;
      $.each(response, function (index, data) {
        $(".ser").append(
          "<tr><td>" +
            j +
            "</td><td>" +
            data["name"] +
            "</td><td>" +
            data["total"] +
            "</td></tr>",
        );
        j++;
      });
    },
    error: function (data) {
      console.log("unable to send request..");
    },
  });
});

var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  if (!selElmnt) {
    continue;
  }
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
  var x,
    y,
    i,
    arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i);
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

$("#board_teach").change(function () {
  var id = $(this).val();
  $.ajax({
    url: base_url + "admin_master/get_techrefsubs",
    method: "post",
    data: {
      id: id,
    },
    dataType: "json",
    success: function (response) {
      $("#book_sub")
        .find("option")
        .remove()
        .end()
        .append('<option value="" disabled>Select Subject</option>')
        .val("");
      $("#book_sub").find("option").not(":first").remove();
      $.each(response, function (index, data) {
        $("#book_sub").append(
          '<option value="' + data["id"] + '">' + data["name"] + "</option>",
        );
      });
    },
  });
});

/* If the user clicks anywhere outside the select box,
 then close all select boxes: */
document.addEventListener("click", closeAllSelect);

// For URL upload feature
$(document).ready(function () {
  if ($("#upURL").length) {
    $("#upURL").hide();
  }
});
$("#upType").on("change", () => {
  let type = $("#upType").find(":selected").text();
  // console.log(type);
  if (type == "URL") {
    $("#upFile").hide();
    $("#upURL").show();
  } else {
    $("#upURL").hide();
    $("#upFile").show();
  }
});
// for update
$(document).ready(function () {
  let uploadtype = $("#uploadType").find(":selected").text();
  if (uploadtype == "URL") {
    $("#uploadFile").hide();
    $("#uploadURL").show();
  } else {
    $("#uploadURL").hide();
    $("#uploadFile").show();
  }
  $("#uploadType").on("change", () => {
    let uploadtype = $("#uploadType").find(":selected").text();
    if (uploadtype == "URL") {
      $("#uploadFile").hide();
      $("#uploadURL").show();
    } else {
      $("#uploadURL").hide();
      $("#uploadFile").show();
    }
  });
});
