 <?php 
 	$time = \Cake\I18n\Time::now();
 ?>
 <?php if($user_session != null) { ?>
 <div class="top-bar-section">
    <ul class="right">
    	<li><a target="_blank" href=""><?= $time->day ." / " . $time->month . " / " . $time->year ?></a></li>
        <li><a target="_blank" href=""><?= $user_session['name'] ?></a></li>
        <li><?= $this->Html->link(__('logout'), ['controller'=>'Users','action' => 'logout']) ?></li>
    </ul>
</div>
<?php } ?>