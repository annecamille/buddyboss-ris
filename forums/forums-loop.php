<?php /* Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter() */ ?>

<?php do_action( 'bp_before_forums_loop' ) ?>

<?php if ( bp_has_forum_topics( bp_ajax_querystring( 'forums' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="topic-count-top">
			<?php bp_forum_pagination_count() ?>
		</div>

		<div class="pagination-links" id="topic-pag-top">
			<?php bp_forum_pagination() ?>
		</div>

	</div>

	<?php do_action( 'bp_before_directory_forums_list' ) ?>

	<table class="forum zebra">
		<thead>
			<tr>
				<th id="th-title"><?php _e( 'Topic Title', 'buddypress' ) ?></th>
				<th id="th-poster"><?php _e( 'Latest Poster', 'buddypress' ) ?></th>

				<?php if ( !bp_is_group_forum() ) : ?>
					<th id="th-group"><?php _e( 'Posted In Group', 'buddypress' ) ?></th>
				<?php endif; ?>

				<th id="th-postcount"><?php _e( 'Posts', 'buddypress' ) ?></th>

				<?php do_action( 'bp_directory_forums_extra_cell_head' ) ?>

			</tr>
		</thead>

		<tbody>

			<?php while ( bp_forum_topics() ) : bp_the_forum_topic(); ?>

			<tr class="<?php bp_the_topic_css_class() ?>">
				<td class="td-title">
					<a class="topic-title" href="<?php bp_the_topic_permalink() ?>" title="<?php bp_the_topic_title() ?> - <?php _e( 'Permalink', 'buddypress' ) ?>">
						<?php bp_the_topic_title() ?>
					</a>
				</td>
				<td class="td-poster">
					<a href="<?php bp_the_topic_permalink() ?>"><?php bp_the_topic_last_poster_avatar( 'type=thumb&width=35&height=35' ) ?></a>
					<div class="poster-name"><?php bp_the_topic_last_poster_name() ?><br /><span class="freshness"><?php bp_the_topic_time_since_last_post() ?> ago</span></div>
				</td>

				<?php if ( !bp_is_group_forum() ) : ?>
					<td class="td-group">
						<div class="object-name"><a href="<?php bp_the_topic_object_permalink() ?>" title="<?php bp_the_topic_object_name() ?>"><?php bp_the_topic_object_name() ?></a></div>
					</td>
				<?php endif; ?>

				<td class="td-postcount">
					<?php bp_the_topic_total_posts() ?>
				</td>

				<?php do_action( 'bp_directory_forums_extra_cell' ) ?>
			</tr>

			<?php do_action( 'bp_directory_forums_extra_row' ) ?>

			<?php endwhile; ?>

		</tbody>
	</table>

	<?php do_action( 'bp_after_directory_forums_list' ) ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, there were no forum topics found.', 'buddypress' ) ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_forums_loop' ) ?>
