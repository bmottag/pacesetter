<div id="page-wrapper">
	<br>	
	<!-- /.row -->
	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">	
					<a class="btn btn-info btn-xs" href="<?php echo base_url('login/search_equipment'); ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Go Back </a> 				
					<i class="fa fa-truck"></i> EQUIPMENT LIST
				</div>
				<div class="panel-body">	

<?php 										
	if(!$info){ 
		echo '<div class="col-lg-12">
				<p class="text-danger"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> There are no records in the system.</p>
			</div>';
	}else{
?>
			
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<th class="text-center">Vin Number</th>
								<th class="text-center">Make</th>
								<th class="text-center">Model</th>
								<th class="text-center">Serial Number</th>
								<th class="text-center">State</th>
								<th class="text-center">Observation</th>
								<th class="text-center">View</th>
							</tr>
						</thead>
						<tbody>							
						<?php
							foreach ($info as $lista):
							
									echo "<tr>";
									echo "<td class='text-center'>" . $lista['numero_inventario'] . "</td>";
									echo "<td>" . $lista['marca'] . "</td>";
									echo "<td>" . $lista['modelo'] . "</td>";
									echo "<td class='text-center'>" . $lista['numero_serial'] . "</td>";
									echo "<td class='text-center'>";

									$enlace =  base_url('login/index/' . $lista['qr_code_encryption']);
									$deshabilitar = '';

									switch ($lista['estado_equipo']) {
										case 1:
											$valor = 'Active';
											$clase = "text-success";
											break;
										case 2:
											$valor = 'Inactive';
											$clase = "text-danger";
											$enlace = '#';
											$deshabilitar = 'disabled';
											break;
									}
									echo '<p class="' . $clase . '"><strong>' . $valor . '</strong></p>';
									echo "</td>";
									echo "<td>" . $lista['observacion'] . "</td>";

									echo "<td class='text-center'>";
								?>

									<a class='btn btn-success btn-xs' href='<?php echo $enlace; ?>' <?php echo $deshabilitar; ?>>
										Go <span class="fa fa-arrow-circle-right" aria-hidden="true" >
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
		paging: false,
		"searching": false,
		"pageLength": 25
	});
});
</script>