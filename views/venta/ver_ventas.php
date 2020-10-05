<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista" class="buscar">
<h2>Listado de ventas</h2>
<form action="" method="post">
    <div class="form-row">
        <div class="form-group col-md-4">
        <label>Desde</label>
            <input class="form-control"  type="date" name="desde">
        </div>
        <div class="form-group col-md-4" >
            <label>Hasta</label>
            <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
        </div>
       
        <div class="form-group col-md-2">
            <label>Num. factura</label>
            <input class="form-control"  type="number" placeholder="Factura" name="filtro">
        </div>
        <div class="form-group col-md-2">
        <label>.</label>
            <input type="submit" class="btn btn form-control" id="buscar" value="Buscar">
        </div>
    </div>
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Factura</th>
      <th scope="col" width="20%">Cliente</th>
      <th scope="col">Comprobante</th>
      <th scope="col">Forma de pago</th>
      <th scope="col">Condición de pago</th>
      <th scope="col">Ver</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    
    if(isset($_POST["desde"], $_POST["hasta"] , $_POST["filtro"]))
    {
        if( $_POST["desde"] and $_POST["hasta"] )
        {
            $desde = $_POST["desde"];
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
        }

        if( $_POST["desde"])
        {
            $desde = $_POST["desde"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE fecha_creacion >= '$desde' ");
        }

        if($_POST["hasta"] )
        {
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE fecha_creacion <= '$hasta' ");
        }

        if( $_POST["filtro"])
        {
            $filtro = $_POST["filtro"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE id_venta = $filtro ");
        }
    }
    else{
        $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas order by id_venta desc limit 10 ");
    }

    while($row = $lista_venta->fetch_assoc())
        { 
            $cliente = $row['id_cliente'];
            $consulta_clientes = $conexion->query("SELECT * FROM $empresa.tbl_clientes where id_cliente = $cliente");
            $row2 = $consulta_clientes->fetch_assoc();
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $row["id_venta"]; ?></th>
                <td width="20%"><?php echo $row2["nombre_cliente"]; ?></td>
                <td><?php echo $row["comprobante"]; ?></td>
                <td><?php echo $row["forma_pago"]; ?></td>

                <td><?php echo $row["condicion_pago"]; ?></td>
        <td><?php if($permisos['modificar_user']== 1){ ?><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_venta"]; ?>" > <i class="fa fa-eye fa-lg"></i></a><?php } ?></td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_venta"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_venta"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_venta"];?>Label">Factura: <?php echo $row["id_venta"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/usuarios/actualizar_usuarios.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label>Fecha</label>
                                            <input type="text" name="fecha" placeholder="Fecha" value="<?php echo $row["fecha_creacion"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>Vendedor</label>
                                            <input type="text" name="vendedor" placeholder ="Vendedor" value="<?php echo $row["creado_por"]; ?>" disabled class="form-control " >
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label>Itbis</label>
                                            <input type="text" name="itbis" placeholder ="Itbis" value="$<?php echo $row["itbis"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label>Valor</label>
                                            <input type="text" name="precio" placeholder ="Itbis" value="$<?php echo $row["precio"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-4"> 
                                        <label>Valor total</label>  
                                            <input type="text" name="total" placeholder ="Valor" value="$<?php echo $row["total"]; ?>" disabled class="form-control" >
                                        </div>


                                        <div class="form-group col-md-6"> 
                                           <Strong> <label>Artículos</label></strong>  <br>
                                            <hr>
                                             <?php
                                            $id_temp = $row['id_venta_temp'];
                                            $consulta_articulos = $conexion->query("SELECT articulo, cantidad FROM $empresa.tbl_venta_temp where id_venta = $id_temp");
                                            while($list_articulos = $consulta_articulos->fetch_assoc())
                                            {
                                                echo $list_articulos['articulo']." (".$list_articulos['cantidad'].")";?>  <br><hr> <?php
                                            }
                                        ?>
                                        </div>
                                       
                                    </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
</div>
        <!--Modal Eliminar usuario   --->
        <div class="modal fade" id="eliminar<?php echo $row["id_usuario"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_usuario"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["id_usuario"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el usuario de:<strong> <?php echo $row["nombre_usuario"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/usuarios/eliminar_usuarios.php?id=<?php echo $row["id_usuario"]?>" class="btn btn-danger" value="Guardar">Borrar</a>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                
</div>

<?php
        }
?>
  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>


<!-- Modal -->
