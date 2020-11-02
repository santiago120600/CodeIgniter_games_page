<?php
  $current_session = $this->session->userdata('store_sess');
  switch($current_session->user_privilege){
    case 'Administrator':
      $menus = array(
        array("menu_text" => "Categories","menu_uri" => "categories", "menu_icon"=>"fas fa-list-ul",'active'=> @$categories_selected ? TRUE : FALSE ), 
        array("menu_text" => "Rates","menu_uri" => "Rates", "menu_icon"=>"fas fa-chart-bar",'active'=> @$rates_selected ? TRUE : FALSE), 
        array("menu_text" => "Users","menu_uri" => "Users", "menu_icon"=>"fas fa-users",'active'=> @$users_selected ? TRUE : FALSE), 
        array("menu_text" => "Games","menu_uri" => "Games", "menu_icon"=>"fa fa-gamepad",'active'=> @$games_selected ? TRUE : FALSE ), 
        array("menu_text" => "News","menu_uri" => "News", "menu_icon"=>"fa fa-globe",'active'=> @$news_selected ? TRUE : FALSE)
      );
    break;
    case 'Rater':
      $menus = array(
        array("menu_text" => "Categories","menu_uri" => "categories", "menu_icon"=>"fas fa-list-ul",'active'=> @$categories_selected ? TRUE : FALSE ), 
        array("menu_text" => "Rates","menu_uri" => "Rates", "menu_icon"=>"fas fa-chart-bar",'active'=> @$rates_selected ? TRUE : FALSE), 
        array("menu_text" => "Games","menu_uri" => "Games", "menu_icon"=>"fa fa-gamepad",'active'=> @$games_selected ? TRUE : FALSE), 
        array("menu_text" => "News","menu_uri" => "News", "menu_icon"=>"fa fa-globe",'active'=> @$news_selected ? TRUE : FALSE)
      );
    break;
  }

?>



<!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                             <?php foreach($menus as $iMenu){ ?>
                                <li class="nav-item">
                                    <a class="nav-link <?=@$iMenu['active'] ? 'active' : '';?>" href="<?=base_url($iMenu['menu_uri']);?>"  aria-expanded="false"><i class="fa fa-fw <?=$iMenu['menu_icon'];?>"></i><?=$iMenu['menu_text'];?></a>
                                </li>
                            <?php } ?>
            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->