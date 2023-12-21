<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ikt_otchet
 */
get_header();
$isLogin = is_page('login');

$menus = wp_get_nav_menus();

$itemsMenu = wp_get_nav_menu_items($menus[0]);

$url_absolute = home_url() . $url;
?>
<div class="content <?php echo (!is_user_logged_in()) ? 'login-page' : '' ?>">
	<?php if (is_user_logged_in())  get_template_part('blocks/nav'); ?>
	<main id="primary" class="site-main">
		<?php (get_page_link() == '') ? '<h1>' . the_title() . ' </h1>' : '';
		echo site_url();

		if (get_home_url() . '/' == get_page_link()) {
			echo '<div class="page-hero"><ul class="page-hero__list">';
			foreach ($itemsMenu  as $item) {
				echo '<li><a  title="' . $item->title . '" href="' . $item->url . '">' . $item->title . '</a></li>';
			}
			echo '</ul></div>';
		}
		the_content()
		?>

	</main>
	<?php get_footer(); ?>
</div>