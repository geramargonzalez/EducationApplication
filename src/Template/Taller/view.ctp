<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
use App\Enums\RolesEnum;
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-block">
                <h3>Perfil</h3>
                <h4 class="mt-0 header-title"><?= __('Materia:' . $taller->name ) ?></h4>
                <?php if($taller->id_user != 0) {?>
                <p class="text-muted m-b-30 font-14">Docente: <?= h($user->name . " " . $user->surname) ?></p>
                <?php } else { ?>

                    <p class="text-muted m-b-30 font-14">Docente: <?= h($info) ?></p>
                      <?php }  ?>
            </div>
        </div>
    </div> <!-- end col -->
     <div class="col-12">
        <div class="card m-b-20">
            <div class="card-block">
                <h5 class="mt-0 header-title"></h5>
                
                <p class="text-muted m-b-30 font-14"></p>
                
            </div>
        </div>
    </div> <!-- end col -->  
</div> <!-- end row -->
 
 




