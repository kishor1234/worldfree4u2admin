
<section class="content-header">

    <h1>
        Home
        <small>POST</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">POST</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="display"></div>
            <div class="panel panel-primary">
               
                <div class="panel-body">
                    <legend>NEW POST</legend>
                    <form action="#" method="post" id="myForm" onsubmit="return postData('<?php echo $obj->encdata("C_PostData"); ?>', '#display', '#myForm')" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title <span id="require">*</span></label>
                                    <input type="text"  name="title" id="title" class="form-control" required="" value="" autocomplete="off" placeholder="Enter Category (ex. Hollywood) *">
                                </div>
                                <div class="form-group">
                                    <div class="box-header">
                                        <h3 class="box-title">Data <small>(Description Below ) <span id="require"> * </span></small></h3>
                                        <!-- tools box -->
                                    </div><!-- /.box-header -->
                                    <div class="col-lg-12 nopadding">
                                        <textarea name="txtEditor" id="txtEditor"></textarea> 

                                    </div>
                                    <br>
                                </div>
                                <div class="form-group"><div class="col-lg-12"></div></div>
                                <!--<div class="form-group">
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
                                    <a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addMore('<?php echo $obj->encdata("C_OpenLink2")."&v=".$obj->encdata("VMoreURL");?>','#url','#turl')"><i class="fa fa-modx fa-1x"></i> Add More</a>
                                    <input type="hidden" id="turl" name="turl" value="1">
                                </div>-->
                                <div class="form-group">
                                    <label>Select File <span id="require"> * </span></label>
                                    <input type="file" name="file" id="file" accept="image/*" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label>Category <span id="require"> * </span></label>
                                    <select id="category" name="category" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        $sql=$main->select("category",$_SESSION["db_1"]);
                                        
                                        $resutl=$main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while($row=$resutl->fetch_assoc())
                                        {
                                            echo "<option value='".$row["category"]."'>".$row["category"]."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-top: 10px;"> 
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-upload fa-1x"></i>  Post Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>