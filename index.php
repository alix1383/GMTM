<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/page/head.html';?>
</head>
<body>
    <?php 
    if(! isset($_SESSION['Token'])) {
        include_once __DIR__.'/page/form.html'; 
    } else {
        include_once __DIR__.'/page/header.html'; 
        
    }
    include __DIR__ . '/inti.php';
    if (isset($_POST['Token'])) {
        if (!strlen($_POST['Token']) == 32) {
            echo '<p class="text-center display-6 text-danger ">Pls Enter valid Web api Key!!</p>';
            return;
        }
        $ValidateKey = Is_ValidaApiKey($_POST['Token']);
        if (!$ValidateKey == true) {
            echo '<p class="text-center display-6 text-danger">Pls Enter valid Web api Key!!</p>';
            return;
        }
        $_SESSION['Token'] =  $_POST['Token'];
        echo "<meta http-equiv='refresh' content='0'>";
        header('Location: ?list');
        }
    ?>
</body>
</html>