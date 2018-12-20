<head>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>

<form class="layui-form" action="">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">验证手机</label>
            <div class="layui-input-inline">
                <input type="text" name="phone" autocomplete="off" class="layui-input" value="<?=$userInfo['phone_num']?>" disabled="disabled"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-inline">
                <input type="text" name="email"  autocomplete="off" class="layui-input" value="<?=$userInfo['user_name']?>" disabled="disabled"/>
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">参加人数</label>
            <div class="layui-input-inline">

                <input type="text" name="phone"  autocomplete="off" class="layui-input" value="<?=$userInfo['join_num']?>" disabled="disabled"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">签到次数</label>
            <div class="layui-input-inline">
                <input type="text"  autocomplete="off" class="layui-input" value="<?=$userInfo['check_times']?>" disabled="disabled"/>
            </div>
        </div>
    </div>

</form>
<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>

<script>

</script>
