<script type="text/javascript" src="<?php echo base_url("assets/js/validate/equipos/foto.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	
	<!-- /.row -->
	<div class="row">

		<div class="col-lg-3 col-md-3">
		
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
				<a href="<?php echo base_url('equipos/foto/' . $info[0]['id_equipo']); ?>" class="btn btn-warning btn-block">
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
				<a href="<?php echo base_url('inspection/set_vehicle/' . $info[0]['id_equipo']); ?>" class="btn btn-outline btn-default btn-block">
					<i class="fa fa-book"></i> Inspection
				</a>
			</div>

		</div>

		<div class="col-lg-9 col-md-9">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<i class="fa fa-image"></i> <strong>PHOTO</strong>
				</div>
				<div class="panel-body">
					<div class="col-lg-8">

						<div class="form-group">
							<div class="col-lg-12">
								<p class="text-danger"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> 
									<strong>Upload</strong> the equipment photo
								</p>
							</div>
						</div>
					
						<form  name="form" id="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url("equipos/do_upload_equipo"); ?>">

							<input type="hidden" id="hddId" name="hddId" value="<?php echo $info[0]['id_equipo']; ?>"/>
							<div class="form-group">
								<label class="col-sm-3" for="comments">Photo:</label>
								<div class="col-sm-5">
									 <input type="file" name="userfile" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3" for="descripcion">Description:</label>
								<div class="col-sm-8">
								<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Description" required >
								</div>
							</div>
							
							<div class="form-group">
								<div class="row" align="center">
									<div style="width:50%;" align="center">							
										<button type="submit" id="btnFoto" name="btnFoto" class="btn btn-warning" >
											Enviar <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
										</button> 
									</div>
								</div>
							</div>
								
							<?php if($error){ ?>
							<div class="alert alert-danger">
								<?php 
									echo "<strong>Error :</strong>";
									pr($error); 
								?><!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
							</div>
							<?php } ?>
						</form>
					</div>
					
					<div class="col-lg-4">
						<div class="alert alert-warning">
								<strong>Note:</strong><br>
								Allowed format: gif - jpg - png<br>
								Maximum size: 3000 KB<br>
								Maximum width: 2024 pixels<br>
								Maximum height: 2008 pixels
						</div>
					</div>
								
				</div>
			</div>
			<!--INICIO FOTOS -->
			<?php 
				if($fotosEquipos){
			?>
			<table class="table table-bordered table-striped table-hover table-condensed">
				<tr class="dafault">
					<th class="text-center">Photo</th>
					<th class="text-center">User</th>
					<th class="text-center">Description</th>
					<th class="text-center">Delete</th>
				</tr>
				<?php
					foreach ($fotosEquipos as $data):
						echo "<tr>";					
						echo "<td class='text-center'>";

?>
 <a href="<?php echo base_url($data['equipo_foto']); ?>" target="_blank"> 
	<img src="<?php echo base_url($data['equipo_foto']); ?>" class="img-rounded" alt="Foto Equipo" width="60" height="60" />
</a>
<?php 

						echo "</td>";
						echo "<td class='text-center'>" . $data['name'] . "</td>";
						echo "<td >" . $data['descripcion'] . "</td>";
						echo "<td class='text-center'><small>";
				?>					
			<button type="button" id="<?php echo $data['id_equipo_foto']; ?>" class='btn btn-danger' title="Delete">
					<i class="fa fa-trash-o"></i>
			</button>
				<?php
						echo "</small></td>";                     
						echo "</tr>";
					endforeach;
				?>
			</table>
			<?php } ?>
			<!--FIN FOTOS -->

		</div>
		

		
	</div>
	
</div>
<!-- /#page-wrapper -->