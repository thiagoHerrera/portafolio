<?php
        try{
            $cfg = "mysql:host=localhost;dbname=restaurante;port3306";
            $cnx = new PDO($cfg, 'root', '');
            #print 'conexion exitoza';
        }catch(PDOException $e){
            print $e->getmessage();
        }
?>