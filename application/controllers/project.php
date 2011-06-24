<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

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

		$this->load->model('Projectmodel');

		$data['projects'] = $this->Projectmodel->project_task_overview();

		$this->load->view('project_dashboard', $data);

	}

	public function add()
	{

		$this->load->model('Projectmodel');

		$this->Projectmodel->insert_entry();;

		redirect('project');

	}

	public function edit()
	{

		$this->load->view('project_dashboard');

	}


	public function projectform()
	{

		if(!empty($_POST['id'])) {
			$data['id'] = $_POST['id'];
			$this->load->view('project_form', $data);
		}
		else {

			$this->load->model('Clientmodel');
			$data['clients'] = $this->Clientmodel->get_active_entries();

			$this->load->view('project_form', $data);
		}

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */