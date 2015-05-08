<h1><?=$title?></h1>

<table class="users">

	<tr>
		<th>Id</th>
		<th>Alias</th>
		<th>Namn</th>
		<th>E-post</th>
		<th>Aktiv</th>
		<th>Borttagen</th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
 
<?php foreach ($users as $user) : ?>
<tr>
	<td><?=$user->id?></td>
	<td><?=$user->acronym?></td>
	<td><?=$user->name?></td>
	<td><?=$user->email?></td>
	<td><?=isset($user->active)? 'Ja' : 'Nej'?></td>
	<td><?=isset($user->deleted)? 'Ja' : 'Nej'?></td>
	<td><?=isset($user->active)? '<a href="'.$this->url->create('users/deactivate/'.$user->id).'">Avaktivera</a>' : '<a href="'.$this->url->create('users/activate/'.$user->id).'">Aktivera</a>' ?></td>
	<td><?=isset($user->deleted)? '<a href="'.$this->url->create('users/soft-undelete/'.$user->id).'">Återskapa</a>' : '<a href="'.$this->url->create('users/soft-delete/'.$user->id).'">Kasta</a>' ?></td>
	<td><a href="<?=$this->url->create('users/delete/' . $user->id) ?>">Radera</a></td>
	<td><a href="<?=$this->url->create('users/update/' . $user->id) ?>">Redigera</a></td>
</tr>
 
<?php endforeach; ?>
 
</table>

<p><a href='<?=$this->url->create('')?>'>Home</a></p>