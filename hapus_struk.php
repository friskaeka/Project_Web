<?php
    $connect = mysqli_connect('localhost', 'root', '', 'tokosnack');

    $query = mysqli_query($connect, "DELETE FROM struk");
        header('Location: home.php');
    
    
?>