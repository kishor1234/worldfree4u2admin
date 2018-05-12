<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php
                    $sq=$main->selectCount("comment","id").$main->whereSingle(array("isActive"=>"0"));
                    
                    $result=$main->adminDB[$_SESSION["db_1"]]->query($sq);
                    $row=$result->fetch_assoc();
                    echo $row["count(id)"];
                    
                    ?>
                    </h3>

                    <p>New Comment</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VAllNewComments"); ?>"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <?php
                    $sq=$main->selectCount("comment","id").$main->whereSingle(array("isActive"=>"1"));
                    
                    $result=$main->adminDB[$_SESSION["db_1"]]->query($sq);
                    $row=$result->fetch_assoc();
                    echo $row["count(id)"];
                    
                    ?>
                    </h3>

                    <p>Approve Comments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VAllApprovComments"); ?>"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php
                    $sq=$main->selectCount("report","id").$main->whereSingle(array("isActive"=>"0"));
                    
                    $result=$main->adminDB[$_SESSION["db_1"]]->query($sq);
                    $row=$result->fetch_assoc();
                    echo $row["count(id)"];
                    
                    ?></h3>

                    <p>New Report's</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VAllReports"); ?>"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                    <?php
                    $sq=$main->selectSum("postcvc","view");//.$main->whereSingle(array("isActive"=>"1"));
                    $result=$main->adminDB[$_SESSION["db_1"]]->query($sq);
                    $row=$result->fetch_assoc();
                    echo $row["sum(view)"];
                    ?>
                    </h3>

                    <p>Total Download</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>