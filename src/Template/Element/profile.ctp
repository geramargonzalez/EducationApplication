 <div class="top-bar-section">
    <ul class="right">
        <li><a target="_blank" href="https://book.cakephp.org/3.0/"><?= $userSession['name'] ?></a></li>
        <li><?= $this->Html->link(__('logout'), ['controller'=>'Users','action' => 'logout']) ?></li>
    </ul>
</div>