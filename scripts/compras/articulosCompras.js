//$(document).ready(function () {
  //alert($("#articulo").val());
/*
  function cargar_datos(articulo) {
    alert("Estoy en ajax " + articulo);
    $.ajax({
      url: "consulta_articulos.php",
      type: "post",
      dataType: "html",
      data: "articulo="+articulo,
      success: function (r) {
        alert(r);
      }
    });
    /*.done(function(precio_art,stop_min_art){
            alert(precio_art);
            alert(stop_min_art);
            $('#precio_compra').val(precio_art);
            $('#stock').val(stop_min_art);
        })*/
  //}
/*
  $("#articulo").change(function () {
    var art = $("#articulo").val();
    cargar_datos(art);
  });



  
    $("#articulo").change(function () {
        var art = $("#articulo").val();
            $.ajax({
                type: "post",
                url: "consulta_articulos.php",
                dataType: "html",
                data: "articulo="+art,
                success: function (r) {
                    alert(r);
                }
            });
    });

});
*/


$(document).ready(function(){

    


    $("#articulo").change(function () {
        var art = $("#articulo").val();
        $.ajax({
                type: 'post',
                url: '../../scripts/compras/BuscarArticulos.php',
                dataType: "html",
                data: "articulo="+art,
                //dataType: 'json',
                //data: { articulo : $("#articulo").val() },
                success: function(res){
                    var json = JSON.parse(res);
                    $("#precio_compra").val(json[0].precio);
                    $("#stock").val(json[0].stop_min);
                    $("#impuesto").val(json[0].cod_impuesto);
                    $("#descripcion").val(json[0].descripcion);
                    //stop_min cod_impuesto
                    $("#cantidad").keyup(function() {
                      var var_precioCompra = parseFloat($("#precio_compra").val());
                      var var_cantidad = parseFloat($("#cantidad").val());
                      var var_ganancia = var_cantidad * var_precioCompra;
                      $("#total_SI").val(var_ganancia);
                      //total con impuestos
                      var var_porcentaje = (parseFloat($("#impuesto").val()) / 100); //0.08
                      var var_total_SI = parseFloat($("#total_SI").val()); //80
                      var var_porciento = var_total_SI * var_porcentaje; //80 * 0.08 = 6.4
                      var var_total_CI = var_total_SI + var_porciento; //40 + 6.4 = 46.4
                      $("#total_I").val(var_total_CI);
                      $("#total").val(var_total_CI);
                    });
                    //alert(json[0].precio);
                }
          });
    });
                      
});    