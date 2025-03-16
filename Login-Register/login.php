<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conection,$_POST['email']);
    $pass = md5($_POST['password']);
    
    $select = "SELECT * FROM users WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conection,$select);
    if(mysqli_num_rows($result)>0){
        $_SESSION['email'] = $email;
        header('location:header.php');
    }
    else{
        $error[] = 'email ou senha incorreto.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form_container">
        <form action="" method="post">
            <h3>Login</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error_msg">'.$error.'</span>';
                }
            }
            ?>
            <input type="email" name="email" id="email" placeholder="Digite seu email" class="box" required>
            <input type="password" name="password" id="password" placeholder="Digite sua senha" class="box" required>
            <input type="submit" value="Fazer Login" name="submit" class="form_btn">
            <p>Não tem uma conta? <a href="register.php">Cadastre aqui</a></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>