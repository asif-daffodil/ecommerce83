<?php  
    require_once './vendor/autoload.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./node_modules/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="./assets/css/style.min.css">
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/toastr/build/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
        }
    </script>
</head>
<body>
    <?php  
        require_once './components/navbar.php';
    ?>