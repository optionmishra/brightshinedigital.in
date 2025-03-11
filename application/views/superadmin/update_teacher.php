<style>
    .series-select:disabled {
        appearance: none;
    }

    .series-select {
        border-bottom: none;
        border-radius: 5px 5px 0 0;
    }

    .series-classes-container-new {
        background-color: #FFFFFF;
        border: 2px solid #ced4da;
        border-top: none;
        border-radius: 0 0 5px 5px;
        color: #495057;
        font-size: 15px;
        min-height: 42px;
    }

    .series-classes-container {
        border: 2px solid #ced4da;
        border-top: none;
        border-radius: 0 0 5px 5px;
        color: #495057;
        background: #E9ECEF;
        font-size: 15px;
        min-height: 42px;
    }

    .hidden {
        display: none;
    }

    #1SeriesContainer {
        border-bottom: none;
        /* border-top: 2px solid #ced4da; */
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashboard') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <?php foreach ($info as $infor) : ?>
        <form id="update-teacher" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_webteacher') ?>">
            <div class="form-body">
                <div class="p-2 m-0 row">
                    <div class="p-2 col-lg-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control d-none" value="<?= $infor->id ?>" id="user_id" name="id">
                            <input type="text" class="form-control" value="<?= $infor->fullname ?>" id="getname" name="name" required="true">
                        </div>
                    </div>

                    <div class="p-2 col-lg-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" value="<?= $infor->mobile ?>" class="form-control" id="getmobile" name="mobile" required="true">
                        </div>
                    </div>
                    <div class="p-2 col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="<?= $infor->email ?>" id="getemail" name="email" required="true">
                        </div>
                    </div>
                    <div class="p-2 col-lg-6">
                        <div class="form-group">
                            <label for="pin">Pincode</label>
                            <input type="text" class="form-control" value="<?= $infor->pin ?>" id="getpin" name="pin" required="true">
                        </div>
                    </div>

                    <div class="p-2 col-lg-6">
                        <div class="form-group">
                            <label for="board">Board *</label>
                            <select class="form-control" name="board" id="boardget" required="true">
                                <option value="">Select</option>
                                <option value="<?= $board[0]->name ?>" <?= $infor->board_name == $board[0]->name ? 'selected' : ''; ?>><?= $board[0]->name ?></option>
                                <option value="<?= $board[1]->name ?>" <?= $infor->board_name == $board[1]->name ? 'selected' : ''; ?>><?= $board[1]->name ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="p-2 col-lg-6">
                        <div class="form-group">
                            <label for="studentLimit">Student Limit *</label>
                            <input type="number" class="form-control" value="<?= $infor->stu_limit ?>" name="stu_limit" required="true">
                        </div>
                    </div>

                    <?php /*<div class="p-2 col-lg-12">
                        <div class="form-group">
                            <label>Series *</label>
                            <div class="row" id="ser_section">

                                <p class="text-danger">Select board</p>
                            </div>
                        </div>
                    </div>


                    <div class="p-2 col-lg-2">
                        <span>Classes:</span>
                    </div>
                    <div class="p-2 col-lg-10">
                        <div class="row">
                            <?php
                            $permid_array = explode(',', $infor->classes);
                            foreach ($classes as $key => $class) :
                            ?>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input type="checkbox" <?= (in_array($class->id, $permid_array)) ? 'checked' : '' ?> class="form-control-custom" id="<?= $class->name ?>" name="class[]" value="<?= $class->id ?>">
                                        <label class="form-check-label" for="<?= $class->name ?>">
                                            <?= $class->name ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div> */ ?>
                </div>

                <div id="bookSelection"></div>
                <div class="modal-footer">
                    <button class="float-right btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button class="float-right btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</main>

<link rel="stylesheet" href="<?= base_url('assets/new-pages/css/style.css') ?>" />

<script src="<?= base_url('assets/new-pages/js/index.js') ?>" defer></script>