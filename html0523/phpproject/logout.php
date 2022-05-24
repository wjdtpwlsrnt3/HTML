<?php

session_start();
session_destroy();

echo "
<script>
    location.href='sign_in.php';
</script>
";

?>