<?php

    header('Content-Type: application/json');//Se decalara que es una plicacion .json

    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");

    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos = $categoria->get_categoria();
            echo json_encode($datos);
        break;
        case "GetId":
            $datos = $categoria->get_categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
        break;
        case "Insert":
            $datos = $categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo "Correcto....";
        break;
        case "Update":
            $datos = $categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo "Execution of Insert Successful";
        break;
        case "Delete":
            $datos = $categoria->delete_categoria($body["cat_id"]);
            echo "Delete Information Successful";
        break;
        case "UpdateEstado":
            $datos = $categoria->update_estado_categoria($body["cat_id"]);
            echo "Estado updated Successful";
        break;
    }
?>