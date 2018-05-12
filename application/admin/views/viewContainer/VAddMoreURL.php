<?php
$id = $_REQUEST["id"];

?>
<section class="content-header">

    <h1>
        Home
        <small>Add New URL for Post</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New URL for Post</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="display"></div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New URL for POST</h3>
                </div>
                <div class="panel-body">
                    <legend>Add New URL for POST</legend>
                    <form action="#" id="myForm" onsubmit="return postData('<?php echo $obj->encdata("C_AddMoreLink"); ?>', '#display', '#myForm')" enctype="multipart/form-data" method="post">
                        <div class="col-lg-12" style="padding: 0; margin: 0;">

                           <div class="form-group">
                               <input type="hidden" name="post_id" id="post_id" value="<?php echo $id;?>" readonly="" required="">
                                    <div id="url">
                                        <div class="col-lg-12" style="padding: 0; margin: 0;">
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label>Original URL <span id="require"> * </span></label>
                                                    <input type="text" name="url_1" id="url_1" required="" placeholder="Enter Original URL" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Title <span id="require"> * </span></label>
                                                    <input type="text" name="titl_1" id="url_1" required="" placeholder="Enter URL Title" class="form-control" autocomplete="off">
                                                </div>
                                                 <div class="col-lg-4">
                                                    <label>File Size <span id="require"> * </span></label>
                                                    <input type="text" name="size_1" id="size_1" required="" placeholder="Enter Size" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <center> <a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addMore('<?php echo $obj->encdata("C_OpenLink2")."&v=".$obj->encdata("VMoreURL");?>','#url','#turl')"><i class="fa fa-modx fa-1x"></i> Add More</a>
                                   <input type="hidden" id="turl" name="turl" value="1"></center>
                                </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>
