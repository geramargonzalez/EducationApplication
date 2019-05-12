
<div class="row">
    <div class="col-md-offset-2 col-md-4 col-md-offset-2">
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
    