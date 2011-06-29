<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Adressen Dashboard</title>

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

<h1>Adressen Dashboard</h1>

<table cellpadding="4" cellspacing="2">

<?php foreach ($tasks as $item) {?>

<tr>
	<td colpsan="6"><?php echo $item->idt_address;?> <?php echo anchor('address/addressform/'.$item->idt_address, 'Edit', array('class' => 'edit')); ?></td>
</tr>
<tr>
	<td valign="top">
		Straße:<br />
		C/O:<br />
		PLZ/Stadt:
	</td>
	<td valign="top">
		<?php echo $item->street;?><br />
		<?php echo $item->co;?><br />
		<?php echo $item->postalcode;?> <?php echo $item->city;?>
	</td>
	<td valign="top">
		E geschäftl.:<br />
		E privat:
	</td>
	<td valign="top">
		<?php echo $item->emailbusiness;?><br />
		<?php echo $item->emailprivate;?>
	</td>
	<td valign="top">
		T geschäftl.:<br />
		T privat:<br />
		M geschäftl.:<br />
		M privat:
	</td>
	<td valign="top">
		<?php echo $item->phonebusiness;?>
		<?php echo $item->phoneprivate;?><br />
		<?php echo $item->mobilebusiness;?><br />
		<?php echo $item->mobileprivate;?>
	</td>
</tr>

<?php } ?>

</table>

<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>