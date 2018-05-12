
 <div class="modal-dialog" style="margin-left:10px;">
                                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">&times;</button>
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class=""><!--panel modal-body-->
                                        <table class="table table-hover table-bordered table-responsive">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Original URL</th>
                                                <!--<th>Shrink URL</th>-->
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                       
                                        <?php
                                        $sql = $main->select("url", $_SESSION["db_1"]).$main->whereSingle(array("post_id"=>$post_id)); // . $main->limitWithOffset($offset, $limit);
                                        $r = $main->adminDB[$_SESSION["db_1"]]->query($sql);
                                        while ($ro = $r->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>".$ro["id"]."</td>";
                                            echo "<td>".$ro["title"]."</td>";
                                            echo "<td style='width:10px;'>".urldecode($ro["url"])."</td>";
                                           // echo "<td style='width:10px;'>".$ro["slink"]."</td>";
                                            if($main->checkURL($ro["url"])){echo "<td><span style='color:green;'>Active</span></td>";}else{echo "<td><span style='color:red;'>DeActivated</span></td>";}
                                            ?>
                                            <td>
                                                <a href="/?r=<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("V_EditLink")."&id=".$ro["id"];?>" onclick="return postURL2('<?php echo $obj->encdata("C_OpenLink")."&v=". $obj->encdata("V_EditLink")."&id=".$ro["id"];?>','#display','<?php echo $ro["id"];?>')" class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" onclick="deleteSingleURL('<?php echo $ro["id"];?>','#my_<?php echo $main->filterPost("i");?>','<?php echo $post_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <?php
                                            echo "</tr>";
                                        }
                                        ?>
                                        </table>
                                    </div>

                                </div>
                               
                            </div>