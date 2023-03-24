$(document).ready(function(){
    $("#agregar").click(function(){
        agregar();
    });
});

var cont = 0;
total = 0;
subtotal = [];

$("#guardar").hide();
$("#product_id").change(mostrarValores);
function mostrarValores(){
    datosProducto = document.getElementById('product_id').value.split(`_`);
    $("#price").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
}
function agregar(){
    datosProducto = document.getElementById('product_id').value.split('_');
    product_id = datosProducto[0];
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    stock = $("#stock").val();
    impuesto = $("#tax").val();

    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != ""){
        if (parseInt(stock) >= parseInt(quantity)) {
            // Actualizar stock
    var new_stock = parseInt(stock) - parseInt(quantity);
    $("#stock").val(new_stock);

    // Calcular subtotal, total y agregar fila a la tabla
            subtotal[cont] = parseInt(quantity * price) - (quantity * price * discount /100);
            total = total + subtotal[cont];
            var fila = `<tr class="selected" id="fila` + cont +
            `"><td><button type="button" class="btn btn-danger btn-sm"
            onclick="eliminar(` + cont + `);"><i class="fa fa-times"></i></
            button></td> <td> <input type="hidden" name="product_id[]"
            value="` + product_id + `">` + producto + `</td> <td><input
            type="hidden" id="price[]" name="price[]" value="` + parseFloat(price).toFixed(2) + `">
            <input class="form-control" type="number" id="price[]" value="`
            + parseFloat(price).toFixed(2) +`" disabled> </td> <td><input
            type="hidden" name="discount[]" value="` + parseFloat(discount) + `">
            <input class="form-control" type="number" value="`
            + parseFloat(discount) +`" disabled> </td> <td> <input type="hidden"
            name="quantity[]" value="` + quantity + `"><input
            class="form-control" type="number" value="` + quantity + `"
            disabled></td> <td align="right">Bs./` + parseFloat(subtotal[cont]).toFixed(2) + `</
                td></tr>`;
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La cantidad a vender supera al stock ',
                })
            
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ingrese todos los datos',
            })
    }
}
function limpiar(){
    $("#quantity").val("");
    $("#discount").val("0");
    $("#price").val("");
}

function totales(){
    $("#total").html("Bs." + total.toFixed(2));
    total_impuesto = total*impuesto/100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("Bs." + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("Bs." + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
}

function evaluar(){
    if(total > 0){
        $("#guardar").show();
    }else{
        $("#guardar").hide();
    }
}

function eliminar(index){
    total = total-subtotal[index];
    total_impuesto = total*impuesto/100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("Bs." + total);
    $("#total_impuesto").html("Bs." + total_impuesto);
    $("#total_pagar_html").html("Bs." + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}