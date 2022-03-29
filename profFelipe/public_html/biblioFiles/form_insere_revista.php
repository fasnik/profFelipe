<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>


<h1> Insere nova revista  no cadastro</h1>
<form action="action_login.php" method="POST">
<p>
<label for="nomeRevista">Título</label>
<input type="text" name="nomeRevista" />
</p>

<p>
<label for="anoRevista">Ano</label>
<input type="text" name="anoRevista" />
</p>

<p>
<label for="catRevista">Categoria</label>
<input type="text" name="catRevista" />
</p>

<input type="submit" name="inserir" value="Inserir" />
<input type="submit" name="cancel" value="Cancela" />


</form>

</body>
</html>