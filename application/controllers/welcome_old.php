<?php
class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
	}

	function index()
	{
		//echo 'ready';
		$this->load->library('session');
		$data	=	array(
						'user'=> '',
						'L_strErrorMessage'=> '',
						'success'=> '',
						'pass'=>'',
					);
		if($this->session->userdata('adminId') != '') {
			if($this->session->userdata('role')=='Sales')
			{
				redirect($this->config->item('base_url').'sales');
				}
			elseif($this->session->userdata('role')=='Customer')
			{
				redirect($this->config->item('base_url').'client');
				}
			elseif($this->session->userdata('role')=='Support')
			{
				redirect($this->config->item('base_url').'support');
				}
			elseif($this->session->userdata('role')=='Confirmer')
			{
				redirect($this->config->item('base_url').'confirmer');
				}
			elseif($this->session->userdata('role')=='Developer')
			{
				redirect($this->config->item('base_url').'developer');
				}
			elseif($this->session->userdata('role')=='Master')
			{
				redirect($this->config->item('base_url').'masterpanel');
				}
		} else {
			$this->load->view('login', $data);
		}
	}

	function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect($this->config->item('base_url'));
	}


	function login()
	{

		$this->load->library('session');
		$this->load->library('validation');
		if($this->input->post("action")=="login") {
			$form_field	=	array(
							'txtUserName'=> '',
							'txtPassword'=>''
							);

			$rules['txtUserName'] =	"trim|required";
			$rules['txtPassword'] =	"trim|required";

			$this->validation->set_rules($rules);

			$fields['txtUserName'] = "Email";
			$fields['txtPassword'] = "Password";

			$this->validation->set_fields($fields);

			if ($this->validation->run() == FALSE){
				if($this->validation->error_string!='') {
					foreach($form_field as $key => $value)	{	$data[$key]=$this->input->post($key);	}
				}
				$data['L_strErrorMessage'] = $this->validation->error_string;
				$this->load->view('login',$data);

			} else {
				$this->load->model('admin');
				if($this->input->post("txtUserName")) {
					$newdata = array(
								   'username'  => $this->input->post("txtUserName"),
								   'password'  => $this->input->post("txtPassword")
							   );

						if($response = $this->admin->check_login($newdata)) { // for super admin
							
							if ($response->roles=='Sales') {
								$newdata = array(
										'adminId' => $response->user_id,
										'bdmname' => $response->name.$response->lastname,
										'role' => $response->roles,
								);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url').'sales');
							}
							elseif ($response->roles=='Support') {
								$newdata = array(
										'adminId' => $response->user_id,
										'supportname' => $response->name.$response->lastname,
										'role' => $response->roles,
								);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url').'support');
							}
							elseif ($response->roles=='Customer') {
								$newdata = array(
										'adminId' => $response->user_id,
										'customername' => $response->name,
										'role' => $response->roles,
								);
							//	print_r($newdata);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url').'client');
							}
							/*elseif ($response->roles=='Confirmer') {
								$newdata = array(
										'adminId' => $response->user_id,
										'confirmername' => $response->name ,
										'role' => $response->roles,
								);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url').'confirmer');
							}
							*/elseif ($response->roles=='Developer') {
								$newdata = array(
										'adminId' => $response->user_id,
										'devname' => $response->name ,
										'role' => $response->roles,
								);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url').'developer');
							}
							elseif ($response->roles=='Master') {
								$newdata = array(
										'adminId' => $response->user_id,
										'mastername' => $response->name,
										'role' => $response->roles,
								);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url').'masterpanel');
							}
						} else {
							foreach($form_field as $key => $value)	{	$data[$key]=$this->input->post($key);	}
							$data['L_strErrorMessage'] = "Invalid UserID or password.";
							$this->load->view('login',$data);
						}
					 
				} else {
					$this->load->view('login',$data);
				}
			}
		} else {
			redirect($this->config->item('base_url'));
		}
	}


function userlogin()
	{
	
$hostname_localhost ="localhost";
$database_localhost ="dphilip_dialer_crm";
$username_localhost ="dphilip_AvNaresh";
$password_localhost ="Avyukta!@!@456";
$localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or trigger_error(mysql_error(),E_USER_ERROR);
 
mysql_select_db($database_localhost, $localhost);
 
$username = $_POST['txtUserName'];
$password = $_POST['txtPassword'];
$query_search = "select * from master_login_tbl where user_id = '".$username."' AND password = '".$password. "'";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows = mysql_num_rows($query_exec);
//echo $rows;
 if($rows == 0) { 
 echo "No Such User Found"; 
 }
 else  {
    echo "User Found"; 
}

		

}


}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */