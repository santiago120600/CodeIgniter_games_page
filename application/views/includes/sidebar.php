<?php
  $current_session = $this->session->userdata('store_sess');
  switch($current_session->user_privilege){
    case 'Administrator':
      $menus = array(
        array("menu_text" => "Home","menu_uri" => "home", "menu_icon"=>"fas fa-home"),
        array("menu_text" => "Categories","menu_uri" => "categories", "menu_icon"=>"fas fa-list-ul",'active'=> @$categories_selected ? TRUE : FALSE ), 
        array("menu_text" => "Rates","menu_uri" => "home", "menu_icon"=>"fa fa-bar-chart"), 
        array("menu_text" => "Users","menu_uri" => "home", "menu_icon"=>"fa fa-group"), 
        array("menu_text" => "Games","menu_uri" => "home", "menu_icon"=>"fa fa-gamepad"), 
        array("menu_text" => "News","menu_uri" => "home", "menu_icon"=>"fa fa-globe"), 
        array("menu_text" => "Reviews","menu_uri" => "home", "menu_icon"=>"fa fa-edit"), 
        array("menu_text" => "Game Preview","menu_uri" => "home", "menu_icon"=>"fa fa-eye"), 
      );
    break;
    case 'Rater':
      $menus = array(
        array("menu_text" => "Home","menu_uri" => "home", "menu_icon"=>"fas fa-home"),
        array("menu_text" => "Categories","menu_uri" => "categories", "menu_icon"=>"fas fa-list-ul",'active'=> @$categories_selected ? TRUE : FALSE ), 
        array("menu_text" => "Rates","menu_uri" => "home", "menu_icon"=>"fa fa-bar-chart"), 
        array("menu_text" => "Games","menu_uri" => "home", "menu_icon"=>"fa fa-gamepad"), 
        array("menu_text" => "News","menu_uri" => "home", "menu_icon"=>"fa fa-globe"), 
        array("menu_text" => "Reviews","menu_uri" => "home", "menu_icon"=>"fa fa-edit"), 
      );
    break;
    case 'Super_Rater':
        $menus = array(
            array("menu_text" => "Home","menu_uri" => "home", "menu_icon"=>"fas fa-home"),
            array("menu_text" => "Categories","menu_uri" => "categories", "menu_icon"=>"fas fa-list-ul",'active'=> @$categories_selected ? TRUE : FALSE ), 
            array("menu_text" => "Rates","menu_uri" => "home", "menu_icon"=>"fa fa-bar-chart"), 
            array("menu_text" => "Games","menu_uri" => "home", "menu_icon"=>"fa fa-gamepad"), 
            array("menu_text" => "News","menu_uri" => "home", "menu_icon"=>"fa fa-globe"), 
            array("menu_text" => "Reviews","menu_uri" => "home", "menu_icon"=>"fa fa-edit"), 
            array("menu_text" => "Game Preview","menu_uri" => "home", "menu_icon"=>"fa fa-eye"), 
        );
      break;
  }

?>



<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><img src="img/logo/logosn.png" alt="" /></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <?php foreach($menus as $iMenu){ ?>
                    <li class="<?=@$iMenu['active'] ? 'active' : '';?>">
                        <a class="" href="<?=base_url($iMenu['menu_uri']);?>">
                            <i class="fa big-icon <?=$iMenu['menu_icon'];?> icon-wrap"></i>
                            <span class=""><?=$iMenu['menu_text'];?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </nav>
</div>