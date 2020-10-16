<?php 
        include("../../scripts/conexion/cone.php");
        session_start();
        if($_SESSION != null)
        {
                $empresa= $_SESSION["empresa_db"];
                $rol= $_SESSION["rol"];
                $consulta_permisos=$conexion->query("select * from $empresa.tbl_permisos where rol ='$rol'");
                $permisos = $consulta_permisos->fetch_assoc();
                ?>
                     
<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftFlesh</title>
   <link rel="stylesheet" href="../../css/base.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="../../scripts/js/query/dist/jquery.mask.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function($){
            $("#numero1").mask("9,99", {
 
                // Generamos un evento en el momento que se rellena
                completed:function(){
                    $("#numero1").addClass("ok")
                }
            });
 
            // Definimos las mascaras para cada input
            $("#date").mask("99/99/9999");
            $("#movil").mask("(999)-999-9999");
            $("#letras").mask("aaa");
            $("#comodines").mask("?");
            $(".fa-2x").click(function(){
                $("#menu_lateral").toggle();
            });
        });
    </script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="../../scripts/js/base.js" type="text/javascript"> </script>
</head>

    <div id="contenedor">
        <header >
            <div id="menu_top" class="padre1">
                <div id="logo" class="option_top hijo1"><img src="../../img/logo.png" width="60" style="margin-top:-10px;"> <i style="margin-left:50px" class="fa fa-bars fa-2x" aria-hidden="true"></i></div>
                
                <div id="notificaciones" class="option_top hijo1">
                        <button class="btn btn-info botones-top">Cobros pendientes(35)</button>
                        <button class="btn btn-info botones-top">Pagos a realizar(12)</button>
                        <button class="btn btn-info botones-top">Artículos por debajo del límite(3)</button>
                       <center> <i class="fa fa-bell fa-lg"></i></center>
                </div>
                <div  id="usuario" class="option_top hijo1">
                        <?php 
                                echo $_SESSION['user'];
                        ?>
                        <i  class="fa fa-cog fa-lg"></i>
                        <div id="menu-user" style="">
                                <div style="padding-top:15px;padding-left:15px;"><a href="../administracion/admin_usuario.php"><i class="fa fa-user"></i> |   Usuario<hr></a></div>
                                <?php if($permisos["administracion"]== 1){ ?><div style="padding-top:5px; padding-left:15px;"> <a href="../administracion/administracion.php"><i class="fa fa-cogs"></i> |  Config</a> <hr></div> <?php } ?>
                                <div style="padding-top:5px; padding-left:15px;"><a href="../../scripts/cerrar_session.php"><i class="fa fa-reply-all"></i> |  Cerrar</a> <hr></div>
                        </div>
                </div>
            </div>
        </header>
        <aside style="float:left;" >
              <nav>
                <div id="menu_lateral">
                    <div id="nombre_empresa"><?php echo $_SESSION["empresa"]; ?></div>
                        <div id="menu">
                                <?php if($permisos['clientes']== 1){ ?> <div id="clientes" class="menu_lv1"><i class="fa fa-users fa-lg" aria-hidden="true"></i> Clientes
                                        <div id="agregar_clientes"class="menu_lv3 menu_clientes">
                                                <a href="../clientes/crear_clientes.php"> Agregar cliente</a>
                                        </div>
                                        <div id="lista_clientes" class="menu_lv3 menu_clientes">
                                                <a href="../clientes/ver_clientes.php">Ver lista de clientes</a>
                                        </div>
                                </div><?php }?>

                                <?php if($permisos['suplidores']== 1){ ?> <div id="suplidores" class="menu_lv1"><i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i> Suplidores
                                        <a href="../suplidores/frm_suplidores.php">
                                        <div id="agregar_suplidor" class="menu_lv3 menu_suplidores" >Agregar suplidor</div>
                                        </a>
                                        <a href="../suplidores/frm_consultar_suplidores.php">
                                        <div id="lista_suplidores"  class="menu_lv3 menu_suplidores">Ver lista de suplidores</div>
                                        </a>
                                </div><?php } ?>

                                <?php if($permisos['ventas']== 1){ ?> <div id="ventas" class="menu_lv1"><i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i> Ventas
                                        <a href="../venta/punto_de_venta.php"><div id="punto_de_venta"class="menu_lv3 menu_ventas" >Punto de venta</div></a>
                                        <a href="../venta/ver_ventas.php"><div id="lista_ventas" class="menu_lv3 menu_ventas">Ventas</div></a>
                                        <div id="lista_ventas" class="menu_lv3 menu_ventas">Ventas en espera</div>
                                        <div id="lista_ventas" class="menu_lv3 menu_ventas">Cierre de venta</div>
                                        <a href="../venta/cotizaciones.php"><div id="lista_ventas" class="menu_lv3 menu_ventas">Cotizaciones</div></a>
                                        <div id="devoluciones_venta" class="menu_lv3 menu_ventas">Devoluciones</div>
                                        <div id="devoluciones_venta" class="menu_lv3 menu_ventas">Reportes</div>
                                </div><?php } ?>

                                <?php if($permisos['compras']== 1){ ?><div id="compras" class="menu_lv1"> <i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i> Compras 
                                        <a href="../compras/frm_compras.php">
                                        <div id="agregar_compra" class="menu_lv3 menu_compras">Agregar compra</div>
                                        </a>
                                        <a href="../compras/frm_consultar_compras.php">
                                        <div id="lista_compras" class="menu_lv3 menu_compras">Ver lista de compras</div>
                                        </a>
                                        <a href="../compras/frm_devoluciones.php">
                                        <div id="devoluciones_compra" class="menu_lv3 menu_compras">Devoluciones</div>
                                        </a>
                                </div><?php } ?>

                                <?php if($permisos['cxp']== 1){ ?><div id="cxp" class="menu_lv1"><i class="fa fa-credit-card fa-lg" aria-hidden="true"></i> Cuentas por pagar
                                        <div id="agregar_cxp" class="menu_lv3 menu_cxp">Agregar cuentas por pagar</div>
                                        <div id="lista_cxp" class="menu_lv3 menu_cxp">Ver cuentas por pagar</div>
                                </div><?php }?>

                                <?php if($permisos['cxc']== 1){ ?><div id="cxc" class="menu_lv1"><i class="fa fa-money fa-lg" aria-hidden="true"></i> Cuentas por cobrar<!--agregue una referencia a mi formularios-->                         
                                        <a href="../Cuentas_por_cobrar/frm_cuentas_por_cobrar.php"><div id="agregar_cxc" class="menu_lv3 menu_cxc">Agregar cuenta por cobrar</div></a>
                                        <div id="lista_cxc" class="menu_lv3 menu_cxc">Ver cuentas por cobrar</div>
                                </div> <?php } ?>

                        <div id="inventario" class="menu_lv1"><i class="fa fa-inbox fa-lg"></i> Inventario
                            
                                <a href="../articulos/frm_articulos.php"><div id="agregar_articulo" class="menu_lv3 menu_inventario">Agregar articulo</div></a>
                                <a href="../articulos/frm_consultar_articulos.php"><div id="lista_articulos" class="menu_lv3 menu_inventario">Ver lista de articulos</div></a>
                                <div id="cargar_articulo" class="menu_lv3 menu_inventario">Cargar articulos</div>
                                <div id="pasar_inventario" class="menu_lv3 menu_inventario">Pasar inventario</div>
                            
                        </div>
                        <a href="../dashboard/dashboard.php"> <div id="inventario" class="menu_lv1" style="color:white;"><i class="fa fa-bar-chart fa-lg" aria-hidden="true"></i> Dashboard </div></a>
                
            </nav>
        </aside>
        <?php
        }
        else
        {
               header("location: ../login/login.php");
        }


?>