<form class="layui-form" action="">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label>验证手机</label>
            <div class="layui-input-inline">
		<label><?=$userInfo['phone_num']?></label>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">姓名</label>
	    <label class="layui-form-label"><?=$userInfo['user_name']?></label>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">参加人数</label>
            <div class="layui-input-inline">

                <input type="text" name="phone"  value="<?=$userInfo['join_num']?>" disabled="disabled"/>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">签到次数</label>
            <div class="layui-input-inline">
                <input type="text"   value="<?=$userInfo['check_times']?>" disabled="disabled"/>
            </div>
        </div>
    </div>

</form>
<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>

<script>

</script>
