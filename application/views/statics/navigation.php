<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div style="position: absolute; right: 100px; margin-top:20px; padding: 1em; border: 1px solid #d0d0d0; background-color: #efefef;">
	<h4>Navigation</h4>
	<ul>
		<li><?php echo anchor('', 'Home'); ?></li>
		<li>Projekte
			<ul>
				<li><?php echo anchor('project', 'Projekt Dashboard'); ?></li>
				<li><?php echo anchor('project/projectform', 'Projekt hinzufügen', 'title="ein neues Projekt erstellen"'); ?></li>
			</ul>
		</li>
		<li>Tasks
			<ul>
				<li><?php echo anchor('task', 'Aufgaben Übersicht'); ?></li>
				<li><?php echo anchor('task/taskform', 'Task hinzufügen', 'title="eine neue Aufgabe erstellen"'); ?></li>
			</ul>
		</li>
		<li>Kunden
			<ul>
				<li><?php echo anchor('client', 'Kunden Übersicht'); ?></li>
				<li><?php echo anchor('client/clientform', 'Kunden hinzufügen', 'title="eine neue Person hinzufügen"'); ?></li>
			</ul>
		</li>
		<li>Personen
			<ul>
				<li><?php echo anchor('person', 'Personen Übersicht'); ?></li>
				<li><?php echo anchor('person/personform', 'Person hinzufügen', 'title="eine neue Person hinzufügen"'); ?></li>
			</ul>
		</li>
		<li>Adressen
			<ul>
				<li><?php echo anchor('address', 'Adressen Übersicht'); ?></li>
				<li><?php echo anchor('address/addressform', 'Adresse hinzufügen', 'title="eine neue Person hinzufügen"'); ?></li>
			</ul>
		</li>
	</ul>
</div>