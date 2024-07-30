<?php
include ('../dataAccess/dataAccessLogic/Calculator.php');


/**
 * Web Service RESTful en PHP con MySQL (CRUD)
 * *
 */

 //Listar datos
 if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $objConexion = new ConexionDB();
    $objCalculator = new Calculator($objConexion);
    $array = $objCalculator->readCalculator();
    echo json_encode($array);
    exit;
}else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $numberOne = $_POST['numberOne'];
    $numberTwo = $_POST['numberTwo'];
    $result = $_POST['result'];
    $operation=$_POST['operation'];

    $objConexion = new ConexionDB();
    $objCalculator= new Calculator($objConexion);

    $objCalculator->setNumberOneCalculator($numberOne);
    $objCalculator->setNumberTwoCalculator($numberTwo);
    $objCalculator->setResultCalculator($result );
    $objCalculator->setOperationCalculator($operation);
    $objCalculator->addCalculator();
    exit;
}


//delete user
/*if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $idUser = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setIdUser($idUser);
    $objUser->deleteUser();
    $response = array('success' => true, 'message' => 'Usuario eliminado correctamente');
    exit;
}

// Add User
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $directorio="imagenes/";
    $nombreArchivo=$_FILES['photoUser']['name'];
    $rutaTemporal=$_FILES['photoUser']['tmp_name'];

    $rutaDefinitiva=$directorio.$nombreArchivo;

   

    if(!file_exists($directorio)){
        mkdir($directorio,0777);
    }

    move_uploaded_file($rutaTemporal,$rutaDefinitiva);
    
    
    
    $nameUser = $_POST['nameUser'];
    $lastnameUser = $_POST['lastnameUser'];
    $photoUser = $rutaDefinitiva;

    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setNameUser($nameUser);
    $objUser->setLastnameUser($lastnameUser);
    $objUser->setPhotoUser($photoUser);
    $objUser->addUser();
    exit;
}

//read user
else 

// Update User
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener los valores del objeto JSON
    $idUser = intval($data['idUser']);
    $nameUser = $data['nameUser'];
    $lastnameUser = $data['lastnameUser'];
    $photoUser = $data['photoUser'];

    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setIdUser($idUser);
    $objUser->setNameUser($nameUser);
    $objUser->setLastnameUser($lastnameUser);
    $objUser->setPhotoUser($photoUser);
    $objUser->updateUser();
    exit;
}
*/
// Si no coincide con ningún método de solicitud, devolver Bad Request
header("HTTP/1.1 400 Bad Request");