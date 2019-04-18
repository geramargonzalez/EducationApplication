  <?php 
 	$time = \Cake\I18n\Time::now();
 ?>

 <div class="user-details">
	<div class="text-center">
	<?= $this->Html->image('../images/users/avatar-1.jpg',['height' => '30px', 'class' => 'rounded-circle']); ?>
	</div>
	<div class="user-info">
	<h4 class="font-16"><?= $userSession['name'] . " " .  $userSession['surname'] ?></h4>
	<span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
	</div>
</div>