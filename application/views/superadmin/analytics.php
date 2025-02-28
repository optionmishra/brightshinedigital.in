<style>
    .active {
        color: unset;
    }

    .nav {
        gap: 1rem;
    }
</style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> <?= $page ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashboard') ?>"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><?= $page ?></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-12 p-4">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="btn px-3 nav-link active" id="first-tab" data-toggle="tab" data-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">Overview</button>
                </li>
                <?php foreach ($cat as $key => $ca) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="btn px-3 nav-link" id="cat<?= $key ?>-tab" data-toggle="tab" data-target="#cat<?= $key ?>" type="button" role="tab" aria-controls="cat<?= $key ?>" aria-selected="false"><?= $ca->name ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="first" role="tabpanel" aria-labelledby="first-tab" tabindex="0">

            <div class="row">
                <div class="col-lg-6 p-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Recently Uploaded Websupports (10)</strong>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row"> -->
                            <table class="table table-bordered w-100" id="recentUploadsTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Uploaded at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($recently_uploaded_websupport as $ws) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ws->title ?></td>
                                            <td><?= $ws->date ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Recently Downloaded Websupports</strong>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row"> -->
                            <table class="table table-bordered w-100" id="recentDownloadsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Downloaded By</th>
                                        <th>Downloaded at</th>
                                    </tr>
                                </thead>
                                <?php /*
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($recently_downloaded_websupport as $ws) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $ws->title ?></td>
                                                <td><?= "$ws->fullname ($ws->email)" ?></td>
                                                <td><?= $ws->downloaded_at ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                                                        <?php */ ?>

                            </table>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end first tab -->

        <?php foreach ($cat as $key => $cat) : ?>
            <div class="tab-pane" id="cat<?= $key ?>" role="tabpanel" aria-labelledby="cat<?= $key ?>-tab" tabindex="0">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong><?= $cat->name ?></strong><br>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered categoryTable w-100" id="cat_<?= $cat->id ?>" data-id="<?= $cat->id ?>">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Title</th>
                                            <th>Downloads</th>
                                        </tr>
                                    </thead>
                                    <?php /* $no = 1;
                                    <tbody>
                                        foreach ($category_wise_download_data[$cat->id] as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->class_name ?></td>
                                                <td><?= $row->subject_name ?></td>
                                                <td><?= $row->title ?></td>
                                                <td><?= $row->downloads ?></td>
                                            </tr>
                                        </tbody>
                                        <?php endforeach; */ ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('#recentDownloadsTable').DataTable({
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('analytics/getLists'); ?>",
                "type": "POST",
                "table": "websupport_downloads_tracking",
            },
            //Set column definition initialisation properties
            // "columnDefs": [{
            //     "targets": [0],
            //     "orderable": false
            // }],
        });

        $('#recentUploadsTable').DataTable();
        // $('.categoryTable').DataTable();
        // console.log($('.categoryTable')[0]);
        $('.categoryTable').each(function(index, element) {
            const categoryID = $(this).data("id");
            $(this).DataTable({
                // Processing indicator
                "processing": true,
                // DataTables server-side processing mode
                "serverSide": true,
                // Initial no order.
                "order": [],
                // Load data from an Ajax source
                "ajax": {
                    "url": '<?php echo base_url('analytics/getCategoryAnalytics'); ?>',
                    "type": "POST",
                    "data": {
                        categoryID
                    },
                },
            });
            // return false;
        });

    });
</script>
</script>