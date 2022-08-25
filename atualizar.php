<var><h1>Atualizar Produto</h1></var>

<?php
    if (isset($_POST['atualizar'])) {
        $sql = "
            update produtos
            set nome = :nome
              , valor = :valor
              , grupo_id = :grupo
            where codigo = :codigo
        ";
        $atualizar = $conn->prepare($sql);
        if ($atualizar->execute(array(
            "nome" => $_POST['nome'],
            "valor" => $_POST['valor'],
            "grupo" => $_POST['grupo'],
            "IDProduto" => $_GET['id']
        ))) {
            echo "Dados atualizado com sucesso!";
        }
    }

    $sql = "select * from produtos where IDProduto = :id";
    $produto = $conn->prepare($sql);
    $produto->execute(array("id" => $_GET['id']));

    $linha = $produto->fetch();

?>
<form method="post">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $linha['NomeProduto']; ?>">
    <br>
    Valor: <br>
    <input type="text" name="valor" value="<?php echo $linha['PrecoUnitario']; ?>">
    <br>
    Grupo: <br>
    <select name="grupo">
        <?php
            $sql = "select * from produtos";
            $grupos = $conn->prepare($sql);
            $grupos->execute();
            while ($grupo = $grupos->fetch()) {
                if ($grupo['id'] == $linha['grupo_id']) {
                    echo "<option value=\"{$grupo['id']}\" selected>{$grupo['IDCategoria']}</option>";
                } else {
                    echo "<option value=\"{$grupo['id']}\">{$grupo['IDCategoria']}</option>";
                }
            }
        ?>
        
    </select>

    <input type="submit" name="atualizar" value="Atualizar">
</form>