<div class="col-lg-12" style="padding: 0; margin: 0;">
    <div class="form-group">
        <div class="col-lg-4">
            <label>Original URL <span id="require"> * </span></label>
            <input type="text" name="url_<?php echo $main->filterPost("id");?>" id="url_<?php echo $main->filterPost("id");?>" required="" placeholder="Enter Original URL" class="form-control" autocomplete="off">
        </div>
        <div class="col-lg-4">
            <label>Title <span id="require"> * </span></label>
            <input type="text" name="titl_<?php echo $main->filterPost("id");?>" id="url_<?php echo $main->filterPost("id");?>" required="" placeholder="Enter URL Title" class="form-control" autocomplete="off">
        </div>
        <div class="col-lg-4">
            <label>File Size <span id="require"> * </span></label>
            <input type="text" name="size_<?php echo $main->filterPost("id");?>" id="size_<?php echo $main->filterPost("id");?>" required="" placeholder="Enter Size" class="form-control" autocomplete="off">
        </div>
    </div>
</div>