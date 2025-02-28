$(document).ready(function () {
  $("#batch-upload-step2").hide();
  $("#batch-upload-step3").hide();

  $("#batch_checkAlln").click(function () {
    $("input.north:checkbox").not(this).prop("checked", this.checked);
  });
  $("#batch_checkAlls").click(function () {
    $("input.south:checkbox").not(this).prop("checked", this.checked);
  });
  $("#batch_checkAlle").click(function () {
    $("input.east:checkbox").not(this).prop("checked", this.checked);
  });
  $("#batch_checkAllw").click(function () {
    $("input.west:checkbox").not(this).prop("checked", this.checked);
  });
});

$("#batch_support_msubject").change(function () {
  var board_id = $("#batch_support_msubject").val();
  $.ajax({
    url: base_url + "admin_master/get_subm",
    method: "post",
    data: {
      bid: board_id,
    },
    dataType: "json",
    success: function (response) {
      $("#batch_support_subject").find("option").not(":first").remove();
      $.each(response, function (index, data) {
        $("#batch_support_subject").append(
          '<option value="' + data["id"] + '">' + data["name"] + "</option>"
        );
      });
    },
  });
});

$(function () {
  var pbar = $("#batch-upload-progressBar"),
    currentProgress = 0;
  function trackUploadProgress(e) {
    if (e.lengthComputable) {
      currentProgress = (e.loaded / e.total) * 100; // Amount uploaded in percent
      $(pbar).width(currentProgress + "%");
      var tr = parseInt(currentProgress);
      $(pbar).html(tr + "%");
      //   if (currentProgress == 100) console.log("Progress : 100%");
    }
  }

  function uploadFile(url, formID, step) {
    var formdata = new FormData($(`.${formID}`)[0]);
    $.ajax({
      url: url,
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
            false
          );
        }
        return appXhr;
      },
      success: function (data) {
        toastr[data.type](data.message);
        $("#pleasewait").modal("hide");
        if (step === "step1") {
          $("#batch-upload-step1").hide();
          $("#batch-upload-step2").show();
          $("#downloadCSV").attr("href", data.data.csv_file_url);
          $("#upload_and_generate_csv").trigger("reset");
          $("#batch-upload-progressBar").removeClass("active");
          $(pbar).html("");
        }
        if (step === "step2") {
          $("#batch-upload-step2").hide();
          $("#batch-upload-step3").show();
          $("#upload_and_generate_preview").trigger("reset");
          $("#csv_preview").html(data.data.csv_data_in_html_rows);
        }
        if (step === "step3") {
          // setInterval(() => {
          // window.location.reload();
          $("#batch-upload").modal("hide");
          supportTable.ajax.url(base_url + "admin_master/support").load();
          $("#batch-upload-step1").show();
          $("#batch-upload-step2").hide();
          $("#batch-upload-step3").hide();
          // }, 2000);
        }
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

  $("#upload_and_generate_csv").submit(function (e) {
    e.preventDefault();
    $("#pleasewait").modal("show");
    $(pbar).width(0).addClass("active");
    uploadFile(
      "admin_master/upload_and_generate_csv",
      "upload_and_generate_csv",
      "step1"
    );
  });

  $("#upload_and_generate_preview").submit(function (e) {
    e.preventDefault();
    $("#pleasewait").modal("show");
    $(pbar).width(0).addClass("active");
    uploadFile(
      "admin_master/upload_and_generate_preview",
      "upload_and_generate_preview",
      "step2"
    );
  });

  $("#batch_support_upload_final_submit").submit(function (e) {
    e.preventDefault();
    $("#pleasewait").modal("show");
    // $(pbar).width(0).addClass("active");
    uploadFile(
      "admin_master/batch_support_upload_final_submit",
      "batch_support_upload_final_submit",
      "step3"
    );
  });
});
