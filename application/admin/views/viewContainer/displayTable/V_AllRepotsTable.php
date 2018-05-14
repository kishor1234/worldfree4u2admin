<?php
$limit = 25;
if (!empty($main->filterPost("limit"))) {
    $limit = $main->filterPost("limit");
}

$sql = $main->selectCount("report", "id") . $main->whereSingle(array("isActive" => "0"));
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
$sql = $main->update(array("rd" => "1"), "notification"); //. $this->whereSingle(array("tid" => $_REQUEST["id"]));
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
                        <th>Edit Post</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>In Response To</th>
                        <th>Submitted On</th>
                    </tr>
                    <?php
                    $sql = $main->select("report", $_SESSION["db_1"]) . $main->whereSingle(array("isActive" => "0")) . $main->orderBy("DESC", "id") . $main->limitWithOffset($offset, $limit);
                    $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>

                        <tr>
                            <td><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VEditPost") . "&id=" . $row["post_id"]; ?>"><?php echo $row["post_id"]; ?></a></td>
                            <td>
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <img src="assets/ap/dist/img/avatar5.png" class="user-image" style="height: 30px; width: auto;" alt="Image">
                                    </div>
                                    <div class="col-lg-10">
                                        <?php echo $row["name"]; ?><br>
                                        <a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a>

                                    </div>
                                </div>
                            </td>  

                            <td>
                                <div class="from-group">
                                    <div class="col-lg-12">
                                        <?php echo $row["message"]; ?>
                                    </div>
                                </div>
                                <div class="from-group">
                                    <div class="col-lg-12">
                                         <?php
                                $post_Resutl = $main->adminDB[$_SESSION["db_1"]]->query($main->select("post", $_SESSION["db_1"]) . $main->whereSingle(array("id" => $row["post_id"])));
                                $post_row = $post_Resutl->fetch_assoc();
                                ?>
                                        <a href="#" onclick=" return postURL('<?php echo $obj->encdata("C_DeleteReportMsg") . "&v=" . $obj->encdata("VAllNewComments"); ?>', '#display', '<?php echo $row["id"]; ?>')">Delete</a>
                                        
                                    </div>
                                </div>

                            </td>

                            <td>
                                
                                <div class="from-group">
                                    <div class="col-lg-12">
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VEditPost") . "&id=" . $row["post_id"]; ?>"><?php echo $post_row["title"]; ?></a>
                                    </div>
                                    <div class="col-lg-12">
                                        <a href="https://worldfree4u2.com/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSingleMovie") . "&c=" . $obj->encdata($post_row["id"]); ?>" target="_blank">ViewPost</a>
                                    </div>
                                </div>
                                <div class="from-group">
                                    <div class="col-lg-12">
                                        <span class="badge badge-primary"><?php echo $post_row["comment"]; ?></span>
                                    </div>
                                </div>

                            </td>
                            <td><?php echo $row["isDate"]; ?></td>

                        </tr>

                        <?php
                    }
                    ?>
                    <tr>
                        <th>Edit Post</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>In Response To</th>
                        <th>Submitted On</th>
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
