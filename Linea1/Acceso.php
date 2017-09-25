<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include_once 'Conexion.php';
        verificar_usuario();
    }
	
	
	function verificar_usuario()
    {
		
		$usuario =  ($_GET['usuario']);
		$password = ($_GET['password']);
		
        global $con;

		
		if ((!empty($usuario) and !empty($password)))
		{
		
				$sql = 'SELECT nombres_completo FROM tbpersona WHERE numero_documento="'.$usuario.'" AND password="'.$password.'" LIMIT 1;';

				$statement = $con->prepare($sql);
				$statement->execute();
				$rows_affect = $statement->rowCount();
				$array_persona = array();
				if ($rows_affect > 0) {
					while ($rows = $statement->fetch(PDO::FETCH_ASSOC)) {
						$array_persona[] = $rows;
					}
					header('Content-Type: application/json');
					echo json_encode(array('persona' => $array_persona));
				}else {
					$array_persona[] = array("nombres_completo"=>"ERROR-01");
					header('Content-Type: application/json');
					echo json_encode(array('persona' => $array_persona));
				}
		
		}else if ((!empty($usuario) or empty($password)) or (empty($usuario) or !empty($password))){
			$array_persona[] = array("nombres_completo"=>"ERROR-02");
			header('Content-Type: application/json');
			echo json_encode(array('persona' => $array_persona));
		}
		else{
			$array_persona[] = array("nombres_completo"=>"ERROR-02");
			header('Content-Type: application/json');
			echo json_encode(array('persona' => $array_persona));
		}

    }
 

?>
