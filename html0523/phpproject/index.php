<?php 

include ("common.php");
if ($_SESSION) {
    echo "로그인 정보가 있습니다";
} else {
    echo "
    <script>
        location.href='sign_in.php';
    </script>
    ";
}

$sql = "select 
            no, 
            title, 
            writer, 
            inserttime
        from board";

$result = $conn -> query($sql);



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
    <div style="padding:30px; color:black; text-align:center">
        header
       
    </div>
    <div>
        <?php include('view/board.html');?>
    </div>
    <div>
        <table class="table table-striped table-hover" style="text-align: center;">
            <thead>
                <th>no</th>
                <th>title</th>
                <th>writer</th>
                <th>time</th>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['no']?></td>
                    <td>
                        <a href="content.php?no=<?php echo $row['no']?>">
                        <?php echo $row['title']?>
                        </a>
                    </td>
                    <td><?php echo $row['writer']?></td>
                    <td><?php echo $row['inserttime']?></td>
                </tr>
               <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    function logout() {
        location.href="logout.php";
    }
    function myInfoUpdate() {
        location.href="my_Info_Update.php";
    }
</script>