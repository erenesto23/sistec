<?php
include("../../conexion/cone.php");
session_start();

function getPlantilla($desde,$hasta,$filtro){

$plantilla = '
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../../img/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Softflesh Corporation</h2>
        <div>teniente amado garcia, #47 Santo Domingo, RD</div>
        <div>(809) 319-1873</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">John Doe</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>';

        
        $empresa = $_SESSION["empresa_db"];
        if(isset($_POST["desde"], $_POST["hasta"] , $_POST["filtro"]))
        {
            if($_POST["desde"] and $_POST["hasta"] )
                {
                    $desde = $_POST["desde"];
                    $hasta = $_POST["hasta"];
                    $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_compras WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
                }
            if($_POST["filtro"])
                {
                    $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE articulo LIKE '%$filtro%' limit 5");
                }                  
        }else{
            $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
        }

        $productos = array();
        while($rows = $consulta_articulos->fetch_assoc()) $productos[] = $rows;
        foreach($product as $productos)
            { 



              $plantilla.='
                <tr>
                  <td class="no">'   .$product["no_compra"].'</td>
                  <td class="desc">' .$product["fecha_orden"].'</td>
                  <td class="unit">' .$product["articulo"].'</td>
                  <td class="qty">'  .$product["precio_compra"].'</td>
                  <td class="total">'.$product["cantidad"].'</td>
                </tr>
              ';

            }

            $plantilla.='</tbody>
            <tfoot>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">SUBTOTAL</td>
                <td>$5,200.00</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">TAX 25%</td>
                <td>$1,300.00</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">GRAND TOTAL</td>
                <td>$6,500.00</td>
              </tr>
            </tfoot>
          </table>
          <div id="thanks">Thank you!</div>
          <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
          </div>
        </main>
        <footer>
          Invoice was created on a computer and is valid without the signature and seal.
        </footer>
      </body>
    ';

 return $plantilla;


}

?>