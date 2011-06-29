<?php
/* 
 * top panel navigation with help from
 * http://net.tutsplus.com/tutorials/javascript-ajax/build-a-top-panel-with-jquery/
 */

?>

<div id="navigation">

	<div id="panel_contents">

		<table id="navtable" cellpadding="0" cellspacing="0">
		<tr>
			<td><?php echo anchor('', 'Home'); ?></td>
			<td>Projekte</td>
			<td>Tasks</td>
			<td>Kunden</td>
			<td>Personen</td>
			<td>Adressen</td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo anchor('project', 'Projekt Dashboard'); ?></td>
			<td><?php echo anchor('task', 'Aufgaben Übersicht'); ?></td>
			<td><?php echo anchor('client', 'Kunden Übersicht'); ?></td>
			<td><?php echo anchor('person', 'Personen Übersicht'); ?></td>
			<td><?php echo anchor('address', 'Adressen Übersicht'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo anchor('project/projectform', 'Projekt hinzufügen', 'title="ein neues Projekt erstellen"'); ?></td>
			<td><?php echo anchor('task/taskform', 'Task hinzufügen', 'title="eine neue Aufgabe erstellen"'); ?></td>
			<td><?php echo anchor('client/clientform', 'Kunden hinzufügen', 'title="eine neue Person hinzufügen"'); ?></td>
			<td><?php echo anchor('person/personform', 'Person hinzufügen', 'title="eine neue Person hinzufügen"'); ?></td>
			<td><?php echo anchor('address', 'Adressen Übersicht'); ?></td>
		</tr>
		</table>

	</div>

	<div class="tooglebutton" id="show_button"><a href="#"><img src="<?php echo base_url(); ?>/statics/images/nav_toggle_darker.jpg" alt="Show" /></a></div>
	<div class="tooglebutton" id="hide_button"><a href="#"><img src="<?php echo base_url(); ?>/statics/images/nav_toggle_darker.jpg" alt="Hide" /></a></div>

</div>
