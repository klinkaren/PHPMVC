<h1><?=$title?></h1>
 
<p>Id: <?=$user->id?></p>
<p>Namn: <?=$user->name?></p>
<p>Alias: <?=$user->acronym?></p>
<p>E-post: <?=$user->email?></p>
 
<p><a href='<?=$this->url->create('users/list')?>'>Visa alla användare</a></p> 