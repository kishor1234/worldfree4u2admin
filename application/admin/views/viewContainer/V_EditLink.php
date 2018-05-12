<?php
$id = $_REQUEST["id"];

$sql = $main->select("url", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $id));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$row = $result->fetch_assoc();
?>
<section class="content-header">

    <h1>
        Home
        <small>Edit Link</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Link</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <div class="display"></div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit/Update Link</h3>
                </div>
                <div class="panel-body">
                    <legend>Edit/Update Link</legend>
                    <form action="#" id="myForm" onsubmit="return postData('<?php echo $obj->encdata("C_UpdateLinkData"); ?>', '#display', '#myForm')" enctype="multipart/form-data" method="post">
                        <div class="col-lg-12" style="padding: 0; margin: 0;">

                            <div class="form-group">
                                <label>Original URL <span id="require"> * </span></label>
                                <input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>" readonly required>
                                
                                <input type="text" name="url" id="url" value="<?php echo urldecode($row["url"]); ?>" required="" placeholder="Enter Original URL" class="form-control" autocomplete="off">
                                <a href="<?php echo urldecode($row["url"]); ?>" target="blank">View Link</a>
                            </div>
                            <div class="form-group">
                                <label>Title <span id="require"> * </span></label>
                                <input type="text" name="title" id="title" value="<?php echo $row["title"]; ?>" required="" placeholder="Enter URL Title" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>File Size <span id="require"> * </span></label>
                                <input type="text" name="size" id="size" value="<?php echo $row["size"]; ?>" required="" placeholder="Enter Size" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>
