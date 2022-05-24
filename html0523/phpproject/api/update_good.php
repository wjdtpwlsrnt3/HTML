<?php 
// include('../common.php');
$host = "localhost";
$user = "root";
$db   = "hyosung3";

$conn = mysqli_connect($host, $user, null, $db);

$no = $_GET['no'];
$cancel = $_GET['cancel'];

$sql = "update board set
        goodCount = goodCount + $cancel        
        where no = $no";

$result = $conn -> query($sql);

$sql_count = "select 
                goodCount 
                from board
                where no = $no";
$result_count = $conn -> query($sql_count);
$data = mysqli_fetch_assoc($result_count);
$countValue = $data['goodCount'];
if($data) {
    // 중복    
    echo json_encode(array('result' => $countValue));
} else {
    // 중복이 아니다
    echo json_encode(array('result' => 'n'));
}

?>