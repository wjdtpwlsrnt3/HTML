<?php 

include('common.php');
$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$location = $_POST['location'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "insert into member set
        name = '$name',
        age = '$age',
        sex = '$sex',
        location = '$location',
        email = '$email',
        password = '$password'
        ";

$result = $conn -> query($sql);

if($result) {
    echo "
    <script>
        location.href='sign_in.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('회원가입에 실패했습니다.');
        location.back();
    </script>
    ";
}



?>