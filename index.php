<?php
     session_start();

     if (isset($_GET['pagina'])) {
         if ($_GET['pagina'] == 'logout') {
             session_destroy();
             session_start();
             header("Location: ?pagina=produtos_listagem");
         }
     }

    include_once ('conexao.php');
    include_once('sql.php');
    include_once('autenticar.php');
  
        if (isset($_SESSION['autenticado'])){
            if(isset($_GET['pagina'])){
                //buscar no banco de dadoos se a página requisitada existe
                $sql = "SELECT * 
                FROM  paginas 
                WHERE id= :id
                ";

                $consulta = $conn->prepare($sql);
                $consulta->execute(array("id"=>$_GET['pagina']));
                $linha = $consulta->fetch();
                if ($consulta->rowCount() > 0){                    
                    include "menu.php";
                    include $linha['src'];
                }else{
                    include '404.php';
                }
                
            }else{
                include 'login.php';
            }
        }else{
                include 'login.php';
            }
               
/** 
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'p_lista'){
                    include('listagem.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'p_cadastro'){
                    include('cadastro.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'p_delete'){
                    include('deletar.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'p_atualizar'){
                    include('atualizar.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'f_cadastrop'){
                    include('cadastrop.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'f_lista'){
                    include('listagemp.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'c_clientes'){
                    include('clientes.php');
                }
                if(isset($_GET['pagina'])&& $_GET['pagina']== 'f_funcionarios'){
                    include('funcionarios.php');
                }*/

        ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>