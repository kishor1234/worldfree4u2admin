
<section class="content-header">

    <h1>
        Home
        <small>New Category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
         
        <div class="col-md-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p>New Category</p>

                </div>
                <div class="panel-body">
                    <form action="#" method="post" id="myForm" onsubmit="return postData('<?php echo $obj->encdata("C_AddNewCategory"); ?>', '#display', '#myForm')" enctype="multipart/form-data">
                        <div class="form-group">
                            <legend>Category Name</legend>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category Name <span id="require">*</span></label>
                                    <input type="text"  name="category" id="category" class="form-control" required="" value="" autocomplete="off" placeholder="Enter Category (ex. Hollywood) *">
                                </div>
                                <div class="form-group">
                                <input type="hidden" name="byw" id="byw" value="<?php if (isset($_SESSION["login"])) {
    echo $_SESSION["login"];
} ?>" >
                                    <input type="hidden" name="ip" id="ip" value="<?php echo $_SERVER["REMOTE_ADDR"]; ?>" >
                                </div>
                                
                                <div class="form-group" style="margin-top: 10px;"> 
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-upload fa-1x"></i>  Add New</button>
                                </div>
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="panel panel-danger">
                <div class="panel-heading">
                    <p>All Category</p>

                </div>
                <div class="panel-body" id="display">
                    <?php $main->isLoadView('V_CategoryTable',false,array());?>
                </div>
            </div>
        </div>

    </div>
</section>