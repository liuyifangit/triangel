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


<div data-role="page" id="pageone">
    <div data-role="header">
        <a href="#" data-role="button" data-icon="home" onclick="haveFun()">撩</a>
        <h1>米户外签到页面</h1>
        <a href="#" data-role="button" data-icon="search" onclick="haveFun()">我</a>
    </div

    <div data-role="content">
        <form class="check-in-form">
            <div data-role="fieldcontain">
                <label for="user_name">姓名：</label>
                <input type="text" name="user_name" id="user_name">

                <label for="phone_num">报名电话：</label>
                <input type="tel" name="phone_num" id="phone_num">
            </div>

            <div data-role="controlgroup" data-type="horizontal">
                <a id = "check-in-bnt" href="#" data-role="button" onclick="checkIn()">立即签到</a>
                <a id = "reset-bnt" href="#" data-role="button" onclick="resetInput()">重置</a>
            </div><br>
        </form>


        <div class="verify-div">
            <h3 style="color: red">验证结果</h3>
            <ul data-role="listview" data-theme="e">
                <li id="ul-li-user_name">姓名：</li>
                <li id="ul-li-phone_num">报名电话：</li>
<!--                <li id="ul-li-join_num">参加人数：</li>-->
                <li id="ul-li-check_times">签到次数：</li>
            </ul>
            <h3 style="color: red" id="repetition-h"></h3>
        </div>

    </div>

    </div>




<!--<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>-->

<script>

    function haveFun() {

        var msg_arr = ['撩我就带走我',
            '除了先生的美色 不接受任何贿赂',
            '一生二 二生三 三生万物 万物不如你',
            '月亮很亮 亮也没用 没用也亮 我喜欢你 喜欢也没用 没用也喜欢',
            '只许官州放火 不许你离开我',
            '苦海无涯 回头是我',
            '朋友说 我提到你的时候 眼睛在发光',
            '这一生太难 想被你哄着过完',
            '英雄都有过不去的江东，何况我这个在爱里低头的小朋友',
            '才下了眉头，却攻上我心头',
            '对你的偏爱太过于明目张胆',
            '江水 星河 都不是 你才是我的圣经',
            ' 猜猜我的心脏在哪边？肯定在左边。错，在你那边。',
            '斯人若彩虹，遇上方知有',
            '余光是你，余生也是你',
            '落叶归根，我归你',
            '没想过有幸能白头到老，只想和你步履生风，略过此生。',
            '我爱你，如果要加上一个期限，我愿意是两分钟，如果你没有回应，我要撤回它。',
            '我喜欢你已经超过两分钟了，不能撤回了',
            '明明早已百无禁忌，偏偏你是一百零一'
        ];

        layer.msg(msg_arr[Math.ceil(Math.random()*(msg_arr.length-1))]);

    }
    
    
    
    function resetInput() {
        $("#user_name").val('');
        $("#phone_num").val('');
    }

    function checkIn() {
        $.ajax({
            url:"check?" + $('form.check-in-form').serialize(),
            success:function (datas) {
                if (datas != undefined || datas != "") {
                    var json = $.parseJSON(datas);

                    if(json.code == 1) {
                        layer.msg(json.msg);
                    }else {
                        $("#ul-li-phone_num").html('报名电话：' + json.data.phone_num);
                        $("#ul-li-user_name").html('姓名：' + json.data.user_name);
//                        $("#ul-li-join_num").html('参加人数：' + json.data.join_num);
                        $("#ul-li-check_times").html('签到次数：' + json.data.check_times);
                        $(".verify-div").show();
                        $(".check-in-form").hide();
                        if(json.data.check_times > 1) {
                            $("#repetition-h").html("已重复签到");
                        }else {
                            layer.msg('请把签到结果给工作人员查看<br>请不要退出，否则无法再次签到', {
                                time: 30000, //30s后自动关闭
                                btn: ['明白了', '知道了', '哦']
                            });
                            $("#repetition-h").html("验证成功");
                        }
                    }


                }
            }
        })
    }
</script>