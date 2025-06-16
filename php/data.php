<?php
    while($row = mysqli_fetch_assoc($query)){
        $pid = intval($_SESSION['pid'] ?? 0);
        $sql2 = "SELECT * FROM messages WHERE project_id={$pid} AND ((sender_id = {$row['unique_id']} AND receiver_id = {$outgoing_id})
                OR (sender_id = {$outgoing_id} AND receiver_id = {$row['unique_id']})) ORDER BY id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['content'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['sender_id'])){
            ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['name'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>