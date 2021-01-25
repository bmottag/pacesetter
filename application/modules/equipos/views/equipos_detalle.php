<script type="text/javascript" src="<?php echo base_url("assets/js/validate/equipos/equipo.js"); ?>"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="page-wrapper">
	<br>
	
	<!-- /.row -->
	<div class="row">

		<div class="col-lg-3">
		
			<?php if($foto){ ?>
				<div class="form-group">
					<div class="row" align="center">
						<img src="<?php echo base_url($foto[0]["equipo_foto"]); ?>" class="img-rounded" width="150" height="150" alt="Photo" />
					</div>
				</div>
			<?php } ?>

			<div class="form-group">
				<div class="row" align="center">
						<?php echo '<strong>Vin Number:</strong> ' . $info[0]['numero_inventario']; ?>
				</div>
			</div>
		
			<div class="list-group">
				<a href="<?php echo base_url('equipos/detalle/' . $info[0]['id_equipo']); ?>" class="btn btn-info btn-block">
					<i class="fa fa-tag"></i> General Information
				</a>
				<a href="<?php echo base_url('equipos/foto/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-photo"></i> Photo
				</a>
				<a href="<?php echo base_url('equipos/localizacion/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-thumb-tack"></i> Location
				</a>
				<a href="<?php echo base_url('equipos/combustible/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-tint"></i> Operation Check
				</a>
				<a href="<?php echo base_url('equipos/poliza/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Documents
				</a>
				<a href="<?php echo base_url('mantenimiento/correctivo/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-wrench"></i> Corrective Maintenance
				</a>
				<a href="<?php echo base_url('equipos/inspections/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-legal "></i> Inspection
				</a>
				<a href="<?php echo base_url('equipos/rental/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-puzzle-piece"></i> Rental History
				</a>
			</div>

		</div>

		<div class="col-lg-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<i class="fa fa-tag"></i> <strong>GENERAL INFORMATION</strong>
				</div>
				<div class="panel-body">

<?php
	$retornoExito = $this->session->flashdata('retornoExito');
	if ($retornoExito) {
?>
		<div class="alert alert-success ">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			<?php echo $retornoExito ?>		
		</div>
<?php
	}
	$retornoError = $this->session->flashdata('retornoError');
	if ($retornoError) {
?>
		<div class="alert alert-danger ">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<?php echo $retornoError ?>
		</div>
<?php
	}
?> 
				
					<form  name="form" id="form" class="form-horizontal" method="post"  >
						<input type="hidden" id="hddId" name="hddId" value="<?php echo $info[0]['id_equipo']; ?>"/>

						<div class="form-group">
							<div class="col-sm-6">
								<label for="numero_inventario">Vin Number: </label>
								<input type="text" id="numero_inventario" name="numero_inventario" class="form-control" value="<?php echo $info?$info[0]["numero_inventario"]:""; ?>" placeholder="Vin Number" required <?php echo $deshabilitar; ?>>
							</div>

							<div class="col-sm-6">

							</div>							
						</div>
												
						<div class="form-group">
							<div class="col-sm-6">
								<label for="marca">Make: </label>
								<input type="text" id="marca" name="marca" class="form-control" value="<?php echo $info?$info[0]["marca"]:""; ?>" placeholder="Make" required <?php echo $deshabilitar; ?>>
							</div>
							
							<div class="col-sm-6">
								<label for="modelo">Model: </label>
								<input type="text" id="modelo" name="modelo" class="form-control" value="<?php echo $info?$info[0]["modelo"]:""; ?>" placeholder="Model" required <?php echo $deshabilitar; ?>>
							</div>	
						</div>
						
						<div class="form-group">
							<div class="col-sm-6">
								<label for="from">Serial Number: </label>
								<input type="text" id="numero_serial" name="numero_serial" class="form-control" value="<?php echo $info?$info[0]["numero_serial"]:""; ?>" placeholder="Serial Number" required <?php echo $deshabilitar; ?>>
							</div>
							
							<div class="col-sm-6">
								<label for="from">Equipment Type: </label>
								<select name="id_tipo_equipo" id="id_tipo_equipo" class="form-control" required <?php echo $deshabilitar; ?>>
									<option value=''>Select ...</option>
									<?php for ($i = 0; $i < count($tipoEquipo); $i++) { ?>
										<option value="<?php echo $tipoEquipo[$i]["id_tipo_equipo"]; ?>" <?php if($info && $info[0]["fk_id_tipo_equipo"] == $tipoEquipo[$i]["id_tipo_equipo"]) { echo "selected"; }  ?>><?php echo $tipoEquipo[$i]["tipo_equipo"]; ?></option>	
									<?php } ?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-6">
								<label for="from">State: </label>
								<select name="estado" id="estado" class="form-control" required <?php echo $deshabilitar; ?>>
									<option value=''>Select...</option>
									<option value=1 <?php if($info && $info[0]["estado_equipo"] == 1) { echo "selected"; }  ?>>Active</option>
									<option value=2 <?php if($info && $info[0]["estado_equipo"] == 2) { echo "selected"; }  ?>>Inactive</option>
								</select>
							</div>
						
							<div class="col-sm-6">
								<label for="valor_comercial">Value: </label>
								<input type="text" id="valor_comercial" name="valor_comercial" class="form-control" value="<?php echo $info?$info[0]["valor_comercial"]:""; ?>" placeholder="Value" <?php echo $deshabilitar; ?>>
							</div>
						</div>
												
<script>
	$( function() {
		$( "#fecha_adquisicion" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
	});
</script>
						<div class="form-group">
							<div class="col-sm-6">
								<label for="fecha_adquisicion">Purchase Date: </label>
								<input type="text" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" value="<?php echo $info?$info[0]["fecha_adquisicion"]:""; ?>" placeholder="Purchase Date" <?php echo $deshabilitar; ?>/>
							</div>
						
							<div class="col-sm-6">
								<label for="observacion">Observation: </label>
								<textarea id="observacion" name="observacion" placeholder="Observation" class="form-control" rows="3" <?php echo $deshabilitar; ?>><?php echo $info?$info[0]["observacion"]:""; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="row" align="center">
								<div style="width:80%;" align="center">
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
							</div>
						</div>	

						<?php if(!$deshabilitar){ ?>
						<div class="form-group">
							<div class="row" align="center">
								<div style="width:100%;" align="center">							
									<button type="button" id="btnSubmit" name="btnSubmit" class='btn btn-info'>
										Save <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
									</button>
								</div>
							</div>
						</div>
						<?php } ?>

					</form>

				</div>
			</div>
		</div>
		
					
	</div>
	
</div>
<!-- /#page-wrapper -->