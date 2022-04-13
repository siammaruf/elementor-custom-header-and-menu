<?php if( ! defined( 'ABSPATH' ) ) exit(); ?>
<?php
$settings = [];
if ( $args['ELCHM_settings'] ) {
	$settings = $args['ELCHM_settings'];
}

$logo_max_width = $settings['ca-header-logo-width'];
$logo_max_height = $settings['ca-header-logo-height'];
$logo_padding_top = $settings['ca-header-logo-padding-top'];
?>
<style>
    .elcm-header-section{
        width: <?=$settings['_element_width']?>;
    }
    .elcm-logo{
        padding-top: <?=$logo_padding_top.'px'?>;
        max-width: <?=empty($logo_max_width) ? 'inherit' : $logo_max_width.'px'?>;
        max-height: <?=empty($logo_max_height) ? 'inherit' : $logo_max_height.'px'?>;
    }
</style>
<div class="elcm-header-section"><!-- Start Custom Header -->
    <div class="elcm-d-flex">
        <div class="elcm-logo-area">
            <a class="elcm-logo" href="<?=home_url('/')?>">
                <img src="<?=$settings['ca-header-logo']['url']?>" alt="">
            </a>
        </div><!--./end logo area -->
        <div class="elcm-search-area">
            <?php if (!empty($settings['ca-header-lang'])):?>
            <div class="elcm-language">
                <?=$settings['ca-header-lang']?>
            </div>
            <?php endif;?>
            <div class="elcm-search">

                <form role="search" method="get" class="elcm-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="elcm-form-group">
                        <label class="elcm-screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?=$settings['ca-search-placeholder']?>"/>
                    </div>
                    <div class="form-group submit">
                        <button type="submit" class="elcm-search-btn">
                            <span class="glyphicon-search glyphicon">
                                <img src="<?=ELCHM_PLUGIN_URL.'assets/images/search.svg'?>" alt="">
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div><!--./end search area -->
    </div>
</div><! -- End Custom Header -- >


