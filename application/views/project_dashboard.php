<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Projects Dashboard</title>

	<?php
	$this->load->view('statics/css');
	?>

</head>
<body>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Projects Dashboard</h1>

<?php
	$this->load->view('statics/navigation');
?>

<?php
	//var_dump($projects);
?>

<?php

$namechecker = $projects[0]->projectname;

?>
<div>
	<h2><?php echo $projects[0]->projectname;?> <?php echo anchor('projectform/'.$projects[0]->projectid.'/edit', 'Edit', array('class' => 'edit')); ?></h2>
	<ul>
<?php

foreach ($projects as $item) {

	if( $namechecker != $item->projectname ) {
		$namechecker = $item->projectname;
?>
	</ul>
</div>
<div>
	<h2><?php echo $item->projectname;?> <?php echo anchor('project/projectform/'.$item->projectid, 'Edit', array('class' => 'edit')); ?></h2>
	<ul>

<?php
	}

?>

		<li><p><?php echo $item->taskname;?> <?php echo anchor('task/taskform/'.$item->taskid, 'Edit', array('class' => 'edit')); ?><br /><?php echo $item->taskdescription;?></p></li>

<?php } ?>
</div>

<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>