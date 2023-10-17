<?php
include '../config/ConnectionDB.php';
include '../repositories/DistritoRepository.php';
$distritoRespository = new DistritoRepository();

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




responseJSON(404, ['error' => 'El recurso no se encuentra en el API']);