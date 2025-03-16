<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Bem vindo!</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit nam inventore, quisquam quos earum at minus, sequi praesentium, hic recusandae deleniti voluptate ullam atque voluptates aut id totam quidem. Cumque!</p>
            <p>Seu email: <span><?php echo $_SESSION['email'];?></span></p>
            <a href="logout.php" class="logout">Deslogar</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>