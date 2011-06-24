<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{

		$this->load->model('Clientmodel');

		$data['clients'] = $this->Clientmodel->get_client_overview();

		$this->load->view('client_dashboard', $data);

	}


	public function clientform()
	{

		$this->load->model('Personmodel');

		$data['persons'] = $this->Personmodel->get_active_entries();

		$this->load->view('client_form', $data);

	}

	public function add()
	{

		$this->load->model('Clientmodel');

		$this->Clientmodel->insert_entry();

		//redirect
		redirect('/client');

	} 

}

