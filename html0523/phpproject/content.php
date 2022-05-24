<?php 

include('common.php');

$no = $_GET['no'];

$sql_u = "update board set
        count = count + 1
        where no = '$no'";

$result = $conn -> query($sql_u);

$sql = "select 
            title,
            content,
            writer,
            insertTime,
            goodCount,
            count
        from board 
        where no = '$no'";

$result = $conn -> query($sql);

$data = mysqli_fetch_assoc($result);

if($data) {
        
} else {    
    echo "
    <script>
        alert('비정상 접근')
        location.href='index.php';        
    </script>
    ";
}

?>
<style>    
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


조회수 : <?php echo $data['count'];?>

<div style="margin: 10%; border:1px solid black; text-align: center;">
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
    <?php echo $data['insertTime'];?>
    </p>    

    <p>
    <b>좋아요 : <label id="goodCount"> <?php echo $data['goodCount'];?></label></b>    
    <i id="good"class="bi bi-heart" onclick="good()"></i>   
    
   
    </p>
    
    <?php if($data['writer'] == $_SESSION['email']) { ?>
    <button onclick="updateContent()">수정</button>
    <button onclick="deleteContent()">삭제</button>
    <?php } ?>
</div>

<script>
    var contentNo = <?php echo $no; ?>;
    function updateContent() {
        location.href='update_content.php?no=' + <?php echo $no ?>;
    }
    function deleteContent() {
        location.href='delete_content.php?no=' + <?php echo $no ?>;
    }
    function good() {
        var className = document.querySelector('#good').className
        if(className == 'bi bi-heart') {
            document.querySelector('#good').setAttribute('class', 'bi bi-heart-fill');
            document.querySelector('#good').style.color = 'red';
            var http = new XMLHttpRequest();
            http.onreadystatechange = function () {
                if(this.status == 200 && this.readyState == this.DONE) {                            
                    if(JSON.parse(http.response)['result'] != 'n'){
                        // 좋아요 갯수 최신화
                        document.querySelector('#goodCount').innerText 
                        = JSON.parse(http.response)['result'];
                    } else {
                        alert('실패');
                    }
                }            
            }            
            
            var url = "http://localhost/phpproject/api/update_good.php?no=" + contentNo+ '&&cancel=+1';
            
            http.open('GET', url);
            http.send();
        } 
        if(className == 'bi bi-heart-fill') {
            document.querySelector('#good').setAttribute('class', 'bi bi-heart');
            document.querySelector('#good').style.color = '';
            var http = new XMLHttpRequest();
            http.onreadystatechange = function () {
                if(this.status == 200 && this.readyState == this.DONE) {                            
                    if(JSON.parse(http.response)['result'] != 'n'){
                        // 좋아요 갯수 최신화
                        document.querySelector('#goodCount').innerText 
                        = JSON.parse(http.response)['result'];
                    } else {
                        alert('실패');
                    }
                }            
            }            
            
            var url = "http://localhost/phpproject/api/update_good.php?no=" + contentNo + '&&cancel=-1';
            
            http.open('GET', url);
            http.send();
        } 
        
    }




</script>