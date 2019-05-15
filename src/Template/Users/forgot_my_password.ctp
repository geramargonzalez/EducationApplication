<?= $this->layout('empty'); 
 //$this->layout ='empty'; 
?>

<?= $this->Form->create() ?>
	<div class="text-center">
		<h2 class="text-center"><?= __('¿Olvidaste tu contraseña?'); ?></h2>
			 <p><?= __('Escribe tu email para que puedamos mandarte un codigo.'); ?></p>
	</div>
	<div class="form-group has-feedback">
			<?= $this->Form->control('email', ['label' => false, 'type' => 'email', 'class' => 'form-control', 'placeholder' => __('email@example.com')]) ?>
	 </div >
   	<?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-success btn-block', 'name' => 'submit'])?>
</div>
<?= $this->Form->end() ?>
