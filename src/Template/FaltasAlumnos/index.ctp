
<div class="row">
    <div class="col-lg-4 col-lg-offset-8">
           <?= $this->Form->create() ?>
            <div class="form-group">
                   <?= $this->Form->control('grupos', ['label' => false, 'class' => 'form-control', 'options' => $faltas]); ?>
            </div> 
            <div class="form-group">
                    <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']); ?>
            </div>

             <?= $this->Form->end() ?>
        </form>
    </div>
</div>
    