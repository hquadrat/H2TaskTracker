<?php

class Taskmodel extends CI_Model {

    var $name = '';
    var $description = '';
    var $effortplanned = 0;
    var $percentfinished = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_active_entries()
    {

		$query = $this->db->get('t_task');
        return $query->result();
		
    }

    function get_task( $requiredID )
    {

 		$query = $this->db->get_where('t_task', array('idt_task' => $requiredID), 1, 0);

		return $query->first_row();

    }

    function get_task_project( $requiredID )
    {

		$this->db->select('t_project_idt_project');
 		$query = $this->db->get_where('t_project_has_t_task', array('t_task_idt_task' => $requiredID), 1, 0);

		return $query->first_row();

    }

    function insert_entry()
    {

		$this->name   = $_POST['name'];
        $this->description = $_POST['description'];
        $this->effortplanned    = $_POST['effortplanned'];
        $this->percentfinished    = $_POST['percentfinished'];
        $this->t_person_idt_person    = $_POST['person'];

		$this->db->trans_start();

		$this->db->insert('t_task', $this);
		$last_id = $this->db->insert_id();

		$nm_relation_data = array(
		   't_project_idt_project' => $_POST['project'],
		   't_task_idt_task' => $last_id
		);

		$this->db->insert('t_project_has_t_task', $nm_relation_data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			$this->session->set_flashdata('appmessage', 'Problem: ' . $this->db->error());
		} else {

			$this->session->set_flashdata('appmessage', 'Neue Aufgabe angelegt.' );

		}

	}

    function update_entry()
    {

		$data = array(
		   'name' => $_POST['name'],
		   'description' => $_POST['description'],
		   'effortplanned' => $_POST['effortplanned'],
		   'percentfinished' => $_POST['percentfinished'],
		   't_person_idt_person' => $_POST['person'],
		);


		//encapsulate db actions in a transaction
		$this->db->trans_start();

		$this->db->where('idt_task', $_POST['taskeditid']);
		$this->db->update('t_task', $data);


		$nm_relation_data = array(
		   't_project_idt_project' => $_POST['project']
		);

		$this->db->where('t_task_idt_task', $_POST['taskeditid']);
		$this->db->update('t_project_has_t_task', $nm_relation_data);

		//end transaction
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			$this->session->set_flashdata('appmessage', 'Problem: ' . $this->db->error());
		} else {

			$this->session->set_flashdata('appmessage', 'Aufgabe erfolgreich aktualisiert.' );

		}

    }

}

?>