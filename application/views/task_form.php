<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task anlegen/bearbeiten</title>

	<?php
	$this->load->view('statics/xhtml_head');
	?>

</head>
<body>

<?php
	$this->load->view('statics/navigation');
?>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Task anlegen/bearbeiten</h1>

<?php

$outName = "";
$outDescription = "";
$outEffortplanned = "";
$outPercentfinished = "";
$outIdt_person = "";
$outIdt_project = "";


if( (!empty($taskEditID)) && ($taskEditID != 0) ) {

	$outName = $task->name;
	$outDescription = $task->description;
	$outEffortplanned = $task->effortplanned;
	$outPercentfinished = $task->percentfinished;
	$outIdt_person = $task->t_person_idt_person;

	$outIdt_project = $task_project->t_project_idt_project;

	echo form_open('task/edit');
	echo form_hidden('taskeditid', $taskEditID);

}
else {

	echo form_open('task/add');

}

?>
Name: <?php echo form_input('name', $outName); ?><br />
Description: <?php echo form_input('description', $outDescription); ?><br />
Effortplanned: <?php echo form_input('effortplanned', $outEffortplanned); ?><br />
Percentfinished: <?php echo form_input('percentfinished', $outPercentfinished); ?>

<fieldset id="projects">

	<legend>Projekt</legend>

	<select name="project" id="project">

<?php foreach ($projects as $item) {?>
	<option value="<?php echo $item->idt_project;?>"<?php if($item->idt_project == $outIdt_project) echo " SELECTED"; ?>><?php echo $item->name;?></option>
<?php } ?>

	</select>

</fieldset>

<fieldset id="persons">

	<legend>Bearbeiter</legend>

	<select name="person" id="person">

<?php foreach ($persons as $item) {?>
	<option value="<?php echo $item->idt_person;?>"<?php if($item->idt_person == $outIdt_person) echo " SELECTED"; ?>><?php echo $item->firstname;?></option>
<?php } ?>

	</select>

</fieldset>

<?php
if( (!empty($taskEditID)) && ($taskEditID != 0) ) echo form_submit('mysubmit', 'Taskänderungen speichern!');
else echo form_submit('mysubmit', 'Task anlegen!');
?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>