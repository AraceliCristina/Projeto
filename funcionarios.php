<h1>Tabela de Funcionários</h1>
<?php
    $dados = $conn->query('SELECT * FROM funcionarios');
    $dados->execute();
?>
<?php
    $sql= "SELECT f.idfuncionario f.nome, f.titulo, f.titulocortesia, f.datanac, f.dataadmissao, f.endereco, f.cidade, f.regiao, f.Cep , f.pais, f.telefoneresidencial, f.extensao, f.notas, f.reportase, f.fotocaminho
    FROM funcionarios f
    inner join funcionarios_grupos pg on (f.idfuncionario_id=pg.id)";
    $consulta = $conn->prepare($sql);
    
    ?>

<table class="table table-striped table-bordered">
    <tr>
        <td>ID Funcionário</td>
        <td>Sonbenome</td>
        <td>Nome </td>
        <td>Título </td>
        <td>Título Cortesia</td>
        <td>Data de Nascimento</td>
        <td>Data de Admissão</td>
        <td>Endereço</td>
        <td>Cidade</td>
        <td>Região</td>
        <td>Cep</td>
        <td>Pais</td>
        <td>Telefone Residencial</td>
        <td>Extensão</td>
        <td>Notas</td>
        <td>Reportase</td>
        <td>Foto Caminho</td>
      
    </tr>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['IDFuncionario']; ?></td>
                    <td><?php echo $linha['Sobrenome']; ?></td>
                    <td><?php echo $linha['Nome']; ?></td>
                    <td><?php echo $linha['Titulo']; ?></td>
                    <td><?php echo $linha['TituloCortesia']; ?></td>
                    <td><?php echo $linha['DataNac']; ?></td>
                    <td><?php echo $linha['DataAdmissao']; ?></td>
                    <td><?php echo $linha['Endereco']; ?></td>
                    <td><?php echo $linha['Cidade']; ?></td>
                    <td><?php echo $linha['Regiao']; ?></td>
                    <td><?php echo $linha['Cep']; ?></td>
                    <td><?php echo $linha['Pais']; ?></td>
                    <td><?php echo $linha['TelefoneResidencial']; ?></td>
                    <td><?php echo $linha['Extensao']; ?></td>
                    <td><?php echo $linha['Notas']; ?></td>
                    <td><?php echo $linha['Reportase']; ?></td>
                    <td><?php echo $linha['FotoCaminho']; ?></td>
                  
                    

                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $linha['IDFuncionario']; ?>">
                            <input type="submit" class="btn btn-danger" name="deletar" value="Deletar">
                        </form>
                        <a href="?pagina=atualizar&id=<?php echo $linha['IDFuncionario']; ?>" class="btn btn-primary">Atualizar</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>