<nav>
    <div class="nav-wrapper">
      <form method="POST" action="/home/buscar">
        <div class="input-field">
          <input id="search" name="search" type="search"  required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

<div class="row container">
<?php
    if(!empty($data['mensagem'])):
        
        foreach($data['mensagem'] as $m):
            echo $m."<br>";
        endforeach;
    endif;
?>

<div class = "row container">
    <?php
        //Paginação

        $pagination = new App\Pagination($data['registros'],isset($_GET['page']) ? $_GET['page'] : 1, 2);
    ?>

<?php
    //nenhum registro
    if(empty($pagination->resultado())):
        echo "Nenhum registro encontrado!";
    endif;
?>
<?php
    foreach($pagination->resultado() as $note):
?>

<div class="row">

    <img style="float:left; margin:0 15px 15px 0;" src="<?php echo URL_BASE;?>/uploads/<?php echo $note['imagem'];?>" width="300" alt="Imagem">
<h3 class="ligth"> <a href="/notes/ver/<?php echo $note['id'];?>"><?php echo $note['titulo'];?></a></h3>
<p><?php echo $note['texto'];?></p>

<?php
        if(isset($_SESSION['logado'])):
    ?>
<a class="waves-effect waves-light btn orange" href="/notes/editar/<?php echo $note['id'];?>">Editar</a> 
<a class="waves-effect waves-light btn red" href="/notes/excluir/<?php echo $note['id'];?>">Excluir</a>

<?php endif; ?>
        </div>
<?php
    endforeach;?>
    
    <?php
        //Navegação
        $pagination->navigator();
    ?>
</div>


