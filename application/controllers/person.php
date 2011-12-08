<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person extends CI_Controller {

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

		$this->load->model('Personmodel');

		$data['persons'] = $this->Personmodel->get_active_entries();

		$this->load->view('person_dashboard', $data);

	}

	public function add()
	{

		$this->load->model('Personmodel');

		//insert the new person
		$this->Personmodel->insert_entry();;

		//populate and load person view
		$data['persons'] = $this->Personmodel->get_active_entries();
		$this->load->view('person_dashboard', $data);

	}

	public function edit()
	{

		$this->load->view('person_dashboard');

	}


	public function personform()
	{

		if(!empty($_POST['id'])) {
			$data['id'] = $_POST['id'];
			$this->load->view('person_form', $data);
		}
		else {

			//load persontypes for selection
			$this->load->model('Personmodel');
			$data['persontypes'] = $this->Personmodel->get_persontypes();

			//populate addresses
			$this->load->model('Addressmodel');
			$data['addresses'] = $this->Addressmodel->get_active_entries();

			$this->load->view('person_form', $data);
		}


	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */