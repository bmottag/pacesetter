<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(function(){ 
	$(".btn-success").click(function () {	
			var oID = $(this).attr("id");
            $.ajax ({
                type: 'POST',
				url: base_url + '/settings/cargarModalEmployee',
                data: {'idEmployee': oID},
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
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
					<i class="fa fa-gear fa-fw"></i> SETTINGS - USERS
					</h4>
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->				
	</div>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-users"></i> USER LIST
				</div>
				<div class="panel-body">
				
					<ul class="nav nav-pills">
						<li <?php if($state == 1){ echo "class='active'";} ?>><a href="<?php echo base_url("settings/employee/1"); ?>">Active Users</a>
						</li>
						<li <?php if($state == 2){ echo "class='active'";} ?>><a href="<?php echo base_url("settings/employee/2"); ?>">Inactive Users</a>
						</li>
					</ul>
					<br>	

<?php
	//DESHABILITAR EDICION
	$deshabilitar = '';
?>

					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal" id="x">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add User
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
	if(!$info){ 
		echo '<div class="col-lg-12">
				<p class="text-danger"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> There are no records in the system.</p>
			</div>';
	}else{
?>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Firstname</th>
								<th class="text-center">Lastname</th>
								<th class="text-center">User</th>
								<th class="text-center">Movil number</th>
								<th class="text-center">User Role</th>
								<th class="text-center">State</th>
								
								<?php if(!$deshabilitar){ ?>
								<th class="text-center">Edit</th>
								<th class="text-center">Password</th>
								<?php } ?>
								
								<th class="text-center">Email</th>
							</tr>
						</thead>
						<tbody>							
						<?php
							foreach ($info as $lista):
									echo "<tr>";
									echo "<td>" . $lista['id_user'] . "</td>";
									echo "<td>" . $lista['first_name'] . "</td>";
									echo "<td>" . $lista['last_name'] . "</td>";
									echo "<td class='text-center'>" . $lista['log_user'] . "</td>";
$movil = $lista["movil"];
// Separa en grupos de tres 
$count = strlen($movil); 
	
$num_tlf1 = substr($movil, 0, 3); 
$num_tlf2 = substr($movil, 3, 3); 
$num_tlf3 = substr($movil, 6, 2); 
$num_tlf4 = substr($movil, -2); 

if($count == 10){
	$resultado = "$num_tlf1 $num_tlf2 $num_tlf3 $num_tlf4";  
}else{
	
	$resultado = chunk_split($movil,3," "); 
}
								
									echo "<td class='text-center'>" . $resultado . "</td>";
									echo "<td class='text-center'>";
									echo '<p class="' . $lista['style'] . '"><strong>' . $lista['role_name'] . '</strong></p>';
									echo "</td>";
									
									echo "<td class='text-center'>";
									switch ($lista['state']) {
										case 0:
											$valor = 'New User';
											$clase = "text-primary";
											break;
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
									
									
									if(!$deshabilitar){ 
									
									echo "<td class='text-center'>";
						?>
									<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" id="<?php echo $lista['id_user']; ?>" >
										Edit <span class="glyphicon glyphicon-edit" aria-hidden="true">
									</button>
						<?php
									echo "</td>";
									echo "<td class='text-center'>";
							?>
									<!-- 
										Se quita la opcion de resetear la contraseña a 123456
									<a href="<?php echo base_url("admin/resetPassword/" . $lista['id_user']); ?>" class="btn btn-default btn-xs">Reset <span class="glyphicon glyphicon-lock" aria-hidden="true"></a> 
									-->
									<a href="<?php echo base_url("settings/change_password/" . $lista['id_user']); ?>" class="btn btn-default btn-xs">Change Password <span class="glyphicon glyphicon-lock" aria-hidden="true"></a>
									
							<?php
									echo "</td>";
									}
									
									echo "<td>" . $lista['email'] . "</td>";
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
		"order": [[ 1, "asc" ]],
		"pageLength": 50
	});
});
</script>