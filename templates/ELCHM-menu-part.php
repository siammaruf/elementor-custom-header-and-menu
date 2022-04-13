<?php if( ! defined( 'ABSPATH' ) ) exit();

$settings = [];
if ( $args['ELCHM_settings'] ) {
	$settings = $args['ELCHM_settings'];
}
$list = $settings['list'];
$menu_title = !empty($settings['menu_title']) ? $settings['menu_title'] : 'Menu';
$menu_height = !empty($settings['menu_min_height']) ? $settings['menu_min_height'].'px' : 'auto';
?>

<style>
    .elcm-sub-list-item{
        min-height: <?=$menu_height?>;
    }
</style>

<section class="elcm-nav-section"> <!-- Start Custom Nav Section -->
    <div class="elcm-nav-header">
        <a class="elcm-nav-title" id="elcm-nav-open-btn" href="javaScript:void(0)"><?=__(esc_html($menu_title),'ELCHM')?></a>
    </div>
    <div class="elcm-nav-content">
        <div class="elcm-nav-holder">
            <div class="elcm-nav elcm-col">
                <div class="elcm-nav-parents elcm-col-3">
                    <ul>
                    <?php foreach ($list as $key => $item):
	                    $label = $item['ca_menu_label'];
                        ?>
                        <li class="menu-item" id="elcm-menu-item-<?=$key?>"><?=__($label,'ELCHM')?></li>
                    <?php endforeach;?>
                    </ul>
                </div>
                <div class="elcm-nav-childs elcm-col-9">
                    <?php foreach ($list as $key => $item):
	                    $title = $item['ca_menu_title'];
	                    $link = $item['ca_menu_link'];
	                    $menu = $item['ca_nav_menus'];
	                    $most_requested_title = $item['ca_most_requested_title'];
	                    $requested = $item['ca_most_requested'];
	                    $menu_items = wp_get_nav_menu_items( $menu );
                        ?>
                        <div class="elcm-sub-menu" data-target-id="elcm-menu-item-<?=$key?>">
                            <div class="elcm-sub-item-col elcm-col">
                                <div class="elcm-col-12 elcm-sub-menu-title">
                                    <a href="<?=esc_url($link)?>"><?=__(esc_html($title),'ELCHM')?></a>
                                </div>
                                <div class="elcm-col-6 elcm-sub-list-item">
                                    <?php if (!empty($menu_items)):?>
                                    <ul>
                                        <?php foreach ($menu_items as $k=>$sub_item):
                                            $sub_title = $sub_item->title;
                                            $url = $sub_item->url;
                                        ?>
                                            <li><a href="<?=esc_url($url)?>"><?=__(esc_html($sub_title),'ELCHM')?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                    <?php endif;?>
                                </div>
                                <div class="elcm-col-6 elcm-sub-requested-item">
                                    <h3 class="elcm-most-requested-title"><?=__(esc_html($most_requested_title),'ELCHM')?></h3>
                                    <div class="elcm-most-requested-content">
                                        <?=__($requested,'ELCHM')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Custom Nav Section -->