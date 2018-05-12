
<section class="content-header">

    <h1>
        Home
        <small>All Reports</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Reports</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div id="display">
            <?php $main->isLoadView("V_AllRepotsTable", false, array()); ?>
            </div>
        </div>

    </div>
</section>