<?php include("../base.php");

?>
<link rel="stylesheet" href="../../css/administracion.css">
<?php if($permisos['usuarios']== 1){ ?><ul class="list-group">
  <li class="list-group-item active" style="background-color:#17a2b8;">Usuarios</li>
  <?php if($permisos['agregar_user']== 1){ ?><a href="../usuarios/nuevo_usuario.php"><li class="list-group-item" ><i class="fa fa-plus-circle"></i> Agregar</li></a><?php }?>
  <?php if($permisos['ver_user']== 1){ ?><a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver usuarios</li></a><?php } ?>
  <a href="../usuarios/reportes_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php }?>

<?php if($permisos['roles']== 1){ ?> <ul class="list-group">
  <li class="list-group-item" style="background-color:rgb(87, 220, 200); color:white;">Roles</li>
<?php if($permisos['agregar_roles']== 1){ ?><a href="crear_rol.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a><?php } ?>
<?php if($permisos['ver_roles']== 1){ ?><a href="ver_roles.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver Roles</li></a><?php } ?>
</ul>
<?php } ?>

<?php if($permisos['empresa']== 1){ ?><ul class="list-group" >
  <li class="list-group-item superior"  style="background-color:#125c67;color:white;">Mi empresa</li>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-pencil"></i> Información</li></a>
  <a href="../usuarios/lista_usuarios.php"> <li class="list-group-item"><i class="fa fa-picture-o"></i> Logo</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-text-width"></i> slogan</li></a>
</ul>
<?php } ?>

<?php if($permisos['cod_impuestos']== 1){ ?><ul class="list-group">
  <li class="list-group-item" style="background-color:#0e444c; color:white;">Códigos de impuestos</li>
  <li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a>
  <li class="list-group-item"><i class="fa fa-eye"></i> Ver códigos</li></a>
  <li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php } ?>

<?php if($permisos['almacenes']== 1){ ?><ul class="list-group" >
  <li class="list-group-item " style="background-color:#882f88; color:white">Almacenes</li>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver almacenes</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php } ?>

<?php if($permisos['categorias']== 1){ ?><ul class="list-group" >
  <li class="list-group-item " style="background-color:rgb(87, 220, 200); color:white;">Categorías</li>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver categorias</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php } ?>

<ul class="list-group" >
  <li class="list-group-item " style="background-color:#882f88; color:white;">Comprobantes fiscales</li>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item">Proveedor informal</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item">Gubernamental</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item">Consumidor final</li></a>
</ul>
<?php if($permisos['condiciones_p']== 1){ ?><ul class="list-group" >
  <li class="list-group-item active" style="background-color:#17a2b8;">Condición de pago</li>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver condiciones de pago</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> reportes</li></a>
</ul>
<?php } ?>