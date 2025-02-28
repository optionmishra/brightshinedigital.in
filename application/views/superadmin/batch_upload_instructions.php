<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Batch Websupport Upload Instructions</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/img/favicon.ico" />
  <link rel="icon" type="image/png" ref="assets/img/favicon.png">
  <base href="<?= base_url() ?>">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <style>
    /* Add some basic styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #009688;
    }

    .container {
      max-width: 800px;
      margin: 30px auto;
      padding: 30px;
      background-color: white;
      border-radius: 1rem;
      box-shadow: 10px 15px 15px #00756c;
    }

    h1 {
      text-align: center;
    }

    h1 {
      font-size: 36px;
      margin-bottom: 30px;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    ol {
      margin-left: 1rem;
    }

    li {
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      margin-bottom: 20px;
      line-height: 1.2;
    }

    .text-red {
      color: red;
    }

    .table-btns-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Batch Websupport Upload Instructions</h1>
    <p>
      This document outlines the steps for uploading multiple Websupports in a single process using the new "batch Websupport upload" feature. This feature allows the user to upload multiple Websupports in three simple steps, saving time and effort compared to uploading them individually.
    </p>

    <h2>Step 1: Fill out the form and upload files</h2>
    <ol>
      <li>On the "batch Websupport upload" popup, fill out the form.</li>
      <li>Upload two zip files: one for the Websupport files and one for the icon files.<br /> <span class="text-red">(Directly zip files without nesting it into folders)</span></li>
      <li>After uploading the files, a CSV file will be generated with the values you entered in the form.</li>
    </ol>

    <h2>Step 2: Modify the CSV file and upload it back</h2>
    <ol>
      <li>Download the generated CSV file.</li>
      <li>Modify the file according to your needs.</li>
      <li>Upload the modified CSV file back.</li>
    </ol>

    <h2>Step 3: Preview and submit the uploads</h2>
    <ol>
      <li>On the "batch Websupport upload" popup, you will see a table preview of your uploads.</li>
      <li>Verify the information.</li>
      <li>Finally, submit the uploads by clicking the "Final Submit" button.</li>
    </ol>

    <h3>Conclusion:</h3>
    <p>
      With the new "batch Websupport upload" feature, you can save time and effort by uploading multiple Websupports in a single process. Simply fill out the form, upload the necessary files, modify the CSV file, preview the uploads, and finally submit them.
    </p>

    <h1>Tables to Help with IDs</h1>
    <div class="table-btns-container">
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#boards">Boards</button>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#publications">Publications</button>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#subjects">Subjects</button>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#books">Books</button>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#classes">Classes</button>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#support_categories">Support Categories</button>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#states">States</button>
    </div>
  </div>

  <!-- boards -->
  <div class="modal fade" id="boards" tabindex="-1" role="dialog" aria-labelledby="boards" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">Boards</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($boards as $key => $board) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $board->id ?></td>
                  <td><?= $board->name ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- publications -->
  <div class="modal fade" id="publications" tabindex="-1" role="dialog" aria-labelledby="publications" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">Publications</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($publications as $key => $publication) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $publication->id ?></td>
                  <td><?= $publication->name ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- subjects -->
  <div class="modal fade" id="subjects" tabindex="-1" role="dialog" aria-labelledby="subjects" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">Subjects</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($subjects as $key => $subject) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $subject->id ?></td>
                  <td><?= $subject->name ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- books -->
  <div class="modal fade" id="books" tabindex="-1" role="dialog" aria-labelledby="books" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">Books</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($books as $key => $book) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $book->id ?></td>
                  <td><?= $book->name ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- classes -->
  <div class="modal fade" id="classes" tabindex="-1" role="dialog" aria-labelledby="classes" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">Classes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($classes as $key => $classe) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $classe->id ?></td>
                  <td><?= $classe->name ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- support_categories -->
  <div class="modal fade" id="support_categories" tabindex="-1" role="dialog" aria-labelledby="support_categories" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">Support Categories</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($support_categories as $key => $support_category) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $support_category->id ?></td>
                  <td><?= $support_category->name ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- states -->
  <div class="modal fade" id="states" tabindex="-1" role="dialog" aria-labelledby="states" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allowance-deduction">States</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-lg-12 p-2">
          <table class="table w-100 table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($states as $key => $state) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $state->StateID ?></td>
                  <td><?= $state->StateName ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="modal-footer col-lg-12">
            <button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>