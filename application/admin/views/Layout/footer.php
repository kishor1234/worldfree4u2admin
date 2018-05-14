

</div><!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Powered by <a href='http://aasksoft.com/' target="blank">@askSoft</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">SSPMS</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">

    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->


<script>
    $(document).ready(function () {
        $("#txtEditor").Editor();
        $.post("/?r=<?php echo $obj->encdata("C_Notification"); ?>", {}, function (data) {
            var obj = $.parseJSON(data);
            for (i in obj)
            {
                showSuccessToast(obj[i]["name"]+" Comment on post...!");
            }
           
        });
        $.post("/?r=<?php echo $obj->encdata("C_NotificationList"); ?>", {}, function (data) {
           $("#noti").html(data);
        });
    });
     $('.lazy').lazy();
    /*setInterval(function () {
       
    }, 1000);*/
   
    /* $(function() {
     
     });*/
</script>
<script>
    function onLoading()
    {
        $("#cover").show();
        $("#msg").html("<center><img src='logo.gif' style='width:100px;' /><h4 style='color:#000;'><strong>Please Wait.!</strong></h4></center>");
    }
    function offLoading()
    {
        $("#msg").html("");
        $("#cover").hide();
    }
    function sendAjax(file, display)
    {
        onLoading();
        //$(display).html(file);
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
        });
        offLoading();
    }
    $(function () {
// Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);

                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });
    function uploadEvent(file, display, form)
    {
        var form_data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: form_data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                $(display).html(data);
                $(form)[0].reset();
                $(".gallery").html("");
            }});


        return false;
    }
    function printMessage(file, display)
    {
        $.post("/?r=" + file, {}, function (data) {
            $(display).html(data);
        });
    }
    function postData(file, display, form)
    {
        var data = new FormData($(form)[0]);
        onLoading();
        $.ajax({
            type: "POST",
            url: '/?r=' + file,
            data: data, //$("#studetnReg").serialize(), // serializes the form's elements.,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data)
            {
                offLoading();
                $("#msg").show();
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
                $(display).html(data);
                $(form)[0].reset();

            }});

        $(form).hide();
        return false;
    }
    function postURL(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
        });
        return false;
    }

    function getEvent(file, display)
    {
        onLoading();
        $.post("/?r=" + file, {title: $("#eventName").val()}, function (data) {
            offLoading();
            $(display).html(data);
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
        });
        return false;
    }
    function postURL2(file, display, id)
    {
        onLoading();
        $.post("/?r=" + file, {id: id}, function (data) {
            offLoading();
            $(display).html(data);
            return false;
        });

    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#select-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function onInput(id, list, display, file) {
        var val = $(id).val();
        var opts = $(list).children();//.childNodes;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
                onLoading();
                $.post("/?r=" + file, {master: opts[i].value}, function (data) {
                    offLoading();
                    $(display).html(data);
                });
                break;
            }
        }
    }
    function deletePhoto(file, id, path)
    {
        onLoading();
        $.post('/?r=' + file, {id: id, path: path}, function (data) {
            offLoading();
            $("#img" + id).hide();
            $("#msg").show();
            printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");
        });
    }
    function addMore(file, display, turl)
    {
        var tl = parseInt($(turl).val());
        tl++;
        onLoading();
        $.post('/?r=' + file, {id: tl}, function (data) {
            offLoading();
            $(display).append(data);
            $(turl).val(tl);
        });
        return false;
    }
    function SliderAdd()
    {
        $("#Slider-perview").html($("#data").val());
    }
    $(document).ready(function () {
        $(".Editor-editor").keyup(function (e) {
            var data = $(".Editor-editor").html();

            $("#txtEditor").html(data);
        });
        //setInterval(function(){$("#msg").hide(); }, 10000);
        /*$("#limit").change(function () {
         var limit = $("#limit").val();
         alert(limit);
         });*/
    });
    function postURL3(file, display, id)
    {
        var limit = $("#limit").val();
        onLoading();
        $.post("/?r=" + file, {id: id, limit: limit}, function (data) {
            offLoading();
            $(display).html(data);
            return false;
        });

    }
    function searchTableData(file, display, id)
    {
        var keyword = $("#keyword").val();

        onLoading();
        $.post("/?r=" + file, {id: id, keyword: keyword}, function (data) {
            offLoading();
            $(display).html(data);
            return false;
        });

    }
    function deleteSingleURL(id, display, post_id, i)
    {
        if (!confirm("Do you want to delete")) {

            return false;
        }
        else {
            $.post('/?r=<?php echo $obj->encdata("C_DeleteSpasificLink") ?>', {i: i, id: id, post_id: post_id}, function (data) {
                printMessage('<?php echo $obj->encdata("C_PrintMessage"); ?>', "#msg");

                $(display).html(data);
            });
            return true;
        }
    }
    function showSuccessToast(msg) {
        $().toastmessage('showSuccessToast', msg);
    }
</script>
</body>
</html>
