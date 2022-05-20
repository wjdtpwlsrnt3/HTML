<?php
include('common.php');

$no = $_GET['no'];
$sql = "select 
            title, 
            content, 
            writer, 
            inserttime
        from board
        where no = '$no'
        ";

$result = $conn -> query($sql);

$data = mysqli_fetch_assoc($result);

if($data) {
    
} else {
    echo "
    <script>
        alert('비정상 접근');
        loaction.href='index.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="background-color: black; padding:30px; color:white; text-align:center">
      글 수정
      
</div>
<form action="update_content_ok.php" method="post">
    <div style="margin: 10%;">
        <div style="padding: 2%;">
            <label for="title">제목</label>
            <input id="title" name="title" 
            value="<?php echo $data['title'];?>" type="text">
        </div>
        <div style="padding: 2%; height: 300px;">
            <p for="content">내용</p>
            <textarea id="content" <?php echo $data['content'];?>
            name="content" style="height: 50%; width: 50%;"></textarea>
        </div>
        <div style="padding: 2%;">
            <button>수정완료</button>
        </div>
    </div>
</form>
</body>
</html>