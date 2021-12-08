<?php
    $connect = mysqli_connect('localhost', 'root', '', 'tokosnack');

    $id_pemasok = $_GET['id_pemasok'];

    $query = mysqli_query($connect, "DELETE FROM pemasok WHERE id_pemasok='$id_pemasok'");

    if ($query) {
        header('Location: pemasok.php');
    } else {
        header('Location: edit.php');        
    }
    
?>