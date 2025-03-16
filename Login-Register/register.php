<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conection,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    
    $select = "SELECT * FROM users WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conection,$select);
    if(mysqli_num_rows($result)>0){
        $error[] = 'Esse usuário já existe.';
    }
    else{
        if($pass!=$cpass){
            $error[] = 'as senhas são diferentes!';
        }
        else{
            $insert = "INSERT INTO users(email,password) VALUES('$email','$pass')";
            mysqli_query($conection,$insert);
            header('location:login.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form_container">
        <form action="" method="post">
            <h3>Cadastro</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error_msg">'.$error.'</span>';
                }
            }
            ?>
            <input type="email" name="email" id="email" placeholder="Digite seu email" class="box" required>
            <input type="password" name="password" id="password" placeholder="Digite sua senha" class="box" required>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirme sua senha" class="box" required>
            <input type="submit" value="Cadastrar" name="submit" class="form_btn">
            <p>Já tem uma conta? <a href="login.php">Faça Login</a></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>