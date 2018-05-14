
<section class="content-header">

    <h1>
        Home
        <small>Edit POST</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit POST</li>
    </ol>
</section>
<?php
$sql=$main->select("post",$_SESSION["db_1"]).$main->whereSingle(array("id"=>$_REQUEST["id"]));
$result=$main->adminDB[$_SESSION["db_1"]]->query($sql);
$row=$result->fetch_assoc();
?>
<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div id="display"></div>
            <div class="panel panel-primary">
                
               <?php $desc="".$row["description"];?>
                <div class="panel-body">
                    <legend>EDIT POST</legend>
                    <form action="#" method="post"  id="myForm" onsubmit="return postData('<?php echo $obj->encdata("C_UpdatePostData"); ?>', '#display', '#myForm')" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title </label>
                                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $row["id"];?>" readonly="">
                                    <input type="text"  name="title" id="title" class="form-control"  value="<?php echo $row["title"];?>" autocomplete="off" placeholder="Enter Category (ex. Hollywood) *">
                                </div>
                                <div class="form-group">
                                    <div class="box-header">
                                        <h3 class="box-title">Data <small>(Description Below ) </small></h3>
                                        <!-- tools box -->
                                    </div><!-- /.box-header -->
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <textarea class="form-control"> <?php echo $row["description"];?></textarea>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-lg-12 nopadding">
                                        <textarea name="txtEditor" id="txtEditor"><?php  echo $row["description"];?></textarea> 

                                    </div>
                                    <br>
                                </div>
                                <div class="form-group"><div class="col-lg-12"><br></div></div>
                                
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Select File </label>
                                        <input type="file" name="file" id="file" accept="image/*" >
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="path" id="path" value="<?php echo $row["path"];?>">
                                        <img src="<?php echo $row["img"];?>" alt="Image" style="width: 100px; height: auto;">
                                    </div>
                                    
                                </div>
                                 <div class="form-group"><div class="col-lg-12"><br></div></div> <div class="form-group"><div class="col-lg-12"><br></div></div>
                                <div class="form-group">
                                    <label>Category </label>
                                    <select id="category" name="category" class="form-control">
                                        <option value="<?php echo $row["category"];?>"><?php echo $row["category"];?></option>
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
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-upload fa-1x"></i>  Update Post Data </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    $("document").ready(function(){
       $("#txtEditor").html(<?php $desc;?>);
    });
    </script>