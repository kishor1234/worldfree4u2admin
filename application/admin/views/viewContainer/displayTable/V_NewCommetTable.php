<?php
$limit = 25;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("comment", "id").$main->whereSingle(array("isActive"=>"0"));
$result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
$r = $result->fetch_assoc();
$max_count = $r["count(id)"];

$page = 1;
$offset = 0;

if (isset($_REQUEST["pg"])) {
    $page = $_REQUEST["pg"];
    $tempLimit = $limit;
    $tempLimit = $limit * $page;
    $offset = $tempLimit - $limit;
} else {
    $limit = $limit * $page;
    $offset = 0;
}
$i = 0;
$sql = $main->update(array("rd" => "1"), "notification") ;//. $this->whereSingle(array("tid" => $_REQUEST["id"]));
$main->adminDB[$_SESSION["db_1"]]->query(($sql));
?>
<div class="panel panel-danger">
    <div class="panel-body">
        <div class="form-group">
            <div class="col-lg-6">
                <h6>Select <span>

                        <select id="limit" name="limit" onchange="return postURL3('<?php echo $obj->encdata("C_OpenLink2") . "&v=" . $obj->encdata("V_NewCommetTable") . "&pg=" . $page; ?>', '#display', '1');">
                            <option value="<?php echo $limit; ?>"><?php echo $limit; ?></option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </span>
                </h6>
            </div>
            
        </div>

        <div class="form-group" id='adp'>
            <div class="col-lg-12">
                <table class="table table-hover table-responsive table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>IP</th>
                        <th>IsDate</th>
                        <th>Action</th>
                        
                        
                    </tr>
                    <?php
                    $sql = $main->select("comment", $_SESSION["db_1"]).$main->whereSingle(array("isActive"=>"0")).$main->orderBy("DESC","id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>

                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                           
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["ip"]; ?></td>
                            <td><?php echo $row["isDate"]; ?></td>
                            <td>
                                <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewSingleCommentForApprove") . "&id=" . $row["id"]; ?>" onclick=" return postURL2('<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewSingleCommentForApprove") . "&id=" . $row["id"]; ?>', '#main', '<?php echo $row["id"];?>')" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="#" onclick=" return postURL('<?php echo $obj->encdata("C_DeleteSComment") . "&v=" . $obj->encdata("VAllNewComments"); ?>', '#display', '<?php echo $row["id"]; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
    <?php
}
?>
                   <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>IP</th>
                        <th>IsDate</th>
                        <th>Action</th>
                        
                        
                    </tr>
                </table>
            </div>

        </div>
        <div class="form-group">
            <div class="col-lg-6">
<?php
$ct = ($limit + $offset);
if ($ct > $max_count) {
    $ct = $max_count;
}
?>
                Showing Restul <?php echo $offset . " to " . $ct . " of " . $max_count . " entries"; ?>
            </div>
            <div class="col-lg-6">
                <ul class = "pagination pagination-sm" style="float: right;">
                    <?php
                    $i = 0;
                    $k = 1;
                    $fl = 0;
                    if ($k == $page) {
                        $t = $page - 1;
                        ?> <li class = 'disabled'><a href="#">&laquo;</a></li><?php
                        } else {
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLink2") . "&v=" . $obj->encdata("V_NewCommetTable") . "&pg=" . $k; ?>', '#display', '1');">&laquo;</a></li><?php
                        }

                        while ($i < $max_count) {
                            if ($k == $page) {
                                $fl = $k;
                                ?><li class = 'disabled'> <a href="#"><?php echo $k; ?></a></li><?php
                            } else {
                                ?><li><a href ='javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLink2") . "&v=" . $obj->encdata("V_NewCommetTable") . "&pg=" . $k; ?>', '#display', '1');"> <?php echo $k; ?></a></li><?php
                            }
                            $k++;
                            $i = $i + $limit;
                        }
                        $k--;
                        if ($fl == $k) {
                            $t = $page + 1;
                            ?> <li class = 'disabled'><a href="#">&raquo;</a></li><?php
                        } else {
                            $t = $page + 1;
                            ?> <li><a href = 'javascript:void(0)' onclick="return postURL3('<?php echo $obj->encdata("C_OpenLink2") . "&v=" . $obj->encdata("V_NewCommetTable") . "&pg=" . $t; ?>', '#display', '1');">&raquo;</a></li><?php
                        }
                        ?>



                </ul>
            </div>
        </div>

    </div>
</div>
