<h1>LISTAGEM DE PRODUTOS</h1>
<?php
    $dados = $conn->query('SELECT * FROM produtos');
    $dados->execute();
?>
<?php
    $sql= "SELECT p.idproduto, p.nomeproduto, p.idfornecedor, p.idcategoria, p.quantidadeporunidade, p.precounitario, p.unidadesemestoque, p.unidadesemordem, p.niveldereposicao, p.descontinuado
    FROM produtos p
    inner join produtos_grupos pg on (p.grupo_id=pg.id)";
    $consulta = $conn->prepare($sql);
    
    ?>

<table class="table table-striped table-bordered">
    <tr>
        <td>Código</td>
        <td>Produtos</td>
        <td>Fornecedor</td>
        <td>Categoria</td>
        <td>Quantidade por Unidade</td>
        <td>Preço Unitário</td>
        <td>Unidades em Estoque</td>
        <td>Unidades em Ordem</td>
        <td>Nível de Reposição</td>
        <td>Descontinuado</td>
        <td>Ações</td>
    </tr>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['IDProduto']; ?></td>
                    <td><?php echo $linha['NomeProduto']; ?></td>
                    <td><?php echo $linha['IDFornecedor']; ?></td>
                    <td><?php echo $linha['IDCategoria']; ?></td>
                    <td><?php echo $linha['QuantidadePorUnidade']; ?></td>
                    <td><?php echo $linha['PrecoUnitario']; ?></td>
                    <td><?php echo $linha['UnidadesEmEstoque']; ?></td>
                    <td><?php echo $linha['UnidadesEmOrdem']; ?></td>
                    <td><?php echo $linha['NivelDeReposicao']; ?></td>
                    <td><?php echo $linha['Descontinuado']; ?></td>
                    
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $linha['IDProduto']; ?>">
                            <input type="submit" class="btn btn-danger" name="deletar" value="Deletar">
                        </form>
                        <a href="?pagina=atualizar&id=<?php echo $linha['IDProduto']; ?>" class="btn btn-primary">Atualizar</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>