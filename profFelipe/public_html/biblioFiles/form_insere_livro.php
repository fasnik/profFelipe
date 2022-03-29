<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

$nomelivro="";
$anolivro="";
$catlivro="";
$displivro=0;
$sucesso="";

$nomelivroerr="";
$anolivroerr="";
$catlivroerr="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty(trim($_POST["nomeLivro"]))){
        $nomelivroerr = "O nome do livro é obrigatório.";
	} else{
        // Prepare a select statement
        $sql = "SELECT idLivro FROM Livros WHERE nomeLivro = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_nomelivro);
            
            // Set parameters
            $param_nomelivro = trim($_POST["nomeLivro"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $nomelivroerr = "Já existe um livro com esse nome cadastrado.";
                } else{
                    $nomelivro = trim($_POST["nomeLivro"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
	if(empty(trim($_POST["anoLivro"]))){
        $anolivroerr = "O ano do livro é obrigatório.";
	} else
	 {$anolivro = $_POST["anoLivro"];}
	if(empty(trim($_POST["catLivro"]))){
        $catlivroerr = "A categoria do livro é obrigatória.";
	}else
	 {$catlivro = $_POST["catLivro"];}
	 if(isset($_POST["dispLivro"])){
		 $displivro = $_POST["dispLivro"];
		}
	if(empty($nomelivroerr) && empty($anolivroerr) && empty($catlivroerr)){
			
        // Prepare an insert statement
        $sql = "INSERT INTO Livros (nomeLivro, anoLivro, catLivro, dispLivro) VALUES (?, ?, ?, ?)";
         
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_nomelivro, $param_anolivro,$param_catlivro,$param_displivro);
            
            // Set parameters
             $param_nomelivro=$nomelivro; 
             $param_anolivro=$anolivro;
             $param_catlivro=$catlivro;
             $param_displivro=$displivro;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
					$sucesso = "Livro inserido com sucesso!" ;          
            } else {
					$sucesso= "Livro não inserido. Verifique seus dados";            
            }
            // Close statement
            $stmt->close();
        }
    }
    // Close connection
    $conn->close();
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


<h1> Insere novo livro no cadastro</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<p>
<label for="nomeLivro">Título</label>
<input type="text" name="nomeLivro" />
 <span class="help-block"><?php echo $nomelivroerr; ?></span>
</p>

<p>
<label for="anoLivro">Ano</label>
<input type="date" name="anoLivro" />
 <span class="help-block"><?php echo $anolivroerr; ?></span>
</p>

<p>
<label for="catLivro">Categoria</label>
<input type="text" name="catLivro" />
 <span class="help-block"><?php echo $catlivroerr; ?></span>
</p>

<p>
<label for="dispLivro">Disponível?</label>
<input type="checkbox" name="dispLivro" value="1" />
</p>

<input type="submit" name="inserir" value="Inserir" />
<input type="reset" name="cancel" value="Cancela" />
<span class="help-block"><?php echo $sucesso; ?></span>
</form>

</body>
</html>