<?php
    if (isset($_POST['salvar'])) {

        $uploaddir = 'arquivos/';
        $uploadfile = $uploaddir . floor(microtime(true) * 1000)."-".basename($_FILES['userfile']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Arquivo válido e enviado com sucesso.\n";
            echo "<img width=\"300px\" src=\"$uploadfile\">";
        } else {
            echo "Possível ataque de upload de arquivo!\n";
        }
    }
?>

<form method="POST" enctype="multipart/form-data">
    Enviar esse arquivo: 
    <input name="userfile" type="file" />
    <input type="submit" name="salvar" value="Enviar arquivo" />
</form>