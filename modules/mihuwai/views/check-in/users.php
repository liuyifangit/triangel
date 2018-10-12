
<table>
    <tr>
        <th>姓名</th>
        <th>手机号</th>
        <th>参加人数</th>
        <th>签到次数</th>
        <th>更新时间</th>
    </tr>

    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?=$user['user_name'] ?></td>
            <td><?=$user['phone_num'] ?></td>
            <td><?=$user['join_num'] ?></td>
            <td><?=$user['check_times'] ?></td>
            <td><?=$user['add_time'] ?></td>
        </tr>
    <?endforeach;?>


</table>

