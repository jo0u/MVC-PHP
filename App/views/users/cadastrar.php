<h1>Cadastrar usuário</h1>

<?php
    if(!empty($data['mensagem'])):
        
        foreach($data['mensagem'] as $m):
            echo $m."<br>";
        endforeach;
    endif;
?>

<form action="/users/cadastrar" method="post">
    Nome: <input type="text" name="nome"><br><br>
    Email: <input type="text" name="email"><br><br>
    Senha: <input type="password" name="senha"><br><br>
    <br><br>
    <button name="cadastrar"> Cadastrar</button>
</form>