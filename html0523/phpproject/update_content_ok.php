<?php

    include('common.php');

    print_r($_POST);
    $no = $_POST['no'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "update board set
            title = '$title',
            content = '$content'
            where no = $no
            ";
    $result = $conn -> query($sql);

    if($result) {
        echo "
        <script>
            alert('수정 성공!');
            location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            history.back();
        </script>
        ";
    }
?>