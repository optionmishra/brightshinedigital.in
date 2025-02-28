<style>
    .btn-no-of-questions:hover,
    .btn-no-of-questions:focus {
        box-shadow: none !important;
        transform: none !important;
    }

    .question-actions:not(:last-child) {
        margin-bottom: .5rem;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashclasses"></i> Test Questions</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashboard') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5>Upload Test Questions</h5>
                    </div>
                    <div>
                        <a href="assets/question_files/objective.csv" class="btn btn-sm btn-outline-primary mx-2" download>Download CSV for Objctive Paper Set</a>
                        <a href="assets/question_files/subjective.csv" class="btn btn-sm btn-outline-primary mx-2" download>Download CSV for Subjective Paper Set</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin_master/upload_questions') ?>" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" name="" id="queBoard" required>
                                    <option value="">Select Board</option>
                                    <?php foreach ($boards as $board) : ?>
                                        <option value="<?= $board->name ?>"><?= $board->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="msubject" id="queMsubject" required>
                                    <option value="">Select Main Subject</option>
                                    <?php /* foreach ($msubjects as $msubject) : ?>
                                        <option value="<?= $msubject->id ?>"><?= $msubject->name ?></option>
                                    <?php endforeach; */ ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="book" id="queBook" required>
                                    <option value="">Select Book</option>
                                    <?php /* foreach ($subjects as $subject) : ?>
                                        <option value="<?= $subject->class . "," . $subject->id ?>"><?= $subject->name ?></option>
                                    <?php endforeach; */ ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="set" id="queSet" required>
                                    <option value="">Select Set</option>
                                    <option value="11">Objective Test 1</option>
                                    <option value="12">Objective Test 2</option>
                                    <option value="13">Objective Test 3</option>
                                    <option value="14">Objective Test 4</option>
                                    <option value="21">Subjective Test 1</option>
                                    <option value="22">Subjective Test 2</option>
                                </select>
                                </select>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 my-4">
                                <textarea class="form-control" name="desc" id="desc" placeholder="Description"></textarea>
                            </div>
                            <div class="col-md-3 my-4">
                                <input class="form-control-file" type="file" name="questions_file" id="" accept=".csv" required='true'>
                            </div>
                            <div class="m-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Card 2 -->
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5>Test Questions</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 41%;">Book</th>
                                <th scope="col" style="width: 27%;" class="text-center">Objective Questions</th>
                                <th scope="col" style="width: 27%;" class="text-center">Subjective Questions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($book_questions as $key => $book) : ?>
                                <?php if ($book['objective_test_1'] || $book['objective_test_2'] || $book['objective_test_3'] || $book['objective_test_4'] || $book['subjective_test_1'] || $book['subjective_test_2']) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$serial ?></th>
                                        <td><?= $book['book_name'] ?></td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <?php if ($book['objective_test_1']) : ?>
                                                    <div class="question-actions">
                                                        <button class="btn btn-sm btn-success mr-1 px-3" title="Preview Questions" data-bookName="<?= $book['book_name'] ?>" data-bookId="<?= $key ?>" data-queSet="11" data-toggle="modal" data-target="#questionsViewModal">Objective Test 1</button>
                                                        <button class="btn btn-sm btn-no-of-questions bg-gray mx-1 px-3" title="Number of Questions"><?= $book['objective_test_1'] ?></button>
                                                        <button class="btn btn-sm btn-danger btn-trash ml-1" title="Delete Questions" data-bookId="<?= $key ?>" data-queSet="11"><i class="fa fa-trash" style="margin: 0;"></i></button>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($book['objective_test_2']) : ?>
                                                    <div class="question-actions">
                                                        <button class="btn btn-sm btn-success mr-1 px-3" title="Preview Questions" data-bookName="<?= $book['book_name'] ?>" data-bookId="<?= $key ?>" data-queSet="12" data-toggle="modal" data-target="#questionsViewModal">Objective Test 2</button>
                                                        <button class="btn btn-sm btn-no-of-questions bg-gray mx-1 px-3" title="Number of Questions"><?= $book['objective_test_2'] ?></button>
                                                        <button class="btn btn-sm btn-danger btn-trash ml-1" title="Delete Questions" data-bookId="<?= $key ?>" data-queSet="12"><i class="fa fa-trash" style="margin: 0;"></i></button>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($book['objective_test_3']) : ?>
                                                    <div class="question-actions">
                                                        <button class="btn btn-sm btn-success mr-1 px-3" title="Preview Questions" data-bookName="<?= $book['book_name'] ?>" data-bookId="<?= $key ?>" data-queSet="13" data-toggle="modal" data-target="#questionsViewModal">Objective Test 3</button>
                                                        <button class="btn btn-sm btn-no-of-questions bg-gray mx-1 px-3" title="Number of Questions"><?= $book['objective_test_3'] ?></button>
                                                        <button class="btn btn-sm btn-danger btn-trash ml-1" title="Delete Questions" data-bookId="<?= $key ?>" data-queSet="13"><i class="fa fa-trash" style="margin: 0;"></i></button>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($book['objective_test_4']) : ?>
                                                    <div class="question-actions">
                                                        <button class="btn btn-sm btn-success mr-1 px-3" title="Preview Questions" data-bookName="<?= $book['book_name'] ?>" data-bookId="<?= $key ?>" data-queSet="14" data-toggle="modal" data-target="#questionsViewModal">Objective Test 4</button>
                                                        <button class="btn btn-sm btn-no-of-questions bg-gray mx-1 px-3" title="Number of Questions"><?= $book['objective_test_4'] ?></button>
                                                        <button class="btn btn-sm btn-danger btn-trash ml-1" title="Delete Questions" data-bookId="<?= $key ?>" data-queSet="14"><i class="fa fa-trash" style="margin: 0;"></i></button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($book['subjective_test_1']) : ?>
                                                <div class="question-actions">
                                                    <button class="btn btn-sm btn-success mr-1 px-3" title="Preview Questions" data-bookName="<?= $book['book_name'] ?>" data-bookId="<?= $key ?>" data-queSet="21" data-toggle="modal" data-target="#questionsViewModal">Subjective Test 1</button>
                                                    <button class="btn btn-sm btn-no-of-questions bg-gray mx-1 px-3" title="Number of Questions"><?= $book['subjective_test_1'] ?></button>
                                                    <button class="btn btn-sm btn-danger btn-trash ml-1" title="Delete Questions" data-bookId="<?= $key ?>" data-queSet="21"><i class="fa fa-trash" style="margin: 0;"></i></button>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($book['subjective_test_2']) : ?>
                                                <div class="question-actions">
                                                    <button class="btn btn-sm btn-success mr-1 px-3" title="Preview Questions" data-bookName="<?= $book['book_name'] ?>" data-bookId="<?= $key ?>" data-queSet="22" data-toggle="modal" data-target="#questionsViewModal">Subjective Test 2</button>
                                                    <button class="btn btn-sm btn-no-of-questions bg-gray mx-1 px-3" title="Number of Questions"><?= $book['subjective_test_2'] ?></button>
                                                    <button class="btn btn-sm btn-danger btn-trash ml-1" title="Delete Questions" data-bookId="<?= $key ?>" data-queSet="22"><i class="fa fa-trash" style="margin: 0;"></i></button>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php /* else : ?>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No Data Available</td>
                                    </tr>
                                    <?php break; */ ?>
                                <?php endif;  ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Questions View Modal -->
<div class="modal fade" id="questionsViewModal" tabindex="-1" role="dialog" aria-labelledby="questionsViewModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questionsViewModalTitle">Preview Questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="px-3">
                    <p>Question</p>
                    <ol type="A">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ol>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // show messages in toast
        <?php if ($this->session->userdata('success')) : ?>
            toastr.success("<?= $this->session->userdata('success') ?>")
            <?php $this->session->unset_userdata('success'); ?>
        <?php elseif ($this->session->userdata('error')) : ?>
            toastr.error("<?= $this->session->userdata('error') ?>")
            <?php $this->session->unset_userdata('error'); ?>
        <?php endif; ?>

        // Test Questions upload form selections
        $("#queBoard").on("change", () => {
            const board = $("#queBoard").find(":selected").val();
            $('#queMsubject').html('<option value="">Select Main Subject</option>');
            $('#queBook').html('<option value="">Select Book</option>');
            fetch("<?= base_url() . 'admin_master/get_main_subjects/' ?>" + board).then(res => res.json()).then(data => {
                data.forEach(item => {
                    $('#queMsubject').append(`<option value="${item.id}">${item.name}</option>`);
                });
            })
        });
        $('#queMsubject').on('change', () => {
            const msubject = $('#queMsubject').find(':selected').val();
            $('#queBook').html('<option value="">Select Book</option>');
            fetch("<?= base_url() . 'admin_master/get_books/' ?>" + msubject).then(res => res.json()).then(data => {
                data.forEach(item => {
                    $('#queBook').append(`<option value="${item.class},${item.id}">${item.name}</option>`);
                });
            })
        })

        // Preview Questions
        // $('.preview_questions').on('click', () => {
        $('#questionsViewModal').on('show.bs.modal', (e) => {
            // $("#pleasewait").modal("show");
            const book_name = $(e.relatedTarget).attr('data-bookName');
            const book_id = $(e.relatedTarget).attr('data-bookID');
            const queSet = $(e.relatedTarget).attr("data-queSet");
            const setName = $(e.relatedTarget).text();
            const modal = $(this);
            // console.log(setName);
            modal.find('.modal-title').text(book_name + ' > ' + setName);
            modal.find('.modal-body').html('');
            // $('#questionsViewModalTitle').text(setName);
            fetch("<?= base_url() . 'admin_master/preview_uploaded_questions/' ?>" + book_id + '/' + queSet)
                .then(res => res.json())
                .then(data => {
                    data.forEach((item, index) => {
                        if (item.question_type > 10 && item.question_type < 20) {
                            modal.find('.modal-body').append(`<div class="px-3"> <p> Question ${++index}.  ${item.name} </p> <ol type="A" style="margin-left:3rem;">
                            <li> ${item.option_a}</li><li> ${item.option_b}</li><li> ${item.option_c}</li><li> ${item.option_d}</li></ol><p>Correct Answer: ${item.answer}</p></div>`)
                        } else if (item.question_type > 20 && item.question_type < 30) {
                            modal.find('.modal-body').append(`<div class="px-3"> <p> Question ${++index}.  ${item.name} </p>`)
                        }
                    })
                });
            // $("#pleasewait").modal("hide");
            // $("#questionsViewModal").modal("hide");
        })


        // Delete confirmation dialoge for questions set deletion
        $('.btn-trash').on('click', function() {
            let bookId = $(this).attr("data-bookId");
            let queSet = $(this).attr("data-queSet");
            const clickedBtn = $(this);
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
                    fetch("<?= base_url() . 'admin_master/delete_questions_set/' ?>" + bookId + '/' + queSet)
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                const noOfSets = $(clickedBtn).parent().parent().children().length;
                                if (noOfSets == 1) {
                                    $(clickedBtn).closest('tr').remove();
                                } else {
                                    $(clickedBtn).parent().remove();
                                }
                                toastr.success(data.success);
                            } else {
                                toastr.error(data.error);
                            }
                        });
                }
            });
        });
    });
</script>