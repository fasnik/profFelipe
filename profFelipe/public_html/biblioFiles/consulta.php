<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once 'config.php';


$sql = 'SELECT * FROM Livros';
$q = $conn ->query($sql);

$rows = array();
while($row = $q->fetch_assoc())
{
    $rows[] = $row;
}
//$rows = json_encode($rows);
foreach ($rows as $row){
	foreach ($row as $value){
		echo $value; echo " ||"; 
		}
		echo "<br>";
	}
exit();

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
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
   	  <a href="form_insere_livro.php" class="btn btn-warning">Insere Livro</a>
        <a href="form_insere_revista.php" class="btn btn-danger">Insere Revista</a>
    </p>
    <p>	
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>