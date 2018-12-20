<head>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>


<style>
    th {
        border-bottom: 1px solid #d6d6d6;
    }

    tr:nth-child(even) {
        background: #e9e9e9;
    }
</style>
</head>
<body>

<div data-role="page" id="pageone">
    <div data-role="header">
        <h1><?=$content?></h1>
    </div>

    <div data-role="main" class="ui-content">
        <fieldset data-role="fieldcontain">
            <label for="day">签到筛选</label>
            <select name="day" id="check-select" onclick="checkSelectChange()">
                <option value="" <?php if($flag == '') echo 'selected="selected"' ?>>全部人员</option>
                <option value="checkIn" <?php if($flag == 'checkIn') echo 'selected="selected"' ?>>已签到</option>
                <option value="unCheckIn" <?php if($flag == 'unCheckIn') echo 'selected="selected"' ?>>未签到</option>
            </select>
        </fieldset>

        <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow" id="myTable">
            <thead>
            <tr>
                <th data-priority="6">姓名</th>
                <th>手机号</th>
                <th data-priority="1">签到次数</th>
                <th data-priority="2">签到时间</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?=$user['user_name'] ?></td>
                    <td><?=$user['phone_num'] ?></td>
                    <td><?=$user['check_times'] ?></td>
                    <td><?=$user['add_time'] ?></td>
                </tr>
            <?php endforeach;?>


            </tbody>
        </table>
    </div>

    <div data-role="footer">
        <h1>我是有底线的</h1>
    </div>
</div>

<script>
    function checkSelectChange() {
        var flag = $("#check-select").val();
        window.location.replace("/mihuwai/check-in/get-users?pwd=linruisen&flag=" + flag);
    }


</script>
