<?php
require_once '../config/ConnectionDB.php';
require_once '../repositories/DistritoRepository.php';
require_once '../repositories/UsuarioRepository.php';

$distritoRespository = new DistritoRepository();
$usuarioRepository = new UsuarioRepository();

function responseJSON($status, $json): void {
    http_response_code($status);
    echo json_encode($json);
    exit;
}

if( isset($_GET['distritos_by_provincia_valor']) ) {
    $valor = $_GET['distritos_by_provincia_valor'];
    $data = $distritoRespository->getAllById($valor);

    if(empty( $data )) {
        responseJSON(404, ['error' => 'No se encontraron distritos con provincia: '.$valor]);
    }

    responseJSON(200, $data);
}

if( isset( $_GET['editar_usuario_by_id'] ) ) {
    $id = $_GET['editar_usuario_by_id'];

    $datos = [
        'nombre' => $_GET['nombre'],
        'apellido' => $_GET['apellido'],
        'email' => $_GET['email']
    ];
    
    if($usuarioRepository->updateUsuario($id, $datos)) {
        responseJSON(200, ['msg' => 'Datos editados correctamente']);
    }

    responseJSON(400, ['msg' => 'No se pudo editar']);
} 



responseJSON(404, ['error' => 'El recurso no se encuentra en el API']);