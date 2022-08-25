<h1>Tabela de Clientes</h1>
<?php
    $dados = $conn->query('SELECT * FROM clientes');
    $dados->execute();
?>
<?php
    $sql= "SELECT c.idcliente, c.nomecompanhia, c.nomecontato, c.titulocontato, c.endereço, c.cidade, c.regiao, c.cep, c.pais, c.telefone, c.fax
    FROM clientes c
    inner join clientes pg on (c.idclientes=pg.id)";
    $consulta = $conn->prepare($sql);
    
    ?>

<table class="table table-striped table-bordered">
    <tr>
        <td>ID Cliente</td>
        <td>Nome Companhia</td>
        <td>Nome Contato</td>
        <td>Título Contato</td>
        <td>Endereço</td>
        <td>Cidade</td>
        <td>Região</td>
        <td>CEP</td>
        <td>Pais</td>
        <td>Telefone</td>
        <td>Fax</td>
        <td>Ações</td>
    </tr>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['IDCliente']; ?></td>
                    <td><?php echo $linha['NomeCompanhia']; ?></td>
                    <td><?php echo $linha['NomeContato']; ?></td>
                    <td><?php echo $linha['TituloContato']; ?></td>
                    <td><?php echo $linha['Endereco']; ?></td>
                    <td><?php echo $linha['Cidade']; ?></td>
                    <td><?php echo $linha['Regiao']; ?></td>
                    <td><?php echo $linha['CEP']; ?></td>
                    <td><?php echo $linha['Pais']; ?></td>
                    <td><?php echo $linha['Telefone']; ?></td>
                    <td><?php echo $linha['Fax']; ?></td>
                    
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $linha['IDCliente']; ?>">
                            <input type="submit" class="btn btn-danger" name="deletar" value="Deletar">
                        </form>
                        <a href="?pagina=atualizar&id=<?php echo $linha['IDCliente']; ?>" class="btn btn-primary">Atualizar</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>