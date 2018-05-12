<table class="table table-responsive table-bordered table-hover">
    <tr>
        <th>#</th>
        <th>Category</th>
        <!--<th>Post By</th>
        <th>IP</th>
        <th>Post Date</th>-->
        <th>Action</th>
    </tr>
    <?php
        $sql=$main->select("category",$_SESSION["db_1"]);
        $resutl=$main->adminDB[$_SESSION["db_1"]]->query($sql);
        while($row=$resutl->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["category"]."</td>";
            //echo "<td>".$row["byw"]."</td>";
            //echo "<td>".$row["ip"]."</td>";
            //echo "<td>".$row["isDate"]."</td>";
            ?>
    <td><a href="javascript:void(0)" onclick="return postURL('<?php echo $obj->encdata("C_DeleteCategory");?>','#display','<?php echo $row["id"];?>')" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i></a></td>
    <?php
            echo "</tr>";
        }
    ?>
</table>