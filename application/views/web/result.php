<style>
    .app-title {
        position: relative;
    }

    .ttl-btn {
        position: absolute;
        right: 18px;
        top: 5px;
        padding: 5px 36px;
        background-color: #79b6f7;
    }

    .sp-header-section {
        background-color: #e9ecef;
        padding: 10px;
    }

    .teacher-ttl {
        color: #444444;
        font-weight: 500;
        font-size: 17px;
    }

    .sp-primary {
        width: 100%;
    }

    .table-inner-section .table {
        font-size: 13px;
        font-weight: 400;
        font-family: "Roboto", sans-serif !important;
    }

    .table-inner-section .table th {
        font-weight: 600 !important;
        font-size: 13px;
        text-transform: capitalize;
    }

    .btn-text {
        width: 60%;
        margin-right: 10px;
        height: 30px;
        font-size: 13px;
        display: inline-block;
    }

    .btn-text-attmp {
        background-color: #ee2750;
        color: #fff;
        text-align: center;
    }

    .btn-text-pend {
        background-color: #a3d03f;
        color: #fff;
        text-align: left;
        padding-left: 7px;
    }

    .sp-box {
        width: 32%;
        height: 30px;
        font-size: 12px;
        display: inline-block;
        background-color: #ebebeb;
        color: #8a8a8a;
        text-align: center;
        line-height: 30px;
    }

    .bg-active {
        background-color: #ee2750 !important;
        border-color: #ee2750 !important;
        width: 100%;
        height: 30px;
        font-size: 13px;
        line-height: 17px;
        color: #fff !important;
    }

    .btn-text-pend i {
        float: right;
        margin-top: 8px;
        margin-right: 5px;
    }

    .mrk-status-fail {
        width: 45%;
        background-color: #ee2750;
        color: #fff;
        text-align: center;
    }

    .mrk-status-pass {
        width: 45%;
        background-color: #a3d03f;
        color: #fff;
        text-align: center;
    }

    .marks-numb {
        width: 40%;
        height: 30px;
        font-size: 13px;
        display: inline-block;
        background-color: #ebebeb;
        color: #8a8a8a;
        text-align: center;
    }

    .act-sp {
        width: 30px;
        height: 30px;
        display: inline-block;
        text-align: center;
        font-size: 15px;
        color: #fff;
    }

    .btn-chk {
        background-color: #898e94;
    }

    .btn-edit {
        background-color: #059bfa;
    }

    .btn-trash {
        background-color: #f92d4e;
    }

    .sp-card {
        box-shadow: 0 1px 15px 1px rgba(62, 57, 107, .07);
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #f5fbfb;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        color: #000;
        font-size: 16px;
    }

    .dataTables_wrapper {
        width: 100%;
    }

    #myModalLabel {
        text-align: left;
        width: 100%;
        Color: #fff;
        font-weight: 600 !important;
    }

    .gray-box {
        padding: 0.4rem 0.5rem;
        font-size: 0.765625rem;
        line-height: 1.5;
        border-radius: 3px;
        width: 20%;
        background-color: #ebebeb;
        color: #8a8a8a;
        text-align: center;
    }
</style>
<main class="app-content">
    <div class="app-title sp-header-section">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php $this->session->unset_userdata('success'); ?>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Danger!</strong><?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php $this->session->unset_userdata('error'); ?>
            <?php } ?>
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="teacher-ttl">Teacher Panel <br> Code: <strong><span style="color:#ff9900;"><?php echo $this->session->userdata('teacher_code'); ?></span></strong></h3>
                </div>
                <div class="col-lg-8">
                    <ul class="nav nav-tabs" role="tablist" style="border-bottom:none;">
                        <li class="nav-item w-100">
                            <div class="row justify-content-around">
                                <div class="col-lg-3 m-2">
                                    <select class="form-control w-100" name="teacher_panel_class" id="teacher_panel_class">
                                        <option>Select Class</option>
                                        <?php foreach ($classes as $class) : ?>
                                            <option value="<?= $class->classes ?>">
                                                <?= $class->classes ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-lg-3 m-2">
                                    <select class="form-control w-100" name="class_section_name" id="class_section_name">
                                        <option>Select Section</option>
                                    </select>
                                </div>

                                <div class="col-lg-3 m-2">
                                    <a href="web/test_assign" class="btn btn-primary w-100" />Back</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="table-inner-section py-3" id="stexamrecord">
        <div id="techr_tbl_sect" class="card mb-3 sp-card" style="display:none;">
            <div class="card-header"> Student Exam Records </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <table id="techr_tbl" class="table table-striped table-bordered teachsubmitmarks" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 4%;">Sr.No.</th>
                                <th style="width: 16%;">Name</th>
                                <th style="width: 10%;">Class</th>
                                <th style="width: 20%;">Objective Tests</th>
                                <th style="width: 15%">Objective Test Dates</th>
                                <th style="width: 20%;">Subjective Tests</th>
                                <th style="width: 15%;">Subjective Test Dates</th>
                                <!-- <th style="width:80px;">Action</th> -->
                                <!-- <th>Status</th> -->
                                <!-- <th>Print</th> -->
                            </tr>
                        </thead>
                        <tbody id="studentexamsub"> </tbody>
                    </table>
                </div>
                <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
            </div>
        </div>
    </div>
</main>
<script>
    // const delete_result = () => {
    //     let stu_id = $(this).attr("data-id");
    //     console.log($(this));

    // }
    $('body').on('click', '.btn-trash', function() {
        let stu_id = $(this).attr("data-id");
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete !",
        }).then(function(result) {
            if (result.value) {
                let stu_row = "#stu_" + stu_id;
                $(stu_row).remove();
                fetch("<?= base_url() . 'admin_master/delete_student_result/' ?>" + stu_id);
            }
        });
    });
</script>