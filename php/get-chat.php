<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $project_id  = intval($_POST['project_id'] ?? 0);
        $output = "";
        $sql = "SELECT messages.*, mssgusers.img FROM messages LEFT JOIN mssgusers ON mssgusers.unique_id = messages.sender_id
                WHERE project_id = {$project_id} AND ((sender_id = {$outgoing_id} AND receiver_id = {$incoming_id})
                OR (sender_id = {$incoming_id} AND receiver_id = {$outgoing_id})) ORDER BY id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sender_id'] == $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. htmlspecialchars($row['content']) .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'. $row['img'] .'" alt="">
                                <div class="details">
                                    <p>'. htmlspecialchars($row['content']) .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>