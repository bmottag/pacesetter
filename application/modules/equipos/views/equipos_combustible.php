<script>
$(function(){ 
	$(".btn-primary").click(function () {	
			var oID = $(this).attr("id");
            $.ajax ({
                type: 'POST',
				url: base_url + 'equipos/cargarModalCombustible',
				data: {'idEquipo': oID, 'idControlCombustible': 'x'},
                cache: false,
                success: function (data) {
                    $('#tablaDatos').html(data);
                }
            });
	});	

	$(".btn-success").click(function () {	
			var oID = $(this).attr("id");
            $.ajax ({
                type: 'POST',
				url: base_url + 'equipos/cargarModalCombustible',
				data: {'idEquipo': '', 'idControlCombustible': oID},
                cache: false,
                success: function (data) {
                    $('#tablaDatos').html(data);
                }
            });
	});	
});
</script>


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
				<a href="<?php echo base_url('equipos/detalle/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-tag"></i> General Information
				</a>

				<a href="<?php echo base_url('equipos/foto/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-photo"></i> Photo
				</a>
				<a href="<?php echo base_url('equipos/localizacion/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-thumb-tack"></i> Location
				</a>
				<a href="<?php echo base_url('equipos/combustible/' . $info[0]['id_equipo']); ?>" class="btn btn-primary btn-block">
					<i class="fa fa-tint"></i> Operation Check
				</a>
				<a href="<?php echo base_url('equipos/poliza/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Documents
				</a>
				<a href="<?php echo base_url('mantenimiento/correctivo/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-wrench"></i> Corrective Maintenance
				</a>
				<a href="<?php echo base_url('inspection/set_vehicle/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Inspection
				</a>
			</div>

		</div>

		<div class="col-lg-9">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<i class="fa fa-tint"></i> OPERATION CHECK
				</div>
				<div class="panel-body">
				
					<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal" id="<?php echo $info[0]['id_equipo']; ?>">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Operation
					</button><br>

					
<?php
$retornoExito = $this->session->flashdata('retornoExito');
if ($retornoExito) {
    ?>
	<div class="col-lg-12">	
		<div class="alert alert-success ">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			<?php echo $retornoExito ?>		
		</div>
	</div>
    <?php
}

$retornoError = $this->session->flashdata('retornoError');
if ($retornoError) {
    ?>
	<div class="col-lg-12">	
		<div class="alert alert-danger ">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<?php echo $retornoError ?>
		</div>
	</div>
    <?php
}
?> 

<?php 										
	if(!$listadoControlCombustible){ 
		echo '<div class="col-lg-12">
				<p class="text-danger"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> There are no records in the system.</p>
			</div>';
	}else{
?>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<th class="text-center">Date</th>
								<th class="text-center">Current Hours/Kilometers</th>
								<th class="text-center">Operator</th>
								<th class="text-center">Fluid Type</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Value</th>
								<th class="text-center">Task description</th>
								<th class="text-center">Edit</th>
							</tr>
						</thead>
						<tbody>							
						<?php
							foreach ($listadoControlCombustible as $lista):
									echo "<tr>";
									echo "<td class='text-center'>" . $lista['fecha_combustible'] . "</td>";
									echo "<td class='text-right'>" . number_format($lista['kilometros_actuales']) . "</td>";
									echo "<td>" . $lista['name'] . "</td>";
									echo "<td class='text-center'>";
									switch ($lista['tipo_consumo']) {
										case 1:
											$valor = 'Fuel';
											$clase = "text-danger";
											break;
										case 2:
											$valor = 'Grease';
											$clase = "text-success";
											break;
										case 3:
											$valor = 'Transmission Oil';
											$clase = "text-warning";
											break;
										case 4:
											$valor = 'Hydraulic Oil';
											$clase = "text-primary";
											break;
										case 5:
											$valor = 'Engine Oil';
											$clase = "text-violeta";
											break;
									}
									echo '<p class="' . $clase . '"><strong>' . $valor . '</strong></p>';
									echo "</td>";

									echo "<td>" . $lista['cantidad'] . "</td>";
									echo "<td class='text-right'>$" . number_format($lista['valor'], 2) . "</td>";
									echo "<td>" . $lista['labor_realizada'] . "</td>";
									
									echo "<td class='text-center'>";
						?>
									<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" id="<?php echo $lista['id_equipo_control_combustible']; ?>" >
										Edit <span class="glyphicon glyphicon-edit" aria-hidden="true">
									</button>
						<?php
									echo "</td>";
									echo "</tr>";
							endforeach;
						?>
						</tbody>
					</table>
				<?php } ?>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
		
				
<!--INICIO Modal para adicionar HAZARDS -->
<div class="modal fade text-center" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="tablaDatos">

		</div>
	</div>
</div>                       
<!--FIN Modal para adicionar HAZARDS -->

<!-- Tables -->
<script>
$(document).ready(function() {
    $('#dataTables').DataTable({
        responsive: true,
		 "ordering": false,
		 paging: false,
		"searching": false,
		"info": false
    });
});
</script>