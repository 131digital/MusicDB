<!-- Main menu -->
<!-- This is the structure of main menu -->
<?php
	$page_name = action(1);
?>
<ul id="main-menu" class="radius-top clearfix">
    <li>
        <a href="<?=_URL_?>/admin/dashboard" <?php if ( $page_name == 'index' ) echo 'class="active"'; ?>>
            <img src="<?=themes("admin/")?>img/m-dashboard.png" alt="Dashboard" />
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <!-- Make sure to require the class submenu-active if you are planning to have a submenu with this category/link -->
        <a href="<?=_URL_?>/admin/dashboard" <?php if ( $page_name == 'users' ) echo 'class="active submenu-active"'; ?>>
            <img src="<?=themes("admin/")?>img/m-users.png" alt="Users" />
            <span>Users</span>
            <span class="submenu-arrow"></span><!-- Also this is required for the submenu -->
        </a>
    </li>
    <li>
        <a href="<?=_URL_?>/admin/news" <?php if ( $page_name == 'news' ) echo 'class="active"'; ?>>
            <img src="<?=themes("admin/")?>img/m-articles.png" alt="Articles" />
            <span>News</span>
        </a>
    </li>
    <li>
        <a href="<?=_URL_?>/admin/artist" <?php if ( $page_name == 'artist' ) echo 'class="active"'; ?>>
            <?=global_img("artist.png", "alt='Artist'");?>
            <span>Artist</span>
        </a>
    </li>
    <li>
        <a href="<?=_URL_?>/admin/song" <?php if ( $page_name == 'song' ) echo 'class="active"'; ?>>
            <?=global_img("music.png", "alt='Song'");?>
            <span>Songs</span>
        </a>
    </li>
    <li>
        <a href="<?=_URL_?>/admin/queue" <?php if ( $page_name == 'queue' ) echo 'class="active"'; ?>>
            <img src="<?=themes("admin/")?>img/queue.png" alt="queue" />
            <span>Todo List</span>
        </a>
    </li>
    <li>
        <a href="#" <?php if ( $page_name == 'statistics' ) echo 'class="active"'; ?>>
            <img src="<?=themes("admin/")?>img/m-statistics.png" alt="Statistics" />
            <span>Statistics</span>
        </a>
    </li>
    <li>
        <a href="#" <?php if ( $page_name == 'settings' ) echo 'class="active"'; ?>>
            <img src="<?=themes("admin/")?>img/m-settings.png" alt="Settings" />
            <span>Settings</span>
        </a>
    </li>
    <li>
        <a href="<?=_URL_?>/admin/plugins" <?php if ( $page_name == 'modules' ) echo 'class="active submenu-active"'; ?>>
           	<?=global_img("setting.gif");?>
            <span>Plugins</span>
            <span class="submenu-arrow"></span>
        </a>
    </li>
</ul>
<!-- END Main menu -->

<!-- Submenu -->
<!-- Depending on the page we are, we make visible the submenu we need -->
<?php if ( $page_name == 'users' ) { ?>
<ul id="sub-menu" class="clearfix">
    <li><a href="page_users.php" <?php if ( $subpage_name == 'manage_users' ) echo 'class="active"'; ?>>Manage Users</a></li>
    <li><a href="page_users_add.php" <?php if ( $subpage_name == 'add_user' ) echo 'class="active"'; ?>>Add User</a></li>
</ul>
<?php } else if ( $page_name == 'custom' ) { ?>
<ul id="sub-menu" class="clearfix">
    <li><a href="javascript: void(0)" class="active" onclick="return layout_handler( this, 'clear' )">Fixed layout</a></li>
    <li><a href="javascript: void(0)" onclick="return layout_handler( this, 'fluid' )">Fluid layout</a></li>
    <li><a href="javascript: void(0)" onclick="return layout_handler( this, 'fixed-adminbar' )">Fixed layout + Fixed Adminbar</a></li>
    <li><a href="javascript: void(0)" onclick="return layout_handler( this, 'fluid-fixed-adminbar' )">Fluid layout + Fixed Adminbar</a></li>
</ul>
<?php } ?>
<!-- END Submenu -->