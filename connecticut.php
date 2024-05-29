<?php
    class crudygobert{
        public static function connect()
        {
           try {
            $con=new PDO('mysql:localhost=host; dbname=crudy','root','');
            return $con;
           } catch (PDOException $error1) {
                echo 'Something went wrong, with you conection!'.$error1->getMessage();
           }catch (Exception $error2){
                 echo 'Generic error!'.$error2->getMessage();
           }
        }
        public static function Selectdata()
        {
            $data=array();
            $p=crudygobert::connect()->prepare('SELECT * FROM crudtable');
            $p->execute();
           $data=$p->fetchAll(PDO::FETCH_ASSOC);
           return $data;
        }
        public static function delete($id)
        {
            $p=crudygobert::connect()->prepare('DELETE FROM crudtable WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        }
public static function userDataPerId($id)
{
    $data=array();
    $p=crudygobert::connect()->prepare('SELECT * FROM crudtable WHERE id=:id');
    $p->bindValue(':id',$id);
    $p->execute();
   $data=$p->fetch(PDO::FETCH_ASSOC);
   return $data;
}




    }





?>