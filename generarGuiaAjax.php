<?php 
	require_once ("ciudades.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Datos por AJAX</title>
	<script src = "jquery-3.2.1.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<script type="text/javascript">
		$(document).ready(function() {
			$('#enviar').click(function() {
				var datos = $('#codigo_remision, #fecha, #id_cliente, #id_remitente, #nombre_remitente, #direccion_remitente, #telefono_remitente, #ciudad_remitente, #nit_destinatario, #div_destinatario, #nombre_destinatario, #direccion_destinatario, #ciudad_destinatario, #telefono_destinatario, #valor_declarado, #codigo_cuenta, #codigo_producto, #nivel_servicio, #linea, #contenido, #referencia, #observaciones, #estado, #cuenta_contable, #centro_costos, #margen_izquierdo, #margen_superior, #id_rotulo, #usuario_vmi, #formato_impresion, #atributo1_nombre, #atributo1_valor, #nro_doc_radicados, #nro_sobre, #ubl, #alto, #largo, #peso, #unidades, #referencia_detalle, #nombre_empaque, #referencia_recaudo, #valor, #valor_base_iva, #valor_iva, #forma_pago, #tipo_medio, #destino_notificacion, #nit, #div, #nombre, #direccion, #codigo_ciudad, #telefono').serialize();
				alert(datos);
                $.ajax({
                    url: 'generarGuia.php',
                    type: 'POST',
                    dataType: '',
                    data:(datos),
                    success: function(data){
                   		alert('funciono');
                    },
                    complete: function(){
                        //location.reload();
                    },
                    error: function(){
                      alert( "Ha ocurrido un error");
                    },               
                });
			});
		});
	</script>
</head>
<body><br>

	<h1 align="center">Datos para la generación de guias</h1><br><br><br>
	<form autocomplete="off">
		<div class="container">
			<h3 align="center">Generales</h3><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Código de remisión</label>
				    <input type="text" class="form-control" id="codigo_remision" name="codigo_remision" placeholder="Ej: 73400000020" data-toggle="tooltip" data-placement="bottom" title="Número de remisión creada">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Fecha</label>
				    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="EJ: 2017-10-24" data-toggle="tooltip" data-placement="bottom" title="Formato: YYYY-MM-DD">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Id cliente</label>
				    <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="EJ: 26086" data-toggle="tooltip" data-placement="bottom" title="Id del cliente">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Id remitente</label>
				    <input type="text" class="form-control" id="id_remitente" name="id_remitente" placeholder="EJ: 0" data-toggle="tooltip" data-placement="bottom" title="Remitente sin registrar utilizarr el valor 0">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nombre remitente</label>
				    <input type="text" class="form-control" id="nombre_remitente" name="nombre_remitente" placeholder="EJ: Manuel Torres" data-toggle="tooltip" data-placement="bottom" title="Vacio si se envia id remitente diferente de 0">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Dirección remitente</label>
				    <input type="text" class="form-control" id="direccion_remitente" name="direccion_remitente" placeholder="EJ: Barrio prado..." data-toggle="tooltip" data-placement="bottom" title="Vacio si se envia id remitente diferente de 0">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Telefono remitente</label>
				    <input type="text" class="form-control" id="telefono_remitente" name="telefono_remitente" placeholder="EJ: Barrio prado..." data-toggle="tooltip" data-placement="bottom" title="Vacio si se envia id remitente diferente de 0">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Ciudad remitente</label>
				    <input type="text" class="form-control" id="ciudad_remitente" name="ciudad_remitente" placeholder="EJ: 3057784125" data-toggle="tooltip" data-placement="bottom" title="Vacio si se envia id remitente diferente de 0">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nit destinatario</label>
				    <input type="text" class="form-control" id="nit_destinatario" name="nit_destinatario" placeholder="EJ: 800.164.437-5" data-toggle="tooltip" data-placement="bottom" title="0 en caso de no poseer NIT">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">División destinatario</label>
				    <input type="text" class="form-control" id="div_destinatario" name="div_destinatario" placeholder="" data-toggle="tooltip" data-placement="bottom" title="0 en caso de no poseer División">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nombre destinatario</label>
				    <input type="text" class="form-control" id="nombre_destinatario" name="nombre_destinatario" placeholder="" data-toggle="tooltip" data-placement="bottom" title="Ingrese el nombre del destinatario">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Dirección destinatario</label>
				    <input type="text" class="form-control" id="direccion_destinatario" name="direccion_destinatario" placeholder="" data-toggle="tooltip" data-placement="bottom" title="Ingrese el dirección del destinatario">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label>Ciudad destinatario</label>
				    <select class="form-control" id="ciudad_destinatario" name="ciudad_destinatario" data-toggle="tooltip" data-placement="bottom" title="Elija la ciudad del destinatario">
					  	<option value="0" selected disabled>Seleccione...</option>
                        <?php   
                            foreach ($retorno as $ciudades) {
                        ?>
                        		<option value="<?php $ciudades['codigo']?>"><?php echo utf8_encode($ciudades['nombre'])?></option>
                        <?php 
                            }
                        ?>
                    </select>
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Telefono destinatario</label>
				    <input type="text" class="form-control" id="telefono_destinatario" name="telefono_destinatario">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Valor declarado</label>
				    <input type="text" class="form-control" id="valor_declarado" name="valor_declarado">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Código cuenta</label>
				    <input type="text" class="form-control" id="codigo_cuenta" name="codigo_cuenta">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Código producto</label>
				    <input type="text" class="form-control" id="codigo_producto" name="codigo_producto">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nivel servicio</label>
				    <input type="text" class="form-control" id="nivel_servicio" name="nivel_servicio">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Linea</label>
				    <input type="text" class="form-control" id="linea" name="linea">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Contenido</label>
				    <input type="text" class="form-control" id="contenido" name="contenido">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Referencia</label>
				    <input type="text" class="form-control" id="referencia" name="referencia">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Observaciones</label>
				    <input type="text" class="form-control" id="observaciones" name="observaciones">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Estado</label>
				    <input type="text" class="form-control" id="estado" name="estado">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Cuenta contable</label>
				    <input type="text" class="form-control" id="cuenta_contable" name="cuenta_contable">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Centro costos</label>
				    <input type="text" class="form-control" id="centro_costos" name="centro_costos">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Margen izquierdo</label>
				    <input type="text" class="form-control" id="margen_izquierdo" name="margen_izquierdo">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Margen superior</label>
				    <input type="text" class="form-control" id="margen_superior" name="margen_superior">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Id rotulo</label>
				    <input type="text" class="form-control" id="id_rotulo" name="id_rotulo">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Usuario vmi</label>
				    <input type="text" class="form-control" id="usuario_vmi" name="usuario_vmi">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Formato impresion</label>
				    <input type="text" class="form-control" id="formato_impresion" name="formato_impresion">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Atributo1 nombre</label>
				    <input type="text" class="form-control" id="atributo1_nombre" name="atributo1_nombre">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Atributo1 valor</label>
				    <input type="text" class="form-control" id="atributo1_valor" name="atributo1_valor">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nro doc radicados</label>
				    <input type="text" class="form-control" id="nro_doc_radicados" name="nro_doc_radicados">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nro sobre</label>
				    <input type="text" class="form-control" id="nro_sobre" name="nro_sobre">
				</div>
			</div><br>
		</div>	
		<div class="container">
			<h3 align="center">Detalles del paquete</h3><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Ubl</label>
				    <input type="text" class="form-control" id="ubl" name="ubl">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Alto</label>
				    <input type="text" class="form-control" id="alto" name="alto">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Largo</label>
				    <input type="text" class="form-control" id="largo" name="largo">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Peso</label>
				    <input type="text" class="form-control" id="peso" name="peso">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Unidades</label>
				    <input type="text" class="form-control" id="unidades" name="unidades">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Referencia detalle</label>
				    <input type="text" class="form-control" id="referencia_detalle" name="referencia_detalle">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nombre empaque</label>
				    <input type="text" class="form-control" id="nombre_empaque" name="nombre_empaque">
				</div>
			</div><br>
		</div>	
		<div class="container">
			<h3 align="center">Detalle del recaudo</h3><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Referencia recaudo</label>
				    <input type="text" class="form-control" id="referencia_recaudo" name="referencia_recaudo">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Valor</label>
				    <input type="text" class="form-control" id="valor" name="valor">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Valor base iva</label>
				    <input type="text" class="form-control" id="valor_base_iva" name="valor_base_iva">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Valor iva</label>
				    <input type="text" class="form-control" id="valor_iva" name="valor_iva">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Forma de pago</label>
				    <input type="text" class="form-control" id="forma_pago" name="forma_pago">
				</div>
			</div><br>
		</div>
		<div class="container">
			<h3 align="center">Notificaciones</h3><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Tipo medio</label>
				    <input type="text" class="form-control" id="tipo_medio" name="tipo_medio">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Destino notificacion</label>
				    <input type="text" class="form-control" id="destino_notificacion" name="destino_notificacion">
				</div>
			</div><br>
		</div>
		<div class="container">
			<h3 align="center">Información de la guia (Servicio de Retorno)</h3><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nit</label>
				    <input type="text" class="form-control" id="nit" name="nit">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Div</label>
				    <input type="text" class="form-control" id="div" name="div">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Nombre cliente destinatario</label>
				    <input type="text" class="form-control" id="nombre" name="nombre">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Direccion cliente</label>
				    <input type="text" class="form-control" id="direccion" name="direccion">
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Código ciudad</label>
				    <input type="text" class="form-control" id="codigo_ciudad" name="codigo_ciudad">
				</div>
				<div class="col-lg-3">
				    <label for="exampleInputEmail1">Telefono</label>
				    <input type="text" class="form-control" id="telefono" name="telefono">
				</div>
			</div><br>
			<div class="container">
				<div class="col-lg-2 offset-lg-5">
					<button class="btn btn-primary" id="enviar">Enviar Datos</button>
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>