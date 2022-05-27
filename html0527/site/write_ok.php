<?php

include('common.php');

$title = $_POST['title'];
$content = addslashes($_POST['content']);
$writer = $_SESSION['email'];
$inserttime = date("y-m-d-h:i:s");

$sql = "insert into board set
        title = '$title',
        content = '$content',
        writer = '$writer',
        inserttime = '$inserttime'
        ";

$result = $conn -> query($sql);

if($result) {
    echo "
    <script>
        location.href='index.php';
    </script>
    ";
} else { 
    echo "
    <script>
        alert('글 등록에 실패했습니다.');
        history.back();
    </script>
    ";
}
?>