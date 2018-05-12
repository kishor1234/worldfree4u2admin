
<section class="content-header">

    <h1>
        Home
        <small>View Single Comment</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Single Comment</li>
    </ol>
</section>
<?php
$sql = $main->select("comment", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $_REQUEST["id"]));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
if ($row = $result->fetch_assoc()) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <div id="display"></div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <legend>Comment Detail</legend>
                        <div class="form-group">
                            <div  class="col-lg-12">
                                <label>Name </label>
                                <input type="text" readonly="" class="form-control" value="<?php echo $row["name"]; ?>">
                            </div>
                            <div  class="col-lg-12">
                                <label>Email</label>
                                <input type="text" readonly="" class="form-control" value="<?php echo $row["email"]; ?>">
                            </div>

                            <div  class="col-lg-12">
                                <label>IP</label>
                                <input type="text" readonly="" class="form-control" value="<?php echo $row["ip"]; ?>">
                            </div>

                            <div  class="col-lg-12">
                                <label>Date</label>
                                <input type="text" readonly="" class="form-control" value="<?php echo $row["isDate"]; ?>">
                            </div>
                            <div  class="col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" readonly="">
                                    <?php echo $row["message"]; ?>
                                </textarea>

                            </div>
                        </div>

                        <div  class="col-lg-12">
                            <a href="#" onclick="postURL('<?php echo $obj->encdata("C_ApproveComment"); ?>', '#display', '<?php echo $row["id"]; ?>')" class="btn btn-danger">Approve Comment</a>
                            <a href="#" onclick="postURL('<?php echo $obj->encdata("C_DeleteComment"); ?>', '#display', '<?php echo $row["id"]; ?>')" class="btn btn-danger">Delete Comment</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    </div>
    </section>
    <?php
} else {
    echo $main->printMessage("No Data Found...!", "danger");
}
?>