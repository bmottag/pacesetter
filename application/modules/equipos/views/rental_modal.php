<script type="text/javascript" src="<?php echo base_url("assets/js/validate/equipos/rental.js"); ?>"></script>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="exampleModalLabel">RENTAL HISTORY
	<br><small>Add/Edit Rental History</small>
	</h4>
</div>

<div class="modal-body">
	<form name="form" id="form" role="form" method="post" >
		<input type="hidden" id="hddIdEquipo" name="hddIdEquipo" value="<?php echo $idEquipo; ?>"/>
		<input type="hidden" id="hddId" name="hddId" value="<?php echo $information?$information[0]["id_equipo_rental"]:""; ?>"/>

<script>
$( function() {
var dateFormat = "mm/dd/yy",
from = $( "#fecha_inicio" )
.datepicker({
changeMonth: true,
changeYear: true
})
.on( "change", function() {
to.datepicker( "option", "minDate", getDate( this ) );
}),
to = $( "#fecha_fin" ).datepicker({
changeMonth: true,
changeYear: true
})
.on( "change", function() {
from.datepicker( "option", "maxDate", getDate( this ) );
});

function getDate( element ) {
var date;
try {
date = $.datepicker.parseDate( dateFormat, element.value );
} catch( error ) {
date = null;
}

return date;
}
});
</script>

<?php 
if($information){
	$fechaInicio = date('m/d/Y', strtotime($information[0]['fecha_inicio']));
	$fechaVencimiento = date('m/d/Y', strtotime($information[0]['fecha_fin']));
}
?>
		
		<div class="row">	
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label class="control-label" for="fecha_inicio">Start Date: *</label>
					<input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $information?$fechaInicio:""; ?>" placeholder="Start Date" required/>
				</div>
			</div>
			
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="fecha_fin">End Date: *</label>
					<input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo $information?$fechaVencimiento:""; ?>" placeholder="End Date" required/>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="id_customer">Customer: *</label>
					<select name="id_customer" id="id_customer" class="form-control" required>
						<option value=''>Select ...</option>
						<?php for ($i = 0; $i < count($customerList); $i++) { ?>
							<option value="<?php echo $customerList[$i]["id_proveedor"]; ?>" <?php if($information && $information[0]["fk_id_proveedor_rental"] == $customerList[$i]["id_proveedor"]) { echo "selected"; }  ?>><?php echo $customerList[$i]["nombre_proveedor"]; ?></option>		
						<?php } ?>
					</select>
				</div>
			</div>
		
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="id_usuario">Responsible User: *</label>
					<select name="id_usuario" id="id_usuario" class="form-control" required>
						<option value=''>Select ...</option>
						<?php for ($i = 0; $i < count($listaOperadores); $i++) { ?>
							<option value="<?php echo $listaOperadores[$i]["id_user"]; ?>" <?php if($information && $information[0]["fk_id_user_responsable"] == $listaOperadores[$i]["id_user"]) { echo "selected"; }  ?>><?php echo $listaOperadores[$i]["first_name"] . ' ' . $listaOperadores[$i]["last_name"]; ?></option>		
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="row">	
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="comments">Comments: *</label>
					<textarea id="comments" name="comments" placeholder="Comments" class="form-control" rows="3"><?php echo $information?$information[0]["comentarios"]:""; ?></textarea>
				</div>
			</div>
		</div>
								
		<div class="form-group">
			<div id="div_load" style="display:none">		
				<div class="progress progress-striped active">
					<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
						<span class="sr-only">45% completado</span>
					</div>
				</div>
			</div>
			<div id="div_error" style="display:none">			
				<div class="alert alert-danger"><span class="glyphicon glyphicon-remove" id="span_msj">&nbsp;</span></div>
			</div>	
		</div>
		
		<div class="form-group">
			<div class="row" align="center">
				<div style="width:50%;" align="center">
					<button type="button" id="btnSubmit" name="btnSubmit" class="btn btn-primary" >
						Save <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
					</button> 
				</div>
			</div>
		</div>
			
	</form>
</div>