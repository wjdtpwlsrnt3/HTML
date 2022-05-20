<?php
    include('common.php');

    $user_no = $_SESSION['no'];

    $sql = "delete from member where no = $user_no";

    $result = $conn -> query($sql);

    if ($result) {
        echo "
        <script>
            alert('탈퇴하기');
            location.href='sign_in.php';
        </script>";
    }else {
        echo "
        <script>
            alert('탈퇴실패');
            history.back();
        </script>";
    }
?>