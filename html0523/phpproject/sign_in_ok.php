<?php 

include('common.php');

$email = $_POST['email'];
$password = $_POST['password'];

// 1. 사용자가 입력한 이메일에 해당하는 쿼리
$sql = "select no, email, password from member
        where email = '$email'";

$result = $conn -> query($sql);

$db_pw = mysqli_fetch_assoc($result);

// 2. 쿼리에 대한 retrun값이 있다면
if ($db_pw) {
    if ($password == $db_pw['password']) {
        // 3. 세션에 저장한다.
    $_SESSION['no'] = $db_pw['no'];
    $_SESSION['pw'] = $db_pw['password'];
    $_SESSION['email'] = $db_pw['email'];

    echo "
    <script>
        location.href='index.php'
    </script>
    ";
    }
 else {
    echo "
    <script>
    alert('비밀번호가 다릅니다.');
        history.back()
    </script>
    ";
    }
}
?>