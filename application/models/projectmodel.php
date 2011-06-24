<?php

class Projectmodel extends CI_Model {

    var $name = '';
    var $description = '';
    var $effortplanned = 0;
    var $notifyowners = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_active_entries()
    {

		$this->db->from('t_project');
		$query = $this->db->get();

		return $query->result();

    }

    function project_task_overview()
    {

		$this->db->select('t_project.name AS projectname, t_project.idt_project AS projectid, t_task.name AS taskname, t_task.idt_task AS taskid, t_task.description AS taskdescription');
		$this->db->from('t_project, t_project_has_t_task, t_task');
		$this->db->where('t_project.idt_project = t_project_has_t_task.t_project_idt_project AND t_project_has_t_task.t_task_idt_task = t_task.idt_task');
//		$this->db->join('t_project_has_t_task', 't_project.idt_project = t_project_has_t_task.t_project_idt_project');
//		$this->db->join('t_task', 't_project_has_t_task.t_task_idt_task = t_task.idt_task');

		$query = $this->db->get();

		return $query->result();
		
    }

    function insert_entry()
    {

		$this->name   = $_POST['name']; // please read the below note
        $this->description = $_POST['description'];
        $this->effortplanned    = $_POST['effortplanned'];
        $this->notifyowners    = $_POST['notifyowners'];
        $this->t_state_idt_state    = 2;
        $this->t_client_idt_client    = $_POST['client'];

		$this->db->insert('t_project', $this);

	}

    function update_entry()
    {

		$this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->effortplanned    = $_POST['effortplanned'];
        $this->notifyowners    = $_POST['notifyowners'];

        $this->db->update('t_project', $this, array('id' => $_POST['id']));

    }

}

?>