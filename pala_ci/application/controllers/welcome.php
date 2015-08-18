<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('db_table');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$this->load->view('welcome', $data);
		}
	}
	
	function test()
	{
		// $fields = $this->db->field_data('users');
		$fields = new Db_table('users');
		$fields->generate_fields();
		echo '<pre>',print_r($fields,1),'</pre>';
		// foreach ($fields as $field)
		// {
		   // echo '<pre>',print_r($field,1),'</pre>';
		// } 
	}
	
	function main()
	{
		$this->load->view('main', NULL); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */