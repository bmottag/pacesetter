<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(function(){
	$(".btn-info").click(function () {
		var oID = $(this).attr("id");
        $.ajax ({
            type: 'POST',
			url: base_url + 'mantenimiento/cargarModalCorrectivo',
			data: {'idEquipo': oID, 'idCorrectivo': 'x'},
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
			url: base_url + 'mantenimiento/cargarModalCorrectivo',
			data: {'idEquipo': '', 'idCorrectivo': oID},
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
				<a href="<?php echo base_url('equipos/combustible/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-tint"></i> Operation Check
				</a>
				<a href="<?php echo base_url('equipos/poliza/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Documents
				</a>
				<a href="<?php echo base_url('mantenimiento/correctivo/' . $info[0]['id_equipo']); ?>" class="btn btn-info btn-block">
					<i class="fa fa-wrench"></i> Corrective Maintenance
				</a>
				<a href="<?php echo base_url('equipos/inspections/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Inspection
				</a>
			</div>
		</div>
		<div class="col-lg-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<i class="fa fa-tag"></i> CORRECTIVE MAINTENANCE
				</div>
				<div class="panel-body">
					<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal" id="<?php echo $info[0]['id_equipo']; ?>">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Corrective Maintenance
					</button><br>
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
					
					<?php 										
						if(!$listadoCorrectivos){ 
							echo '<div class="col-lg-12">
								<p class="text-danger"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> There are no records in the system.</p>
								</div>';
						} else {
					?>
					<table class="table table-bordered table-striped table-hover table-condensed">
						<tr class="dafault">
							<th class="text-center">Date</th>
							<th class="text-center">Description Fault</th>
							<th class="text-center">Requirements</th>
							<th class="text-center">User</th>
							<th class="text-center">State</th>
							<th class="text-center">Edit</th>
							<th class="text-center">Photo</th>
							<th class="text-center">Work Order</th>
						</tr>
						<?php
							foreach ($listadoCorrectivos as $data):
								echo "<tr>";					
								echo "<td class='text-center'>" . $data['fecha'] . "</td>";
								echo "<td>" . $data['descripcion'] . "</td>";
								echo "<td>" . $data['consideracion'] . "</td>";
								echo "<td>" . $data['name'] . "</td>";
								echo "<td class='text-center'>";
								switch ($data['estado']) {
									case 1:
										$valor = 'Active';
										$clase = "text-success";
										break;
									case 2:
										$valor = 'Inactive';
										$clase = "text-danger";
										break;
								}
								echo '<p class="' . $clase . '"><strong>' . $valor . '</strong></p>';
								echo "</td>";
								echo "<td class='text-center'>";
								?>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" id="<?php echo $data['id_correctivo']; ?>" >
									Edit <span class="glyphicon glyphicon-edit" aria-hidden="true">
								</button>
								<?php
								echo "</td>";
								echo "</td>";
								echo "<td class='text-center'>";
								?>
								<a href="<?php echo base_url("mantenimiento/foto_danio/" . $data['fk_id_equipo_correctivo'] . "/" . $data['id_correctivo']); ?>" class="btn btn-default btn-warning btn-xs">Foto <span class="glyphicon glyphicon-picture" aria-hidden="true"></a>
								<?php
								echo "</td>";
								echo "<td class='text-center'>";
								?>
								<a href="<?php echo base_url("ordentrabajo/crear_orden/" . $data['id_correctivo']); ?>" class="btn btn-default btn-violeta btn-xs">Crear <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></a>
								<?php
								echo "</td>";
								echo "</tr>";
							endforeach;
						?>
					</table>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>		
				
<div class="modal fade text-center" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="tablaDatos">
		</div>
	</div>
</div>

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