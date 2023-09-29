$(function() {
			
    /* ==========================================================================
     Datepicker
     ========================================================================== */

    $('.datetimepicker').datetimepicker({

showTodayButton: true,
        widgetPositioning: {
            horizontal: 'right',
  vertical: 'top'
        },
        debug: false
    })

});


$(document).ready(function(){
$('#bt_add').click(function(){
agregar();
});

});

let cont = 0;
total=0;
subtotal = [];

$("#guardar").hide();
$("#productoid").change(mostrarValores);

function mostrarValores()
{
datosArticulo = document.getElementById('productoid').value.split('_');
$("#cantidad").val(datosArticulo[1]);
$("#unidad").val(datosArticulo[2]);
}

function limpiar()
{
$("#cantidad").val("");
$("#costo").val("");      
}

function evaluar(){
if (total>0)
{
$("#guardar").show();
}else{
$("#guardar").hide();
}
}

function agregar() {
datosArticulo = document.getElementById('productoid').value.split('_');

idproducto = datosArticulo[0];
producto =$("#productoid option:selected").text();
let cantidad = $("#cantidad").val();
let costo = $("#costo").val();


let producto_id = $("#producto_id option:selected").val();
let producto_text = $("#producto_id option:selected").text();


if (idproducto != "" && cantidad != "" && cantidad>0 && costo !="" ) {
subtotal[cont] = (cantidad*costo);
total = total + subtotal[cont];

let fila = `
          <tr  id="fila` + cont +
          `"><td><input type="hidden" name="producto_id[]" value="`+ idproducto + `"/>` +                   
            producto +    
          `</td> ` + 
          `<td><input type="number" onchange="recalcular(` + cont + `)" class="form-control" id="cantidad[`+ cont +`]"` + ` name="cantidades[]" value="`+ cantidad + `"/></td>` +
          `<td><input type="number" onchange="recalcular(` + cont + `)"  class="form-control" id="costo[`+ cont +`]"` + `  name="costo[]" value="`+ costo + `"/></td>` +                       
          `<td  id="subtotal[`+cont+`]">`+ Intl.NumberFormat('en-US').format(subtotal[cont]) + `</td>` +
          `<td><button type="button"  class="tabledit-edit-button btn btn-sm btn-default" onclick="eliminar(` + cont + `)"> ` +
          `<span class="glyphicon glyphicon-trash"></span></button> </td></tr>`;
  cont ++;
  limpiar();     
  $("#total").html("C$" + Intl.NumberFormat('en-US').format(total));   
  $("#totalentrada").val(total);  
  evaluar(); 
  $("#tableproductos").append(fila);         

} else {
  alert("Error al ingresar el detalle de la entrada, revise los datos del articulo");
}
}    

function eliminar(index) 
{
total = total - subtotal[index];
$("#total").html("C$" + total);
$("#fila" + index).remove();
evaluar();
}

function recalcular(index) 
{
total = total - subtotal[index];

subtotal[index] = (cantidad[index]*costo[index])
let cantidadnueva =  document.getElementById('cantidad['+ index + ']').value;
let costodnuevo =  document.getElementById('costo['+ index + ']').value;

subtotal[index] = (cantidadnueva*costodnuevo);    
total = total + subtotal[index];

document.getElementById("subtotal["+ index + "]").innerHTML = subtotal[index];

$("#total").html("C$" +  Intl.NumberFormat('en-US').format(total));
console.log(new Intl.NumberFormat('en-US').format(total));
}

