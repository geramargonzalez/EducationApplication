
<div style="background-color: #ffd699; width:800px; border-radius:15px;">
	<span ><?php echo $this->Html->image('../images/logo.png', ['alt' => 'logo', 'style' => 'margin-top: 10px; margin-left: 15px;']); ?></span>
	<div style="padding-bottom: 40px">
	  <h2 style="color:white; text-align: center; font-size: 40px"><?= h("Hello, " . $username) . "!" ?></h2>
	  <p style="color:white; text-align: center; font-size: 20px padding-top:-30px;">Your new password is: <b><?= $password ?></b></p>	  
	</div>
</div>
