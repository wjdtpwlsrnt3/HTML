<?php
    include("common.php");

    print_r($_POST);

    $email = $_POST['email'];
    $prepassword = $_POST['prepassword'];
    $afterpassword = $_POST['afterpassword'];

    if ($prepassword != $_SESSION['pw']) {
        echo "
        <script>
            alert(기존 비밀번호가 일치하지 않습니다. ');
            history.back();
        </script>
        ";
    }

    $sql = "update member set
            password = '$afterpassword'
            where email = '$email'
            ";

    $result = $conn -> query($sql);

    if ($result) {
        session_destroy();
        echo "
        <script>
            location.href='sign_in.php';
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