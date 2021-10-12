<?php
    

    use  App\Core\Model;

    class Note extends Model{

        public $titulo;
        public $texto;
        public $image;



        public function getAll(){
            
            $sql = "SELECT * FROM notes";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->execute();
            
            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
                return $resultado;

            else:
                return [];
            endif;
        }


        public function findId($id){
            $sql = "SELECT * FROM notes WHERE id = ?";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            
            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetch(\PDO::FETCH_ASSOC); 
                return $resultado;

            else:
                return [];
            endif;
        }

        public function save(){

            $sql = "INSERT INTO notes(titulo,texto,imagem) VALUES (?,?,?)";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1,$this->titulo);
            $stmt->bindValue(2,$this->texto);
            $stmt->bindValue(3,$this->imagem);

            if($stmt->execute()):
                return "Cadastrado com sucesso !";
            else:
                return "erro ao cadastrar";
            endif;


        }

        public function update($id){
            $sql = "UPDATE notes SET titulo = ?, texto = ? WHERE id = ?";    
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1,$this->titulo);
            $stmt->bindValue(2,$this->texto);
            $stmt->bindValue(3,$id);


            if($stmt->execute()):
                return "Atualizado com sucesso !";
            else:
                return "Erro ao atualizar";
            endif;
        }



        public function updateImagem($id){
            $sql = "UPDATE notes SET titulo = ?, texto = ?, imagem = ? WHERE id = ?";    
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1,$this->titulo);
            $stmt->bindValue(2,$this->texto);
            $stmt->bindValue(3,$this->image);
            $stmt->bindValue(4,$id);

            if($stmt->execute()):
                return "Atualizado com sucesso !";
            else:
                return "Erro ao atualizar";
            endif;
        }


        public function deleteImage($id){
            $sql = "UPDATE notes SET imagem = ? WHERE id = ?";    
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, "");
            $stmt->bindValue(2, $id);


            if($stmt->execute()):
                return "Imagem excluida com sucesso !";
            else:
                return "Erro ao Excluir";
            endif;
        }











      public function delete($id){
        // buscar a imagem salva para excluir

            $resultado= $this->findId($id);
            
                 
            if(!empty($resultado['imagem'])):
                unlink("uploads/".$resultado['imagem']);
            endif;

            
/******************************************************************************* */



        $sql = "DELETE FROM notes WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1,$id);

        if($stmt->execute()):
            return "Excluido com sucesso!";
        else:
            return "Erro ao Excluir";
        endif;
      }



      public function search($search){
        $sql = "SELECT * FROM notes WHERE titulo LIKE ? COLLATE utf8_general_ci";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1,"%{$search}%");
        $stmt->execute();
        
        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;

        else:
            return [];
        endif;
    }

    }


?>