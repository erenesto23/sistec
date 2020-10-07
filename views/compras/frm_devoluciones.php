<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php"); ?>
      <!-- css -->
        <link rel="stylesheet" href="../../css/devoluciones.css">
        <link rel="stylesheet" href="../../css/scroll.css">
      <!-- js -->
        <!--
        <script src="../../scripts/compras/articulosCompras.js"></script>                            
        -->
        <script src="../../scripts/js/time_alert.js"></script>


<div class="container-devoluciones">
    <div class="container form-row">
    <form action="" method="post">
    <div class="cabeza">
               <h2> Devoluciones</h2>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
        <label>Desde</label>
            <input class="form-control"  type="date" name="desde">
        </div>
        <div class="form-group col-md-3" >
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


    <div class="form-row">
        <div class="form-group col-md-12">

                <!--Aqui va la tabla temp de compras-->
                <div class="tamano_tablas Overflow">
                    <table class="table">
                        <h5 class="cabeza_tabla" >Detalle de compra</h5>
                        <thead>      
                            
                            <tr>
                                <th scope="col" style="width:60%;"> Detella Articulos </th>
                                <th scope="col" style="width:15%;"> Cant </th>
                                <th scope="col" style="width:15%;"> Precio </th>
                                <th scope="col" style="width:15%;"> Total </th>
                                <th scope="col" style="width:15%;"> Acciones </th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET["desde"], $_POST["hasta"] , $_POST["filtro"]))
                                {
                                    if( $_POST["desde"] != null and $_POST["hasta"] )
                                        {
                                            $desde = $_POST["desde"];
                                            $hasta = $_POST["hasta"];
                                            $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_compras WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
                                        }else
                                            {
                                                $consulta_articulos= $conexion->query("select * from $empresa.tbl_art_compras where no_compra = $filtro limit 5");
                                            }    
                                        while($reg_art_temp = $consulta_art_temp->fetch_assoc())
                                        {
                            ?>
                                                <tr>
                                                <th><?php  echo $reg_art_temp["articulo"]; ?></th>
                                                <td><?php  echo $reg_art_temp["cantidad"]; ?></td>
                                                <td><?php  echo $reg_art_temp["precio_compra"]; ?></td>
                                                <?php 
                                                $cantidad= $reg_art_temp["cantidad"];
                                                $precio = $reg_art_temp["precio_compra"];
                                                $total = $cantidad * $precio;
                                                ?>
                                                <td><?php  echo $total ?></td>
                                                <td><a href="../../scripts/compras/devoluciones.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                                </tr>
                            <?php
                                        }
                                }
                            ?>
                        </tbody>
                    </table> 
                </div>

        </div>
        <div class="form-group col-md-4">
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
        </div>
    </div>
            
<!--Aqui el final de los div de este formulario-->
    </div>    
</div>