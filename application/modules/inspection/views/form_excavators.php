<script type="text/javascript" src="<?php echo base_url("assets/js/validate/inspection/heavy_inspection.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	
<form  name="form" id="form" class="form-horizontal" method="post" >
	<input type="hidden" id="hddId" name="hddId" value="<?php echo $information?$information[0]["id_inspection_heavy"]:""; ?>"/>
	<input type="hidden" id="hddIdEquipo" name="hddIdEquipo" value="<?php echo $vehicleInfo[0]["id_equipo"]; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<i class="fa fa-search"></i><strong> EXCAVATORS INSPECTION</strong>
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

					<?php if($foto){ ?>
						<div class="form-group">
							<div class="row" align="center">
								<img src="<?php echo base_url($foto[0]["equipo_foto"]); ?>" class="img-rounded" alt="Equipment Photo" />
							</div>
						</div>
					<?php } ?>
				
					<strong>Vin Number: </strong><?php echo $vehicleInfo[0]['numero_inventario']; ?><br>
					<strong>Make: </strong><?php echo $vehicleInfo[0]['marca']; ?>
					<strong>Model: </strong><?php echo $vehicleInfo[0]['modelo']; ?><br>
					<p class='text-danger'>
						<strong>Current Hours: </strong><?php echo number_format($vehicleInfo[0]["current_hours"]); ?> hours
						<br><strong>Next oil change: </strong><?php echo number_format($vehicleInfo[0]["next_oil_change"]); ?> hours
					</p>
					
<!-- INICIO Firma del conductor -->					
<?php if($information){ 

		//si ya esta la firma entonces se muestra mensaje que ya termino el reporte
		if($information[0]["signature"]){ 
?>
					<div class="alert alert-success ">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						Thanks you have finish your Inspection Report.
					</div>
<?php   }  ?>
				<div class="col-lg-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Driver Signature
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						
							<div class="form-group">
								<div class="row" align="center">
									<div style="width:70%;" align="center">
										 
<?php 								
	$class = "btn-primary";						
	if($information[0]["signature"]){ 
		$class = "btn-default";
?>
		
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" >
	<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Signature
</button>

<div id="myModal" class="modal fade" role="dialog">  
	<div class="modal-dialog">
		<div class="modal-content">      
			<div class="modal-header">        
				<button type="button" class="close" data-dismiss="modal">×</button>        
				<h4 class="modal-title">Daily Inspection Signature</h4>      </div>      
			<div class="modal-body text-center"><img src="<?php echo base_url($information[0]["signature"]); ?>" class="img-rounded" alt="Management/Safety Advisor Signature" width="304" height="236" />   </div>      
			<div class="modal-footer">        
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>     
			</div>  
		</div>  
	</div>
</div>

<?php } ?>

<a class="btn <?php echo $class; ?>" href="<?php echo base_url("inspection/add_signature/heavy/" . $information[0]["id_inspection_heavy"]); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Signature </a>

									</div>
								</div>
							</div>
					
						</div>
						<!-- /.panel-body -->
					</div>
				</div>
<?php } ?>
<!-- FIN Firma del conductor -->

					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>HOURS</strong>
				</div>
				<div class="panel-body">
					<div class="form-group">									
						<label class="col-sm-4 control-label" for="hours">Current Hours:</label>
						<div class="col-sm-5">
							<input type="text" id="hours" name="hours" class="form-control" value="<?php echo $information?$information[0]["equipment_current_hours"]:""; ?>" placeholder="Current Hours" required >
						</div>						
					</div>
									
				</div>
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>ENGINE</strong>
				</div>
				<div class="panel-body">
									
					<div class="form-group">
						<label class="col-sm-4 control-label" for="belt">Belts/Hoses </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="belt" id="belt1" value=0 <?php if($information && $information[0]["belt"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="belt" id="belt2" value=1 <?php if($information && $information[0]["belt"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="belt" id="belt3" value=99 <?php if($information && $information[0]["belt"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-4 control-label" for="oil">Oil Level </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="oil" id="oil1" value=0 <?php if($information && $information[0]["oil_level"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="oil" id="oil2" value=1 <?php if($information && $information[0]["oil_level"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="oil" id="oil3" value=99 <?php if($information && $information[0]["oil_level"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-4 control-label" for="coolantLevel">Coolant Level </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="coolantLevel" id="coolantLevel1" value=0 <?php if($information && $information[0]["coolant_level"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="coolantLevel" id="coolantLevel2" value=1 <?php if($information && $information[0]["coolant_level"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="coolantLevel" id="coolantLevel3" value=99 <?php if($information && $information[0]["coolant_level"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="coolantLeaks">Coolant/Oil Leaks </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="coolantLeaks" id="coolantLeaks1" value=0 <?php if($information && $information[0]["coolant_leaks"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="coolantLeaks" id="coolantLeaks2" value=1 <?php if($information && $information[0]["coolant_leaks"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="coolantLeaks" id="coolantLeaks3" value=99 <?php if($information && $information[0]["coolant_leaks"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="hydrolic">Hydraulic Fluids </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="hydrolic" id="hydrolic1" value=0 <?php if($information && $information[0]["hydrolic"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="hydrolic" id="hydrolic2" value=1 <?php if($information && $information[0]["hydrolic"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="hydrolic" id="hydrolic3" value=99 <?php if($information && $information[0]["hydrolic"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>GREASING</strong>
				</div>
				<div class="panel-body">
				
					<div class="form-group">
						<label class="col-sm-4 control-label" for="boom">Boom pins </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="boom" id="boom1" value=0 <?php if($information && $information[0]["boom_grease"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="boom" id="boom2" value=1 <?php if($information && $information[0]["boom_grease"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="boom" id="boom3" value=99 <?php if($information && $information[0]["boom_grease"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
						
					<div class="form-group">
						<label class="col-sm-4 control-label" for="tableExcavator">Rotary Table </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="tableExcavator" id="tableExcavator1" value=0 <?php if($information && $information[0]["table_excavator"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="tableExcavator" id="tableExcavator2" value=1 <?php if($information && $information[0]["table_excavator"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="tableExcavator" id="tableExcavator3" value=99 <?php if($information && $information[0]["table_excavator"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="bucketPins">Bucket Pins </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="bucketPins" id="bucketPins1" value=0 <?php if($information && $information[0]["bucket_pins"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="bucketPins" id="bucketPins2" value=1 <?php if($information && $information[0]["bucket_pins"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="bucketPins" id="bucketPins3" value=99 <?php if($information && $information[0]["bucket_pins"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>LIGHTS</strong>
				</div>
				<div class="panel-body">
									
					<div class="form-group">
						<label class="col-sm-4 control-label" for="workingLamps">Work Lights </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="workingLamps" id="workingLamps1" value=0 <?php if($information && $information[0]["working_lamps"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="workingLamps" id="workingLamps2" value=1 <?php if($information && $information[0]["working_lamps"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="workingLamps" id="workingLamps3" value=99 <?php if($information && $information[0]["working_lamps"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="beaconLights">Beacon Light </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="beaconLights" id="beaconLights1" value=0 <?php if($information && $information[0]["beacon_lights"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="beaconLights" id="beaconLights2" value=1 <?php if($information && $information[0]["beacon_lights"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="beaconLights" id="beaconLights3" value=99 <?php if($information && $information[0]["beacon_lights"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">						
					<strong>EXTERIOR</strong>
				</div>
				<div class="panel-body">
									
					<div class="form-group">
						<label class="col-sm-4 control-label" for="windows">Glass (All) & Mirror(s) </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="windows" id="windows1" value=0 <?php if($information && $information[0]["windows"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="windows" id="windows2" value=1 <?php if($information && $information[0]["windows"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="windows" id="windows3" value=99 <?php if($information && $information[0]["windows"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-4 control-label" for="cleanExterior">Clean Exterior </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="cleanExterior" id="cleanExterior1" value=0 <?php if($information && $information[0]["clean_exterior"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="cleanExterior" id="cleanExterior2" value=1 <?php if($information && $information[0]["clean_exterior"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="cleanExterior" id="cleanExterior3" value=99 <?php if($information && $information[0]["clean_exterior"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="wipers">Wipers </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="wipers" id="wipers1" value=0 <?php if($information && $information[0]["wipers"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="wipers" id="wipers2" value=1 <?php if($information && $information[0]["wipers"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="wipers" id="wipers3" value=99 <?php if($information && $information[0]["wipers"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="backupBeeper">Backup Beeper </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="backupBeeper" id="backupBeeper1" value=0 <?php if($information && $information[0]["backup_beeper"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="backupBeeper" id="backupBeeper2" value=1 <?php if($information && $information[0]["backup_beeper"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="backupBeeper" id="backupBeeper3" value=99 <?php if($information && $information[0]["backup_beeper"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="door">Access Door </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="door" id="door1" value=0 <?php if($information && $information[0]["door"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="door" id="door2" value=1 <?php if($information && $information[0]["door"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="door" id="door3" value=99 <?php if($information && $information[0]["door"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-4 control-label" for="decals">Decals </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="decals" id="decals1" value=0 <?php if($information && $information[0]["decals"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="decals" id="decals2" value=1 <?php if($information && $information[0]["decals"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="decals" id="decals3" value=99 <?php if($information && $information[0]["decals"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>ATTACHMENTS/TRACKS</strong>
				</div>
				<div class="panel-body">
									
					<div class="form-group">
						<label class="col-sm-4 control-label" for="bucket">Bucket (Clean up/Digging) </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="bucket" id="bucket1" value=0 <?php if($information && $information[0]["bucket"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="bucket" id="bucket2" value=1 <?php if($information && $information[0]["bucket"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="bucket" id="bucket3" value=99 <?php if($information && $information[0]["bucket"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="cutting">Cutting edges </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="cutting" id="cutting1" value=0 <?php if($information && $information[0]["cutting_edges"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="cutting" id="cutting2" value=1 <?php if($information && $information[0]["cutting_edges"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="cutting" id="cutting3" value=99 <?php if($information && $information[0]["cutting_edges"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="tracks">Tracks </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="tracks" id="tracks1" value=0 <?php if($information && $information[0]["tracks"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="tracks" id="tracks2" value=1 <?php if($information && $information[0]["tracks"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="tracks" id="tracks3" value=99 <?php if($information && $information[0]["tracks"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-4 control-label" for="rubberTrucks">Rubber Tracks </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="rubberTrucks" id="rubberTrucks1" value=0 <?php if($information && $information[0]["rubber_trucks"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="rubberTrucks" id="rubberTrucks2" value=1 <?php if($information && $information[0]["rubber_trucks"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="rubberTrucks" id="rubberTrucks3" value=99 <?php if($information && $information[0]["rubber_trucks"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
				
					<div class="form-group">
						<label class="col-sm-4 control-label" for="rollers">Rollers </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="rollers" id="rollers1" value=0 <?php if($information && $information[0]["rollers"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="rollers" id="rollers2" value=1 <?php if($information && $information[0]["rollers"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="rollers" id="rollers3" value=99 <?php if($information && $information[0]["rollers"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="thamper">Thamper </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="thamper" id="thamper1" value=0 <?php if($information && $information[0]["thamper"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="thamper" id="thamper2" value=1 <?php if($information && $information[0]["thamper"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="thamper" id="thamper3" value=99 <?php if($information && $information[0]["thamper"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">						
					<strong>SERVICE</strong>
				</div>
				<div class="panel-body">
									
					<div class="form-group">
						<label class="col-sm-4 control-label" for="heater">A/C & Heater </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="heater" id="heater1" value=0 <?php if($information && $information[0]["heater"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="heater" id="heater2" value=1 <?php if($information && $information[0]["heater"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="heater" id="heater3" value=99 <?php if($information && $information[0]["heater"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="operatorSeat">Operator Seat </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="operatorSeat" id="operatorSeat1" value=0 <?php if($information && $information[0]["operator_seat"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="operatorSeat" id="operatorSeat2" value=1 <?php if($information && $information[0]["operator_seat"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="operatorSeat" id="operatorSeat3" value=99 <?php if($information && $information[0]["operator_seat"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="gauges">Gauges: Volt / Fuel / Temp / Oil </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="gauges" id="gauges1" value=0 <?php if($information && $information[0]["gauges"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="gauges" id="gauges2" value=1 <?php if($information && $information[0]["gauges"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="gauges" id="gauges3" value=99 <?php if($information && $information[0]["gauges"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="horn">Electrical Horn </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="horn" id="horn1" value=0 <?php if($information && $information[0]["horn"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="horn" id="horn2" value=1 <?php if($information && $information[0]["horn"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="horn" id="horn3" value=99 <?php if($information && $information[0]["horn"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-4 control-label" for="seatbelt">Seatbelt </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="seatbelt" id="seatbelt1" value=0 <?php if($information && $information[0]["seatbelt"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="seatbelt" id="seatbelt2" value=1 <?php if($information && $information[0]["seatbelt"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="seatbelt" id="seatbelt3" value=99 <?php if($information && $information[0]["seatbelt"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="cleanInterior">Clean Interior </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="cleanInterior" id="cleanInterior1" value=0 <?php if($information && $information[0]["clean_interior"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="cleanInterior" id="cleanInterior2" value=1 <?php if($information && $information[0]["clean_interior"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="cleanInterior" id="cleanInterior3" value=99 <?php if($information && $information[0]["clean_interior"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

<!-- CAMPOS QUE NO USA ESTE FORMULARIO -->	
<input type="hidden" id="bladePins" name="bladePins" value=99 >
<input type="hidden" id="ripper" name="ripper" value=99 >
<input type="hidden" id="frontAxle" name="frontAxle" value=99 >
<input type="hidden" id="rearAxle" name="rearAxle" value=99 >
<input type="hidden" id="tableDozer" name="tableDozer" value=99 >
<input type="hidden" id="pivinPoints" name="pivinPoints" value=99 >
<input type="hidden" id="bucketPinsSkit" name="bucketPinsSkit" value=99 >
<input type="hidden" id="sideArms" name="sideArms" value=99 >
<input type="hidden" id="tire" name="tire" value=99 >
<input type="hidden" id="turn" name="turn" value=99 >
<input type="hidden" id="rims" name="rims" value=99 >
<input type="hidden" id="brake" name="brake" value=99 >
<input type="hidden" id="transmission" name="transmission" value=99 >
<input type="hidden" id="blades" name="blades" value=99 >
<input type="hidden" id="drill" name="drill" value=99 >
	
	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>SAFETY</strong>
				</div>
				<div class="panel-body">
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="fire">Fire Extinguisher </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="fire" id="fire1" value=0 <?php if($information && $information[0]["fire_extinguisher"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="fire" id="fire2" value=1 <?php if($information && $information[0]["fire_extinguisher"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="fire" id="fire3" value=99 <?php if($information && $information[0]["fire_extinguisher"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label" for="aid">First Aid </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="aid" id="aid1" value=0 <?php if($information && $information[0]["first_aid"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="aid" id="aid2" value=1 <?php if($information && $information[0]["first_aid"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="aid" id="aid3" value=99 <?php if($information && $information[0]["first_aid"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label" for="spillKit">Spill Kit </label>
						<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="spillKit" id="spillKit1" value=0 <?php if($information && $information[0]["spill_kit"] == 0) { echo "checked"; }  ?>>Fail
							</label>
							<label class="radio-inline">
								<input type="radio" name="spillKit" id="spillKit2" value=1 <?php if($information && $information[0]["spill_kit"] == 1) { echo "checked"; }  ?>>Pass
							</label>
							<label class="radio-inline">
								<input type="radio" name="spillKit" id="spillKit3" value=99 <?php if($information && $information[0]["spill_kit"] == 99) { echo "checked"; }  ?>>N/A
							</label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-lg-12">				
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>COMMENTS</strong>
				</div>
				<div class="panel-body">
													
					<div class="form-group">
						<label class="col-sm-4 control-label" for="comments">Comments </label>
						<div class="col-sm-5">
						<textarea id="comments" name="comments" placeholder="Comments"  class="form-control" rows="3"><?php echo $information?$information[0]["comments"]:""; ?></textarea>
						</div>
					</div>

				</div>
			</div>
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

</form>
	
</div>
<!-- /#page-wrapper -->