<?php
    if (ISSET($_post['deletar'])) {
        $sql = "delete from produtos where produto= ;produto";
        $parse = $conn->prepare($sql);
        $parse -> execute (array("produto"=> $_GET['produto']));
    }
?>
<h1>Deletar Produto</h1>

<?php
    $sql = "select * from produtos where produto = :produto";
    $consulta = $conn->prepare($sql);
    $consulta->execute (array("produto" => $_GET['produto']));

    $linha = $consulta->fetch();

 
?>
<form method = "post">
    <input type= "hidden" name = "produto">
    <input type= "submit" name = "deletar" value= "Deletar">
</form>
