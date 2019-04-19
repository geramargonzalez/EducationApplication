<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoEvaluacion[]|\Cake\Collection\CollectionInterface $tipoEvaluacion
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-block">
                <h4 class="mt-0 header-title">Diferentes tipos de evaluaciones</h4>
                <p class="text-muted m-b-30 font-14"> Todas las evaluaciones han sido creadas por diferentes docentes. </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                                   <tbody>
                            <?php foreach ($tipoEvaluacion as $tipoEvaluacion): ?>
                            <tr>
                               
                                <td><?= h($tipoEvaluacion->nombre) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoEvaluacion->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoEvaluacion->id]) ?>
                                   
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
