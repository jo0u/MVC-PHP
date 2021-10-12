<h1>Criar bloco de anotação</h1>

<?php
    if(!empty($data['mensagem'])):
        
        foreach($data['mensagem'] as $m):
            echo $m."<br>";
        endforeach;
    endif;
?>

<form action="/notes/criar" method="post" enctype="multipart/form-data">
    Titulo:
     <input type="text" name="titulo" required><br><br>
    Texto: <textarea name="texto" required></textarea><br><br>
    Imagem: <br> <input type="file" name="foo" value="" required /><br><br>
    <button name="cadastrar"> Cadastrar</button>
</form>