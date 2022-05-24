<?php 
// 세션은 대게 사용자의 정보를 저장해서,
// 필요한 곳에 불러와 사용한다.
session_start();

$host = "localhost";
$user = "root";
$db   = "hyosung3";

$conn = mysqli_connect($host, $user, null, $db);

// print_r($conn);

?>
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">글 목록</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="write.php">글 작성</a>
        </li>
        
      </ul>
    <b><?php echo $_SESSION['email']. "님 환영합니다."?></b>

        <button class="btn btn-outline-success" type="submit" style="margin: 0 10 0 0; " onclick="myInfoUpdate()">정보수정></button>
        <button class="btn btn-outline-success" type="submit" onclick="logout()">정보수정></button>
       
        <button >로그아웃</button>
    </div>
  </div>
</nav>