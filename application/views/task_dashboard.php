<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tasks Dashboard</title>

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

<h1>Tasks Dashboard</h1>

<?php foreach ($tasks as $item) {?>

<div>

<h3><?php echo $item->name;?></h3>

<p><?php echo $item->description;?></p>

</div>
<?php } ?>

<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>