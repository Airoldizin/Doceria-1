<?php
include_once 'DB.php';

class ItemDAO {
    
    public function list($id = null) {
        $where = ($id ? "where it.iditem = $id":"");
        $query = "SELECT it.iditem, it.nome, ig.descricao, it.validade, it.valor 
                    FROM ingredientes ig
                        INNER JOIN item it 
                            ON it.idingredientes = ig.idingredientes $where;";//inner join une campos com semelhanças de outras classes
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Item $obj){
        $query = "INSERT INTO item (iditem, nome, validade, valor, idingredientes)
                    VALUES (NULL, :pnome, :pvalidade, :pvalor, :pidingredientes)";
        $conn = DB::getInstancia()->query($query);
        $conn->execute(array(':pnome'=>$obj->nome,
                                ':pvalidade'=>$obj->validade,
                                    ':pvalor'=>$obj->valor,
                                        ':pidingredientes'=>$obj->idingredientes));
        return $conn->rowCount()>0;
    }
    
    public function update(Item $obj){
        $query = "UPDATE item 
                    SET nome = :pnome, validade = :pvalidade, valor = :pvalor, idingredientes = :pidingredientes 
                        WHERE iditem = :piditem";
        $conn = DB::getInstancia()->query($query);
        $conn->execute(array(':pnome'=>$obj->nome,
                                ':pvalidade'=>$obj->validade,
                                    ':pvalor'=>$obj->valor,
                                        ':pidingredientes'=>$obj->idingredientes,
                                            ':piditem'=>$obj->iditem));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE FROM item
                  WHERE iditem = :pid";
        $conn = DB::getInstancia()->query($query);
        $conn->execute(array(':pid'=>$obj->iditem));
        return $conn->rowCount()>0;
    }
}
?>
