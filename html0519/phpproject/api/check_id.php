<?php
// header('Content-Type: text/html; charset=UTF-8');
include('../common.php');
$email = $_GET['email'];


$sql = "select email from member
        where email = '$email'
        ";

$result = $conn -> query($sql);

$data = mysqli_fetch_assoc($result);

if($data) {
    echo json_encode(array('result' => 'y'));
} else {
    echo json_encode(array('result' => 'n'));
}



?>