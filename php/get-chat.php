<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT messages.*, users.img FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $pesan_timestamp = $row['msg_timestamp']; // Waktu pesan dari database
            $waktu_pesan = date("H:i", strtotime($pesan_timestamp)); // Format waktu yang diinginkan (jam:menit)
            if($row['outgoing_msg_id'] === $outgoing_id){
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                                <span class="time">' . $waktu_pesan . '</span>
                            </div>
                            </div>';
            }else{
                $output .= '<div class="chat incoming">
                            <img src="php/images/'.$row['img'].'" alt="">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                                <span class="time">' . $waktu_pesan . '</span>
                            </div>
                            </div>';
            }
        }
    }else{
        $output .= '<div class="text">Tidak ada pesan yang tersedia. Mulai obrolan dan pesan akan muncul disini.</div>';
    }
    echo $output;
}else{
    header("location: ../login.php");
}
?>
