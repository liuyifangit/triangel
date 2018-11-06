<form class="layui-form" action="check">

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">验证手机</label>
            <div class="layui-input-inline">
                <input type="tel" name="phone_num" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即签到</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
</form>

<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>

<script>
    $('form').submit(function () {
        var phone_num = $("input[name='phone_num']").val();

        $.ajax({
            url:"check?phone_num="+phone_num,
            success:function (datas) {
                if (datas != undefined || datas != "") {
                    var json = $.parseJSON(datas);

                    if(json.code == 1) {
                        alert(json.msg);
                    }else {
                       // alert(json.msg);
                        location.replace('get-user-info?phone_num=' + phone_num);

                    }


                }
            }
        });

        return false;
    });

</script>
