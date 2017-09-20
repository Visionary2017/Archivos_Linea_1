<?php  

try {
  $db = new PDO('mysql:host=db4free.net;port=3307;dbname=bdlinea1;charset=utf8mb4', 'adminlinea1', 'AdminLinea1');
  echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
} catch(PDOException $ex) {
  echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
}

?>