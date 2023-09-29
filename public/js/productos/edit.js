$(function() {
			
    /* ==========================================================================
     Datepicker
     ========================================================================== */

$('.datetimepicker').datetimepicker({
    useCurrent: true,
    format: 'DD/MM/YYYY',
    showTodayButton: true,
            widgetPositioning: {
                horizontal: 'right',
    vertical: 'top'
            },
            debug: false
    });

});

function calcularprecio() {   
    let costo = $("#costopromedio").val();
    let margen = $("#margenutilidad").val();

    let porcentaje = (margen/100)*costo;
    let precio = parseFloat(costo) + parseFloat(porcentaje);
   
    $("#precio1").val(precio);
}

function calcularmargen() {    
    let costo = $("#costopromedio").val();
    let precio = $("#precio1").val();
    let margen = (100*precio)/costo;
    
    $("#margenutilidad").val(margen);
}

   