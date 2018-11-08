<style>
    .verify-div{
        margin-top: 50px;
        display: none;
    }


</style>

<head>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>


<form class="layui-form" action="check">

    <h3>米户外签到页面</h3>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-inline">
                <input type="text" name="user_name" lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">报名手机</label>
            <div class="layui-input-inline">
                <input type="tel" name="phone_num" lay-verify="required|phone" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即签到</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>



</form>


<div class="verify-div">

    <h3 style="color: red">验证结果</h3>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">报名手机</label>
            <div class="layui-input-inline">
                <input type="text" name="phone_num" autocomplete="off" class="layui-input" value="" disabled="disabled"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-inline">
                <input type="text" name="user_name"  autocomplete="off" class="layui-input" value="" disabled="disabled"/>
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">参加人数</label>
            <div class="layui-input-inline">

                <input type="text" name="join_num"  autocomplete="off" class="layui-input" value="" disabled="disabled"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">签到次数</label>
            <div class="layui-input-inline">
                <input type="text" name="check_times"  autocomplete="off" class="layui-input" value="" disabled="disabled"/>
            </div>
        </div>
    </div>

    <h3 style="color: red" hidden="hidden" id="repetition-h">已重复签到</h3>
</div>


<!--<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>-->

<script>
    $('form').submit(function () {

        $.ajax({
            url:"check?" + $('form').serialize(),
            success:function (datas) {
                if (datas != undefined || datas != "") {
                    var json = $.parseJSON(datas);

                    if(json.code == 1) {
                        layer.msg(json.msg);
                    }else {
                        $("input[name='phone_num']").val(json.data.phone_num);
                        $("input[name='user_name']").val(json.data.user_name);
                        $("input[name='join_num']").val(json.data.join_num);
                        $("input[name='check_times']").val(json.data.check_times);
                        $(".verify-div").show();

                        if(json.data.check_times > 1) {
                            $("#repetition-h").show();
                        }else {
                            $("#repetition-h").hide();
                        }
                    }


                }
            }
        });

        return false;
    });

</script>