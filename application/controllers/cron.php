<?php
class Cron extends Controller {

	function Cron()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('upload');
	}

function index()
	{
		
		$this->load->model("cron_model");
        $data['pay'] = $this->cron_model->get_recharge();
		//print_r( $data['pay']);
		$this->load->view('cron',$data);
	}
		


}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
