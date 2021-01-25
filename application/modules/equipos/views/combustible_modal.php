<script type="text/javascript" src="<?php echo base_url("assets/js/validate/equipos/control_combustible.js"); ?>"></script>


<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="exampleModalLabel">OPERATION CHECK </h4>
</div>

<div class="modal-body">
	<form  name="formCombustible" id="formCombustible" role="form" method="post" >
		<input type="hidden" id="hddidEquipo" name="hddidEquipo" value="<?php echo $idEquipo; ?>"/>
		<input type="hidden" id="hddidControlCombustibler" name="hddidControlCombustibler" value="<?php echo $information?$information[0]["id_equipo_control_combustible"]:""; ?>"/>
				
		<div class="row">
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="kilometros_actuales">Current Hours/Kilometers: *</label>
					<input type="text" id="kilometros_actuales" name="kilometros_actuales" class="form-control" value="<?php echo $information?$information[0]["kilometros_actuales"]:""; ?>" placeholder="Current Hours/Kilometers" >
				</div>
			</div>
		
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="id_operador">Operator: *</label>
					<select name="id_operador" id="id_operador" class="form-control" required>
						<option value=''>Select ...</option>
						<?php for ($i = 0; $i < count($listaOperadores); $i++) { ?>
							<option value="<?php echo $listaOperadores[$i]["id_user"]; ?>" <?php if($information && $information[0]["fk_id_operador_combustible"] == $listaOperadores[$i]["id_user"]) { echo "selected"; }  ?>><?php echo $listaOperadores[$i]["first_name"] . ' ' . $listaOperadores[$i]["last_name"]; ?></option>		
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="tipo_consumo">Fluid Type: *</label>
					<select name="tipo_consumo" id="tipo_consumo" class="form-control" required>
						<option value=''>Select ...</option>
						<option value=1 <?php if($information && $information[0]["tipo_consumo"] == 1) { echo "selected"; }  ?>>Combustible</option>
						<option value=2 <?php if($information && $information[0]["tipo_consumo"] == 2) { echo "selected"; }  ?>>Grasa</option>
						<option value=3 <?php if($information && $information[0]["tipo_consumo"] == 3) { echo "selected"; }  ?>>Aceite Transmisión</option>
						<option value=4 <?php if($information && $information[0]["tipo_consumo"] == 4) { echo "selected"; }  ?>>Aceite Hidráulico</option>
						<option value=5 <?php if($information && $information[0]["tipo_consumo"] == 5) { echo "selected"; }  ?>>Aceite Motor</option>
					</select>
				</div>
			</div>
		
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="cantidad">Quantity: <small>(En Galones)</small>*</label>
					<input type="text" id="cantidad" name="cantidad" class="form-control" value="<?php echo $information?$information[0]["cantidad"]:""; ?>" placeholder="Quantity" >
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="valor">Value: *</label>
					<input type="text" id="valor" name="valor" class="form-control" value="<?php echo $information?$information[0]["valor"]:""; ?>" placeholder="Value" >
				</div>
			</div>

			<div class="col-sm-6">		
				<div class="form-group text-left">
					<label class="control-label" for="labor_realizada">Task description: *</label>
					<textarea id="labor_realizada" name="labor_realizada" placeholder="Task description" class="form-control" rows="3"><?php echo $information?$information[0]["labor_realizada"]:""; ?></textarea>
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
					<button type="button" id="btnSubmitCombustible" name="btnSubmitCombustible" class="btn btn-primary" >
						Save <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
					</button> 
				</div>
			</div>
		</div>
		
	</form>
</div>