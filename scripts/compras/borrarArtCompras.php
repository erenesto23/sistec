<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $no_compra = $_GET["no_compra"];
    $id = $_GET["id_compra"];

    $resultado = $conexion->query("delete from $empresa.tbl_art_compras where no_compra = $no_compra and id_compra = $id");

    header('location: ../../views/compras/frm_compras.php')
?>