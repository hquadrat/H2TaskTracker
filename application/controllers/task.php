<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {

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

		$this->load->model('Taskmodel');

		$data['tasks'] = $this->Taskmodel->get_active_entries();

		$this->load->view('task_dashboard', $data);

	}

	public function add()
	{

		$this->load->model('Taskmodel');

		$this->Taskmodel->insert_entry();;

		redirect('project');

	}

	public function edit()
	{

		$this->load->model('Taskmodel');

		$this->Taskmodel->update_entry();;
		
		redirect('project');

	}


	public function taskform()
	{

		$editID = $this->uri->segment(3, 0);

		if( (!empty($editID)) && ($editID != 0) ) {

			$this->load->model('Taskmodel');

			//task core data
			$data['taskEditID'] = $editID;
			$data['task'] = $this->Taskmodel->get_task( $editID );
			$data['task_project'] = $this->Taskmodel->get_task_project( $editID );


			//load projects for select box
			$this->load->model('Projectmodel');
			$data['projects'] = $this->Projectmodel->get_active_entries();

			//load persons for select box
			$this->load->model('Personmodel');
			$data['persons'] = $this->Personmodel->get_active_entries();


			//the view
			$this->load->view('task_form', $data);

		}
		else {

			//load projects for select box
			$this->load->model('Projectmodel');
			$data['projects'] = $this->Projectmodel->get_active_entries();

			//load persons for select box
			$this->load->model('Personmodel');
			$data['persons'] = $this->Personmodel->get_active_entries();

			$this->load->view('task_form', $data);
		}


	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */