
<?php 
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = '$id'";
    $select_result = mysqli_query($con, $query);

    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?msg=success\">";
}




?>