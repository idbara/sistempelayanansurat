<?php
/**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	function index()
	{
		$this->load->view('auth/login');
	}
	function proseslogin()
	{
		$data = array('username' => $this->input->post('username'),'password' => $this->input->post('password') );
		$result = $this->Login_model->login($data);
		if ($result == 1) {

			$username = $this->input->post('username');
			$session_data = array(
				'username' => $username
			);
			$this->session->set_userdata('logged_in', $session_data);
			$pesan = array('status' => 200,'messages'=> 'sukses' );
			echo json_encode($pesan);
		} else {
			$pesan = array('status' => 404,'messages'=> 'Username atau password salah!' );
			echo json_encode($pesan);
		}
	}
	function logout()
	{
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('login');
	}

}