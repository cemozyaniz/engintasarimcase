<?php $user = get_active_user();
$settings = get_settings(); ?>

<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
        
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Kullanıcı Ayarları</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li>
                    <a href="<?php echo base_url("topics"); ?>">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text">Konu Başlıkları</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("writers"); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Yazarlar</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("articles"); ?>">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text">Makaleler</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("users"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("");?>">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>
            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>