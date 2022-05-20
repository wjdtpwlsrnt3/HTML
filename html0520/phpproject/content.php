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
<div style="text-align: center; margin: 10%; border: 1px solid yellow;">
제목
<p>
    <?php echo $data['title'];?>
</p>

내용
<pre>
    <?php echo $data['content'];?>
</pre>

작성자
<p>
    <?php echo $data['writer'];?>
</p>

작성시간
<p>
    <?php echo $data['inserttime'];?>
</p>

<?php if($data ['writer'] == $_SESSION['email']) { ?>
<button onclick="updateContent()">수정</button>
<button onclick="deleteContent()">삭제</button>
<?php } ?>

</div>

<script>
function updateContent() {
    location.href = 'update_content.php?no=' + <?php echo $no ?>;
}

function deleteContent() {
    location.href = 'delete_content.php?no=' + <?php echo $no ?>;
}


</script>