<?php
    
    namespace App;

    class Pagination extends Core\App{
        public $dados;
        public $atual;
        public $quantidade;
        public $registrosPaginas;
        public $contar;
        public $resultado;

        public function __construct($dados,$atual,$quantidade){
            $this->dados =  $dados;
            $this->atual = $atual;
            $this->quantidade = $quantidade;
        }

        public function resultado(){
            $this->registrosPaginas = array_chunk($this->dados,$this->quantidade);
            $this->contar = count($this->registrosPaginas);
          
            if($this->contar > 0):
                $this->resultado = $this->registrosPaginas[$this->atual-1];
                return $this->resultado;
            else:
                return[];
            endif;
            
        }


        public function navigator(){
          echo "<ul class='pagination'>" ;
          for($i = 1; $i <= $this->contar; $i++):
            if($i == $this->atual):
                echo "<li class = 'active'><a href='#'>".$i."</a></li>";
            else:
                echo "<li><a href='".$this->currentURL()."?page=".$i."'>".$i."</a></li>";
            endif;
        endfor;
          echo "</ul>";
        }



    }



?>