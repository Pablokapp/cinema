<?php
    include('conexao.php');

    if(isset($_POST['email'])  || isset($_POST['senha'])){

        if(strlen($_POST['email']) == 0){
             echo"Preencha seu e-mail";
       } else if(strlen($_POST['senha']) == 0){
             echo "Preencha sua senha";
       } else {
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM cadastro WHERE email = '$email' AND sennha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falaha na execução do codigo SQL:".mysqli-error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){

                $cadastro = $sqlquery->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();

                }

                $_SESSION['id'] = $cadastro['id'];
                $_SESSION['nome'] = $cadastro['nome'];

                header("Location: index.php");





            } else{
                echo"Falha ao logar! E-mail ou senha incorreto";
            }       
       }

       
    }



    ?>