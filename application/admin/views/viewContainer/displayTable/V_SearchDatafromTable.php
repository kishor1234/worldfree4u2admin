<?php 
$limit = 25;
if(!empty($main->filterPost("limit"))){
    $limit=$main->filterPost("limit");
}

$sql = $main->selectCount("post", "id");
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

?>

    <div class="col-lg-12">
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>URL's</th>
                <th>Category</th>
                <th>Views</th>
                <th>Post By</th>
                <th>IP</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = $main->select("post", $_SESSION["db_1"]).$main->whereSingleLike(array("title"=>$main->filterPost("keyword"))). $main->limitWithOffset($offset, $limit);
           
            $result = $main->adminDB[$_SESSION["db_1"]]->query($sql);
            $i=0;
            while ($row = $result->fetch_assoc()) {$i++;
                ?>

                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["title"]; ?></td>
                    <td>
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#my_<?php echo $i;?>"><i class="fa fa-eye"></i></button>
                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("VAddMoreURL")."&id=".$row["id"];?>" onclick=" return postURL2('<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("VAddMoreURL");?>','#main','<?php echo $row["id"]; ?>')" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                        <div id="my_<?php echo $i;?>" class="modal fade" role="dialog">
                            <div class="modal-dialog" >
                                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">&times;</button>
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class=""><!--panel modal-body-->
                                        <table class="table table-hover table-bordered table-responsive">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Original URL</th>
                                                <th>Shrink URL</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                       
                                        <?php
                                        $sql = $main->select("url", $_SESSION["db_1"]).$main->whereSingle(array("post_id"=>$row["id"])); // . $main->limitWithOffset($offset, $limit);
                                        $r = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($ro = $r->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>".$ro["id"]."</td>";
                                            echo "<td>".$ro["title"]."</td>";
                                            echo "<td><a href='" . $ro["url"] . "' class='btn btn-success'>Orignal URL</a></td>";
                                                        echo "<td><a href='" . $ro["slink"] . "' class='btn btn-primary'>Short URL</a></td>";
                                            if($main->checkURL($ro["url"])){echo "<td><span style='color:green;'>Active</span></td>";}else{echo "<td><span style='color:red;'>DeActivated</span></td>";}
                                            ?>
                                            <td>
                                                <a href="/?r=<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("V_EditLink")."&id=".$ro["id"];?>" onclick="return postURL2('<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("V_EditLink")."&id=".$ro["id"];?>','#display','<?php echo $ro["id"];?>')" class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" onclick="deleteSingleURL('<?php echo $ro["id"];?>','#my_<?php echo $i;?>','<?php echo $row["id"];?>','<?php echo $i;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <?php
                                            echo "</tr>";
                                        }
                                        ?>
                                        </table>
                                    </div>

                                </div>
                               
                            </div>
                        </div>

                    </td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php
                    $sqt=$main->select("postcvc",$_SESSION["db_1"]).$main->whereSingle(array("post_id"=>$row["id"]));
                    $rst=$main->adminDB[$_SESSION["db_1"]]->query($sqt);
                    $r=$rst->fetch_assoc();
                    echo $r["view"];
                    ?></td>
                    <td><?php echo $row["byw"]; ?></td>
                    <td><?php echo "<a href='https://ipinfo.io/".$row["ip"]."' target='blank'>".$row["ip"]."</a>"; ?></td>
                    <td><?php echo $row["isDate"]; ?></td>
                    <td>
                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("VEditPost")."&id=".$row["id"];?>" onclick=" return postURL2('<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("VEditPost")."&id=".$row["id"];?>','#main','1')" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="#" onclick=" return postURL('<?php echo $obj->encdata("C_DeleteCompletePost")."&v=". $obj->encdata("V_PostDataTable");?>','#display','<?php echo $row["id"];?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>URL's</th>
                <th>Category</th>
                <th>Views</th>
                <th>Post By</th>
                <th>IP</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </table>
    </div>
