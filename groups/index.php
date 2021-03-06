<?php

/**
 * BuddyPress - Groups Directory
 *
 * @package BuddyPress
 * @subpackage BuddyBoss
 */

?>
  
<?php get_header( 'buddypress' ); ?>

  <?php locate_template( array( 'sidebar-left.php' ), true ) ?>

	<?php do_action( 'bp_before_directory_groups_content' ); ?>

  <?php if ( is_active_sidebar('groups') ) : ?>
    <div id="content" class="three_column" >
  <?php else: ?>
    <div id="content" class="two_column_left" >
  <?php endif; ?>

		<div class="padder">

		<form action="" method="post" id="groups-directory-form" class="dir-form">
			
			<h1><?php the_title(); ?></h1>

<?php if ( is_user_logged_in() && bp_user_can_create_groups() ) : ?><a class="button-2"href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/create' ); ?>"><?php _e( 'Create a Group', 'buddypress' ); ?></a><?php endif; ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="entry-directory">
					<?php the_content(); ?>
				</div>
			<?php endwhile; endif; ?>
			
			<?php do_action( 'bp_before_directory_groups_content' ) ?>

			<div class="item-list-tabs" role="navigation">
				<ul>
					<li class="selected" id="groups-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() ); ?>"><?php printf( __( 'All Groups <span>%s</span>', 'buddypress' ), bp_get_total_group_count() ); ?></a></li>

					<?php if ( is_user_logged_in() && bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

						<li id="groups-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_groups_slug() . '/my-groups' ); ?>"><?php printf( __( 'My Groups <span>%s</span>', 'buddypress' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

					<?php endif; ?>

					<?php do_action( 'bp_groups_directory_group_types' ); ?>
					
					<li id="groups-order-select" class="last filter">

						<label for="groups-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
						<select id="groups-order-by">
							<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
							<option value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></option>
							<option value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>

							<?php do_action( 'bp_groups_directory_order_options' ); ?>

						</select>
					</li>

				</ul>
			</div><!-- .item-list-tabs -->

			<div id="groups-dir-list" class="groups dir-list">
				<?php locate_template( array( 'groups/groups-loop.php' ), true ) ?>
			</div>

			<?php do_action( 'bp_directory_groups_content' ); ?>

			<?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>

		</form><!-- #groups-directory-form -->

		<?php do_action( 'bp_after_directory_groups_content' ) ?>

		</div><!-- .padder -->
	</div><!-- #content -->
	
	<div id="group-dir-search" class="dir-search">
		<?php bp_directory_groups_search_form(); ?>
	</div>
	
	<?php do_action( 'bp_after_directory_groups_content' ); ?>

	<?php locate_template( array( 'sidebar-directory.php' ), true ) ?>

<?php get_footer() ?>
