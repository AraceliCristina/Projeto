<var><h1> Cadastro de Fornecedores</h1></var>
<?php

if(isset ($_POST['gravar'])){
    $sql = "INSERT into produtos(idfornecedor, nomecampanha ,nomecontato , titulocontato , endereco , cidade , regiao , cep , pais , telefone, fax, website)
        values (:idfornecedor, :nomecampanha , :nomecontato , :titulocontato , :endereco , :cidade , :regiao , :cep , :pais , :telefone, :fax, :website)";

    $consulta = $conn->prepare($sql);
    $consulta->execute (
         array("fornecedor"  =>$_POST['id_fornecedor'],
         "campanha"          =>$_POST['nome_campanha'],
         "contato"           =>$_POST['nome_contato'],
         "titulo"            =>$_POST['titulo_contato'],
         "endereco"          =>$_POST['endereco'],
         "cidade"            =>$_POST['cidade'],
         "regiao"            =>$_POST['regiao'],
         "cep"               =>$_POST['cep'],
         "pais"              =>$_POST['pais'],
         "telefone"          =>$_POST['telefone'],
         "fax"               =>$_POST['fax'],
         "website"           =>$_POST['website'])
    );
}

?>
<form method="post">
    Fornecedor:
    <input type="text" name="id_fornecedor">
    <br><br>
    Campanha:
    <input type="text" name="nome_campanha">
    <br><br>
    Contato:
    <input type="text" name="nome_contato">
    <br><br>
    Título:
    <input type="text" name="titulo_contato">
    <br><br>
    Endereço:
    <input type="text" name="endereco">
    <br><br>
    Cidade:
    <input type="text" name="cidade">
    <br><br>
    Região:
    <input type="text" name="regiao">
    <br><br>
    Cep:
    <input type="text" name="cep">
    <br><br>
    País:
    <input type="text" name="pais">
    <br><br>
    Telefone:
    <input type="text" name="telefone">
    <br><br>
    Fax:
    <input type="text" name="fax">
    <br><br>
    Website:
    <input type="text" name="website">
    <br><br>
   
    <br>
    <br>
    <input class="btn btn-primary" type="submit" value= "Gravar">

</form>