<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address extends CI_Controller {

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

		$this->load->model('Addressmodel');

		$data['tasks'] = $this->Addressmodel->get_active_entries();

		$this->load->view('address_dashboard', $data);

	}

	public function add()
	{

		$this->load->model('Addressmodel');

		$this->Addressmodel->insert_entry();;

		redirect('address');

	}

	public function edit()
	{

		$this->load->model('Addressmodel');

		$this->Addressmodel->update_entry();

		redirect('address');

	}


	public function addressform()
	{

		$editID = $this->uri->segment(3, 0);

		if( (!empty($editID)) && ($editID != 0) ) {

			$this->load->model('Addressmodel');

			$data['addressEditID'] = $editID;
			$data['address'] = $this->Addressmodel->get_address( $editID );

			$this->load->view('address_form', $data);

		}
		else {

			$this->load->view('address_form');

		}


	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */