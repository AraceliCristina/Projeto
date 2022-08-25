<h1>LISTAGEM DE FORNECEDORES</h1>
<?php
    $dados = $conn->query('SELECT * FROM fornecedores');
    $dados->execute();
?>
<?php
    $sql= "SELECT f.idfornecedor, f.nomecampanhia, f.nomecontato, f.titulocontato, f.endereco, f.cidade, f.regiao, f.cep, f.pais, f.telefone, f.fax, f.website
    inner join produtos_grupos pg on (p.grupo_id=pg.id)";
    $consulta = $conn->prepare($sql);
    
    ?>

<table class="table table-striped table-bordered">
    <tr>
        <td>ID Fornecedor</td>
        <td>Nome Campanhia</td>
        <td>Nome Contato</td>
        <td>Título Contato</td>
        <td>Endereço/td>
        <td>Cidade</td>
        <td>Região</td>
        <td>Cep</td>
        <td>País</td>
        <td>Telefone</td>
        <td>Fax</td>
        <td>Website</td>
    </tr>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['IDFornecedor']; ?></td>
                    <td><?php echo $linha['NomeCompanhia']; ?></td>
                    <td><?php echo $linha['NomeContato']; ?></td>
                    <td><?php echo $linha['TItuloContato']; ?></td>
                    <td><?php echo $linha['Endereco']; ?></td>
                    <td><?php echo $linha['Cidade']; ?></td>
                    <td><?php echo $linha['Regiao']; ?></td>
                    <td><?php echo $linha['cep']; ?></td>
                    <td><?php echo $linha['Pais']; ?></td>
                    <td><?php echo $linha['Telefone']; ?></td>
                    <td><?php echo $linha['Fax']; ?></td>
                    <td><?php echo $linha['Website']; ?></td>

                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $linha['IDFornecedor']; ?>">
                            <input type="submit" class="btn btn-danger" name="deletar" value="Deletar">
                        </form>
                        <a href="?pagina=atualizar&id=<?php echo $linha['IDFornecedor']; ?>" class="btn btn-primary">Atualizar</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>