
<section class="content-header">

    <h1>
        Home
        <small>Change Password</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
         <div id="display"></div>
        <div class="col-md-6 col-md-offset-3 ">
           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p>Change Password</p>

                </div>
                <div class="panel-body">
                    <form action="#" method="post" id="myForm" onsubmit="return postData('<?php echo $obj->encdata("C_ChangePassword"); ?>', '#displayAjax', '#myForm')" enctype="multipart/form-data">
                        <div class="form-group">
                             <legend>Change Admin Panel Password</legend>
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <input type="password"  name="old" id="old" class="form-control" required="" value="" autocomplete="off" placeholder="Old Password *">
                                </div>
                                 <div class="form-group">
                                    
                                    <input type="password"  name="pwd" id="pwd" class="form-control" required=""  autocomplete="off" placeholder="New Password *">
                                    
                                    <input type="hidden" name="byw" id="byw" value="<?php if(isset($_SESSION["login"])){echo $_SESSION["login"];}?>" >
                                    <input type="hidden" name="ip" id="ip" value="<?php echo $_SERVER["REMOTE_ADDR"];?>" >
                                </div>
                                <div class="form-group">
                                   
                                    <input type="password"  name="apwd"   id="apwd" class="form-control" required=""  autocomplete="off" placeholder="Confirm New Password *">
                                </div>
                               <div class="form-group" style="margin-top: 10px;"> 
                                    <input type="submit" class="btn btn-primary" value="Change Password">
                                </div>
                            </div>
                             
                            
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    </div>
</section>