function agregarNuevoGasto(){
    $.ajax({
        type:"POST",
        data:$('#frmAgregarGasto').serialize(),
        url:"../procesos/gastos/agregarNuevoGasto.php",
        success:function(resultado) {
            resultado = resultado.trim();

            if (resultado == 1) {
                $('#frmAgregarGasto')[0].reset();
                Swal.fire(":D","Agregado con exito!","success");
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(","Error al agregar" + resultado,"error");
            }
        }
    });

    return false;
}

function eliminarGastos(idGasto) {

	$.ajax({
	type:"POST",
	data:"idGasto=" + idGasto,
    url:"../procesos/gastos/eliminarGasto.php",
		success:function(respuesta){
		respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaGastosLoad').load("gastos/tablaGastos.php");
				Swal.fire(":D","Se elimino con exito!","success");
			} else {
				Swal.fire(":(","No se pudo eliminar! "+ resultado,"error");
			}
		}
	});
		
}
function obtenerDatos(idGasto){
    
    $.ajax({
        type:"POST",
        data:"idGasto=" + idGasto,
        url:"../procesos/gastos/obtenerDatos.php",
        success:function(resultado) {
            resultado = jQuery.parseJSON(resultado);
            $('#montoU').val(resultado['monto']);
            $('#descripcionU').val(resultado['descripcion']);
            $('#fechaU').val(resultado['fecha']);
            $('#idGasto').val(resultado['id_gasto']);
            $('#idCategoriaU').val(resultado['id_categoria']);
           
        }
    });
}
function actualizarGastos() {
    $.ajax({
        type:"POST",
        data: $('#frmActualizar').serialize(),
        url: "../procesos/gastos/actualizarGastos.php",
        success:function(resultado) {
            resultado = resultado.trim();
            if (resultado == 1) {
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
                swal(":)","Se actualizo con exito!","success");
            } else {
                swal(":(","No se pudo actualizar! " + resultado ,"error");
            }
        }
    });
    return false;
}