<?php
    if (isset($_POST['autenticar']) &
        !empty($_POST['login']) &
        !empty($_POST['senha']) 
    ) {
        $sql= "SELECT *
               FROM usuarios
               WHERE login= :login
                AND senha = md5 (:senha)
        ";

        $consulta = $conn->prepare($sql);
        $resultado = $consulta->execute(
            array("login" => $_POST['login'],
                "senha" => $_POST['senha']
            )
        );
        $usuario = $consulta->fetch();
        if($consulta->rowCount() > 0) {
            if ($usuario['login'] == $_POST['login']) {
                $_SESSION['autenticado'] = true;
                header("Location: ?pagina=produtos_listagem"); 
            }
        
        } else {
            echo "Usuário não encontrado";
        }
    }
   
?>