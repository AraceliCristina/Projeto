<h1>Cadastro de Produtos</h1>
<?php
    $dados = $conn->query('SELECT * FROM produtos');
    $dados->execute();
?>
<?php

if (isset ($_POST['gravar'])){
    $sql= "INSERT into produtos (p.idproduto, p.nomeproduto, p.idfornecedor, p.idcategoria, p.quantidadeporunidade, p.precounitario, p.unidadesemestoque, p.unidadesemordem, p.niveldereposicao, p.descontinuado)
        values (:p.idproduto, :p.nomeproduto, :p.idfornecedor, :p.idcategoria, :p.quantidadeporunidade, :p.precounitario, :p.unidadesemestoque, :p.unidadesemordem, :p.niveldereposicao, :p.descontinuado)";
    $consulta = $conn->prepare($sql);
    $consulta->execute (
         array("produto"        =>$_POST['p.idproduto'],
         "nome"                 =>$_POST['p.nomeproduto'],
         "fornecedor"           =>$_POST['p.idfornecedor'],
         "categoria"            =>$_POST['p.idcategoria'],
         "quantidadeporunidade" =>$_POST['p.quantidadeporunidade'],
         "precounitario"        =>$_POST['p.precounitario'],
         "unidadesemestoque"    =>$_POST['p.unidadesemestoque'],
         "unidadesemordem"      =>$_POST['p.unidadesemordem'],
         "niveldereposicao"     =>$_POST['p.niveldereposicao'],
         "descontinuado"        =>$_POST['p.descontinuado'])
    );
}
    ?>

<form method="post">
    Produto:
    <input type="text" name="id_fornecedor">
    <br><br>
    Nome:
    <input type="text" name="nome_campanha">
    <br><br>
    Categoria:
    <input type="text" name="titulo_contato">
    <br><br>
    Quantidade por Unidade:
    <input type="text" name="endereco">
    <br><br>
    Preço Unitário:
    <input type="text" name="cidade">
    <br><br>
    Unidades em Estoque:
    <input type="text" name="regiao">
    <br><br>
    Unidades em Ordem:
    <input type="text" name="cep">
    <br><br>
    Nível de Reposição:
    <input type="text" name="pais">
    <br><br>
    Descontinuado:
    <input type="text" name="telefone">
    <br><br>
   
      
    Fornecedor:
    <select  name="northwind">
        <?php
            $sql = "SELECT * from fornecedores";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch()){
                echo "<option value=\"{$linha['IdFornecedor']}\">{$linha['NomeCompanhia']}</option>";
            }
        ?>
 
    </select>
    <br>
    <br>
    <input class="btn btn-primary" type="submit" value= "Gravar">

</form>

    
                    </td>
                </tr>
            <?php
        
    ?>
</table>
<?php



