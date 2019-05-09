  <?php 
 	$time = \Cake\I18n\Time::now();
 ?>

 <div class="user-details">
	<div class="text-center">
	   <?= $user_session['image'] == "Null" || $user_session['image'] == "null" ? $this->Html->image('../images/users/avatar-1.jpg', ['height' => '40px','class' => 'rounded-circle']) : $this->Html->image($user_session['image'],['height' => '60px', 'class' => 'rounded-circle']);
                                             ?>
	</div>
	<div class="user-info">
	<h4 class="font-16"><?= $user_session['name'] . " " .  $user_session['surname'] ?></h4>
	<span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
	</div>
</div>