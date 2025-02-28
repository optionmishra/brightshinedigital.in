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
                <div class="row m-0 p-2">
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control d-none" value="<?= $infor->id ?>" id="user_id" name="id">
                            <input type="text" class="form-control" value="<?= $infor->fullname ?>" id="getname" name="name" required="true">
                        </div>
                    </div>

                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" value="<?= $infor->mobile ?>" class="form-control" id="getmobile" name="mobile" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="<?= $infor->email ?>" id="getemail" name="email" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label for="pin">Pincode</label>
                            <input type="text" class="form-control" value="<?= $infor->pin ?>" id="getpin" name="pin" required="true">
                        </div>
                    </div>

                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label for="board">Board *</label>
                            <select class="form-control" name="board" id="boardget" required="true">
                                <option value="">Select</option>
                                <option value="<?= $board[0]->name ?>" <?= $infor->board_name == $board[0]->name ? 'selected' : ''; ?>><?= $board[0]->name ?></option>
                                <option value="<?= $board[1]->name ?>" <?= $infor->board_name == $board[1]->name ? 'selected' : ''; ?>><?= $board[1]->name ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label for="studentLimit">Student Limit *</label>
                            <input type="number" class="form-control" value="<?= $infor->stu_limit ?>" name="stu_limit" required="true">
                        </div>
                    </div>

                    <?php /*<div class="col-lg-12 p-2">
                        <div class="form-group">
                            <label>Series *</label>
                            <div class="row" id="ser_section">

                                <p class="text-danger">Select board</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 p-2">
                        <span>Classes:</span>
                    </div>
                    <div class="col-lg-10 p-2">
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

                <div id="seriesClassesContainer" class="row m-0 p-2">
                    <div class="col-lg-12 p-2">
                        <select class="form-control series-select" id="series">
                            <option value="" disabled selected>+ Add more series</option>
                            <?php foreach ($all_series_of_selected_board as $series) : ?>
                                <!-- show not selected options only -->
                                <?php # if (!in_array($series->id, $teacher_series_arr)) : 
                                ?>
                                <option value="<?= $series->id ?>"><?= $series->name ?></option>
                                <?php # endif; 
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php /* foreach ($teacher_series_details as $teacher_series) : ?>
                        <div class="col-lg-6 p-2">
                            <input type="hidden" name="series[]" value="<?= $teacher_series->id ?>">
                            <select class="form-control series-select" disabled>
                                <option value="<?= $teacher_series->id ?>" disabled selected><?= $teacher_series->name ?></option>
                            </select>
                            <select class="form-control series-select" name="<?= $teacher_series->id ?>series" id="">
                                <option value="" disabled selected>Select Series</option>
                                <?php foreach ($subject_series_s[$teacher_series->id] as $key => $series) : ?>
                                    <?php if (isset($subject_series) && ($subject_series[$teacher_series->id] == $key)) : ?>
                                        <option value="<?= $key ?>" selected><?= $series ?></option>
                                    <?php else : ?>
                                        <option value="<?= $key ?>"><?= $series ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <div class="row m-0 series-classes-container pb-2">
                                <?php foreach ($series_with_all_classes[$teacher_series->id] as $class) : ?>
                                    <span class="col-md-3">
                                        <input class="m-1" type="checkbox" name="<?= $teacher_series->id ?>Classes[]" value="<?= $class->id ?>" <?php if ($series_classes[$teacher_series->id]) : ?> <?= (in_array($class->id, $series_classes[$teacher_series->id])) ?  'checked' : '' ?> <?php else : ?> <?= in_array($class->id, $teacher_classes) ? 'checked' : '' ?> <?php endif; ?>>
                                        <label class="m-1"><?= $class->name ?></label>
                                    </span>
                                <?php endforeach; ?>
                                <div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-danger px-3 removeSeries" data-seriesValue="${seriesValue}" data-seriesName="${seriesName}" data-clasesName="${seriesValue}Classes[]">Remove</span></div>
                            </div>
                        </div>
                    <?php endforeach; */ ?>
                    <?php foreach ($series_classes as $key => $sub_id) : ?>
                        <?php foreach ($series_classes[$key] as $key2 => $series_id) : ?>
                            <div class="col-lg-6 p-2">
                                <input type="hidden" name="series[]" value="<?= $key ?>">
                                <select class="form-control series-select" disabled>
                                    <option value="<?= $key ?>" disabled selected><?= $main_subjects_arr[$key] ?></option>
                                </select>
                                <input type="hidden" name="<?= $key ?>series[]" value="<?= $key2 ?>">
                                <select class="form-control series-select" id="" disabled>
                                    <option value="<?= $key2 ?>" selected><?= $series_arr[$key2] ?></option>
                                </select>
                                <div class="row m-0 series-classes-container pb-2">
                                    <?php foreach ($series_with_all_classes[$key] as $class) : ?>
                                        <span class="col-md-3">
                                            <input class="m-1" type="checkbox" name="<?= $key2 ?>Classes[]" value="<?= $class->id ?>" <?php if ($series_classes[$key]) : ?> <?= (in_array($class->id, $series_classes[$key][$key2])) ?  'checked' : '' ?> <?php else : ?> <?= in_array($class->id, $teacher_classes) ? 'checked' : '' ?> <?php endif; ?>>
                                            <label class="m-1"><?= $class->name ?></label>
                                        </span>
                                    <?php endforeach; ?>
                                    <div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-danger px-3 removeSeries" data-seriesValue="${seriesValue}" data-seriesName="${seriesName}" data-clasesName="${seriesValue}Classes[]">Remove</span></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</main>

<script>
    $('#board').on('change', function(e) {
        $('#seriesClassesContainer').html(`<div class="col-lg-12 p-2"><select class="form-control series-select" id="series"><option value="" disabled selected>+ Add more series</option></select></div>`);
        // $('#series').html('<option value="" disabled selected>Select Series</option>');
        var valueSelected = this.value;
        const url = '<?= base_url(); ?>' + 'admin_master/get_series_mod/' + valueSelected;
        fetch(url).then(res => res.json()).then(data => {
            // seriesOfSelectedBoard = data;
            // seriesCount = data.length;
            // console.log(seriesCount);
            data.forEach((item, index, arr) => {
                let options = `<option value="${item.id}">${item.name}</option>`;
                $('#series').append(options);
            });
        });
        checkedClasses = [];
    });

    // Subject's Series on selection of Subject
    $('#seriesClassesContainer').on('change', 'div select:first', function(e) {
        var valueSelected = this.value;
        var seriesContainerID = valueSelected + 'SeriesContainer';
        classesContainerID = valueSelected + 'ClassesContainer';
        $(this).next().next('div').remove();
        $(this).next('div').remove();
        $(this).parent().append(`<div class="row m-0 justify-content-center" id="${seriesContainerID}">Loading Series...</div>`);
        $(this).parent().append(`<div class="hidden row m-0 series-classes-container pb-2 justify-content-center" id="${classesContainerID}">Loading Classes...</div>`);
        const url = '<?= base_url(); ?>' + 'admin_master/get_subject_series/' + valueSelected;
        fetch(url).then(res => res.json()).then(data => {
            let subjectSeriesSelect = '<select id="subjectSeriesSelect" class="form-control series-select"><option value="" disabled Selected>Select Series</option>';
            data.forEach((item, index, arr) => {
                // if (!subjectSeriesSelectArr.includes(item.id))
                subjectSeriesSelect += `<option value="${item.id}">${item.name}</option>`;
            });
            subjectSeriesSelect += '</select>';
            $('#' + seriesContainerID).html(subjectSeriesSelect);
        });

        const url2 = '<?= base_url(); ?>' + 'admin_master/get_series_classes/' + valueSelected;
        fetch(url2).then(res => res.json()).then(data => {
            let classesCheckBox = '';
            currClasses = data;
            data.forEach((item, index, arr) => {
                classesCheckBox += `<span class="col-md-3"><input class="m-1 ${valueSelected}classes" type="checkbox" id="${valueSelected+item.id}" value="${item.id}"><label for="${valueSelected+item.id}" class="m-1">${item.name}</label></span>`;
            });
            classesCheckBox += '<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-dark px-3" id="addSeries">Add</span></div>';
            $('#' + classesContainerID).html(classesCheckBox);
        });
    });

    $('#seriesClassesContainer').on('change', 'div #subjectSeriesSelect', function(e) {
        $('#' + classesContainerID).removeClass('hidden');
    });
    <?php /*
    // Classes on selection of Series
    $('#seriesClassesContainer').on('change', 'div select:first', function(e) {
        var valueSelected = this.value;
        var classesContainerID = valueSelected + 'ClassesContainer';
        $(this).next('div').remove();
        $(this).parent().append(`<div class="row m-0 pb-2 series-classes-container-new justify-content-center" id="${classesContainerID}">Loading Classes...</div>`);
        const url = '<?= base_url(); ?>' + 'admin_master/get_series_classes/' + valueSelected;
        fetch(url).then(res => res.json()).then(data => {
            let classesCheckBox = '';
            data.forEach((item, index, arr) => {
                // if (!checkedClasses.includes(item.class)) {
                classesCheckBox += `<span class="col-md-2"><input class="m-1 ${valueSelected}classes" type="checkbox" id="${valueSelected+item.id}" value="${item.id}"><label for="${valueSelected+item.id}" class="m-1">${item.name}</label></span>`;
                // }
            });
            classesCheckBox += '<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-dark px-3" id="addSeries">Add</span></div>';
            $('#' + classesContainerID).html(classesCheckBox);
            // console.log($('#' + classesContainerID + ' span').length);
            if ($('#' + classesContainerID + ' span').length == 1) {
                $('#' + classesContainerID).html('<p class="text-danger text-center">You have already selected available classes with other series, please remove your current selection and reload the page if you want to select this title.</p>');
            };
            // $('#addSeries').off('click');
        });
    });
    $('#seriesClassesContainer').on('click', 'div #addSeries', () => {
        // $('#addSeries').on('click', () => { #will not work because it is a dynamic element
        let seriesValue = $('#series').val();
        let seriesName = $('#series').find(':selected').text();
        // $(this).parent().parent().children('')
        // let isClassChecked = Boolean($(this).parent().parent().children().children().children("input:checkbox:checked").length);
        let isClassChecked = Boolean($(`.${seriesValue}classes:checked`).length);

        // console.log(isClassChecked);
        // console.log($(`input[name='${seriesValue}Classes[]']:checked`));
        if (!isClassChecked) return;
        let allSeriesClasses = $(`.${seriesValue}classes`).map(function() {
            return $(this).val();
        }).get();
        let currCheckedClasses = $(`.${seriesValue}classes:checked`).map(function() {
            return $(this).val();
        }).get();
        let seriesClassesElement = `<div class="col-lg-6 p-2"><input type="hidden" name="series[]" value="${seriesValue}"><select class="form-control series-select" name="series[]" required="true" disabled><option value="${seriesValue}" selected>${seriesName}</option></select><div class="row m-0 series-classes-container pb-2">`;
        allSeriesClasses.forEach(currClass => {
            seriesClassesElement += `<span class="col-md-3"><input class="m-1" type="checkbox" name="${seriesValue}Classes[]" value="${currClass}" ${currCheckedClasses.includes(currClass) ? 'checked':''}><label class="m-1">Class ${currClass}</label></span>`;
        })
        seriesClassesElement += `<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-danger px-3 removeSeries" data-seriesValue="${seriesValue}" data-seriesName="${seriesName}" data-clasesName="${seriesValue}Classes[]">Remove</span></div></div></div>`;
        $('#seriesClassesContainer').append(seriesClassesElement);
        $('#series').find(':selected').remove(); // remove selected option from select
        $('#series').prop('selectedIndex', 0); // reset select input
        $(`#${seriesValue}ClassesContainer`).remove(); // remove class container
        // remove checked checkboxes
        // $(`.${seriesValue}classes:checked`).parent().remove();
    }); <?php */ ?>

    $('#seriesClassesContainer').on('click', 'div #addSeries', () => {
        // $('#addSeries').on('click', () => { #will not work because it is a dynamic element
        let seriesValue = $('#series').val();
        let seriesName = $('#series').find(':selected').text();
        let subjectSeriesValue = $('#subjectSeriesSelect').val();
        let subjectSeriesName = $('#subjectSeriesSelect').find(':selected').text();
        // subjectSeriesSelectArr.push(subjectSeriesValue);
        // $(this).parent().parent().children('')
        // let isClassChecked = Boolean($(this).parent().parent().children().children().children("input:checkbox:checked").length);
        let isClassChecked = Boolean($(`.${seriesValue}classes:checked`).length);

        // console.log(isClassChecked);
        // console.log($(`input[name='${seriesValue}Classes[]']:checked`));
        if (!isClassChecked) return;
        let currCheckedClasses = $(`.${seriesValue}classes:checked`).map(function() {
            return $(this).val();
        }).get();

        let allSeriesClasses = $(`.${seriesValue}classes`).map(function() {
            return $(this).val();
        }).get();

        let seriesClassesElement = `<div class="col-lg-6 p-2">
			<input type="hidden" name="series[]" value="${seriesValue}"><select class="form-control series-select" required="true" disabled><option value="${seriesValue}" selected>${seriesName}</option></select>
			<input type="hidden" name="${seriesValue}series[]" value="${subjectSeriesValue}"><select class="form-control series-select" required="true" disabled><option value="${subjectSeriesValue}" selected>${subjectSeriesName}</option></select>
			<div class="row m-0 series-classes-container pb-2">`;
        // currCheckedClasses.forEach(currClass => {
        // currClasses.forEach(currClass => {
        //     if (currCheckedClasses.includes(currClass.id)) {
        //         seriesClassesElement += `<span class="col-md-2"><input type="hidden" name="${subjectSeriesValue}Classes[]" value="${currClass.id}"><input class="m-1" type="checkbox" name="${seriesValue}Classes[]" value="${currClass.id}" ="" checked><label class="m-1">${currClass.name}</label></span>`;
        //     }
        // })
        allSeriesClasses.forEach(currClass => {
            seriesClassesElement += `<span class="col-md-3"><input class="m-1" type="checkbox" name="${subjectSeriesValue}Classes[]" value="${currClass}" ${currCheckedClasses.includes(currClass) ? 'checked':''}><label class="m-1">Class ${currClass}</label></span>`;
        })
        seriesClassesElement += `<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-danger px-3 removeSeries" data-seriesValue="${seriesValue}" data-seriesName="${seriesName}" data-clasesName="${seriesValue}Classes[]">Remove</span></div></div></div>`;
        $('#seriesClassesContainer').append(seriesClassesElement);
        // $('#series').find(':selected').remove(); // remove selected option from select
        $('#series').prop('selectedIndex', 0); // reset select input
        $(`#${seriesValue}SeriesContainer`).remove(); // remove subject series container
        $(`#${seriesValue}ClassesContainer`).remove(); // remove class container
        // remove checked checkboxes
        // $(`.${seriesValue}classes:checked`).parent().remove();
    });

    $('#seriesClassesContainer').on('click', '.removeSeries', function(e) {
        // let nameOfSeriesClasses = $(this).attr('data-clasesName');
        let seriesValue = $(this).attr('data-seriesValue');
        let seriesName = $(this).attr('data-seriesName');
        // console.log(nameOfSeriesClasses);
        // let currCheckedClasses = $(`input[name="${nameOfSeriesClasses}"]:checked`).map(function() {
        //     return $(this).val();
        // }).get();
        // console.log(checkedClasses);
        // console.log(currCheckedClasses);
        // console.log(checkedClasses.filter(n => !currCheckedClasses.includes(n)));

        // make series selectable again
        $('#series').append(`<option value="${seriesValue}">${seriesName}</option>`);
        // remove classes from checkedClasses array
        // checkedClasses = checkedClasses.filter(n => !currCheckedClasses.includes(n));
        // remove the element from DOM
        $(this).parent().parent().parent().remove();
    });
</script>