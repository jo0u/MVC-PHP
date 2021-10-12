<h1>Editar bloco de anotação</h1>

<?php
    if(!empty($data['mensagem'])):
        
        foreach($data['mensagem'] as $m):
            echo $m."<br>";
        endforeach;
    endif;
?>



<form action="/notes/editar/<?php echo $data['registros']['id'];?>" method="post" enctype="multipart/form-data">
    Titulo:
     <input required type="text" name="titulo" value="<?php echo $data['registros']['titulo'];?>"><br><br>
    Texto: <textarea required name="texto" ><?php echo $data['registros']['texto'];?></textarea><br><br>
    <?php
        if(!empty($data['registros']['imagem'])):
            ?>
        <button name="deletarImagem" class = "btn orange"> Deletar imagem</button>

        <?php
            else:
        ?>
       Imagem: <input type="file" name="foo" value="" required />
    <?php
        endif;
    ?>
    <br>
    <br>
    <button name="atualizar"> Atualizar</button>
</form>

