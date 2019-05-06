  <nav class="navbar-custom">
    <ul class="list-inline float-right mb-0">
           <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                 <?= $this->Html->image($user_session['image'],['height' => '30px','width' => '30px', 'class' => 'rounded-circle']); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                 <?= $this->Html->link('<i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile', ['controller'=>'Users','action' => 'profile',$user_session['id']], ['class' => 'dropdown-item','escape' => false]); ?>
                
                <?= $this->Html->link('<i class="mdi mdi-logout m-r-5 text-muted"></i> Logout', ['controller'=>'Users','action' => 'logout'], ['class' => 'dropdown-item','escape' => false]); ?>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            <h3 class="page-title">Siga el progreso de su alumno </h3>
        </li>
    </ul>
    <div class="clearfix"></div>
</nav>