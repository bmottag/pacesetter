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
				<a href="<?php echo base_url('equipos/combustible/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-tint"></i> Operation Check
				</a>
				<a href="<?php echo base_url('equipos/poliza/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Documents
				</a>
				<a href="<?php echo base_url('mantenimiento/correctivo/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-wrench"></i> Corrective Maintenance
				</a>
				<a href="<?php echo base_url('equipos/inspections/' . $info[0]['id_equipo']); ?>" class="btn btn-success btn-block">
					<i class="fa fa-legal "></i> Inspection
				</a>
				<a href="<?php echo base_url('equipos/rental/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-puzzle-piece"></i> Rental History
				</a>
			</div>

		</div>

		<div class="col-lg-9">
			<div class="panel panel-success">
				<div class="panel-heading">
					<i class="fa fa-legal"></i> INSPECTION LIST
				</div>
				<div class="panel-body">
				
					<a href="<?php echo base_url('inspection/set_vehicle/' . $info[0]['id_equipo']); ?>" class="btn btn-success btn-block">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add an Inspection
					</a><br>


<?php 										
	if(!$listadoInspecciones){ 
		echo '<div class="col-lg-12">
				<p class="text-danger"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> There are no records in the system.</p>
			</div>';
	}else{
?>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<th class="text-center">Date of Issue</th>
								<th class="text-center">User</th>
								<th class="text-center">Hours/Kilometers</th>
								<th class="text-center">Inspection comment</th>
								<th class="text-center">Edit</th>
							</tr>
						</thead>
						<tbody>							
						<?php
							foreach ($listadoInspecciones as $lista):
									echo "<tr>";
									echo "<td class='text-center'>" . $lista['date_issue'] . "</td>";
									echo "<td >" . $lista['name'] . "</td>";
									echo "<td class='text-right'>" . number_format($lista['equipment_current_hours']) . "</td>";
									echo "<td>" . $lista['comments'] . "</td>";
									
									echo "<td class='text-center'>";
						?>
									<a href="<?php echo base_url($info[0]['enlace_inspeccion'] . '/' . $lista['id_inspection_' . $info[0]['vista']]); ?>" class="btn btn-success btn-xs">
										Edit <span class="glyphicon glyphicon-edit" aria-hidden="true">
									</a>
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