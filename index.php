<?php
session_start();
require __DIR__ . '/inti.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include PAGE_TMPL_HTML . 'head.html';?>
</head>

<body>
    <?php
    $Token = $Input->post('Token');
    
    if (! isset($SESSION['Token'])) {
        include_once PAGE_TMPL_HTML . 'form.html';
    }
    if (isset($Token)) {
        if (!strlen($Token) == 32) {
            echo '<p class="text-center display-6 text-danger ">Pls Enter valid Web api Key!!</p>';
            return;
        }

        // $ValidateKey = $Request->verifyApiKey($Token);
        // if (! $ValidateKey == true) {
        //     echo '<p class="text-center display-6 text-danger">Pls Enter valid Web api Key!!</p>';
        //     return;
        // }
        
        $_SESSION['Token'] = $Token;
        echo "<meta http-equiv='refresh' content='0'>";
        header('Location: ?list');
    }
?>
</body>

</html>