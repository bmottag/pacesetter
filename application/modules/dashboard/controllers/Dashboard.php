<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
		$this->load->model("dashboard_model");
    }
		
	/**
	 * SUPER ADMIN DASHBOARD
	 */
	public function admin()
	{				
			$data = array();

			//Tipo -> vehiculos
			$arrParam = array(
				"idTipoEquipo" => 1,
				"estadoEquipo" => 1
			);
			$infoVehiculos = $this->general_model->get_equipos_info($arrParam);//info de vehiculos
			$data['noVehiculos'] = $infoVehiculos?count($infoVehiculos):0;

			//Tipo -> Bombas
			$arrParam = array(
				"idTipoEquipo" => 2,
				"estadoEquipo" => 1
			);
			$infoBombas = $this->general_model->get_equipos_info($arrParam);//info de bombas
			$data['noBombas'] = $infoBombas?count($infoBombas):0;
			
			$data["view"] = "dashboard";
			$this->load->view("layout", $data);
	}
	
	/**
	 * Informacion de los roles
     * @since 1/12/2020
     * @author BMOTTAG
	 */
	public function rol_info()
	{		
			$data["view"] ='rol_info';
			$this->load->view("layout", $data);
	}

	/**
	 * Calendario
     * @since 6/1/2021
     * @author BMOTTAG
	 */
	public function calendar()
	{
			$data["view"] = 'calendar';
			$this->load->view("layout", $data);
	}

	/**
	 * Consulta desde el calendario
     * @since 6/1/2021
     * @author BMOTTAG
	 */
    public function consulta() 
    {
	        header("Content-Type: text/plain; charset=utf-8"); //Para evitar problemas de acentos

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$start = substr($start,0,10);
			$end = substr($end,0,10);

			$arrParam = array(
				"from" => $start,
				"to" => $end
			);
			
			//informacion Work Order
			$rental = $this->general_model->get_rental($arrParam);
pr($rental);
			echo  '[';

			if($rental)
			{
				$longitud = count($rental);
				$i=1;
				foreach ($rental as $data):
					echo  '{
						      "title": "Rental Equipment #: ' . $data['id_equipo_rental'] . ' - Customer: ' . $data['nombre_proveedor'] . '",
						      "start": "' . $data['fecha_inicio'] . '",
						      "end": "' . $data['fecha_fin'] . '",
						      "color": "green",
						      "url": "' . base_url("equipos/detalle/" . $data['id_equipo']) . '"
						    }';

					if($i<$longitud){
							echo ',';
					}
					$i++;
				endforeach;
			}

			echo  ']';

    }
	
	
}