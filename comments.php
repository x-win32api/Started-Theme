<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Started
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>
<?php if ( post_password_required() ) 
{ return; }
?>

<div id="comments">
<?php if ( have_comments() ) : ?>
		<div class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
				    'callback' => 'mytheme_comment'
				) );
			?>
		</div>
<?php endif; ?>
</div>

<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :	?>
		<p class="no-comments"><?php _e( 'Comments are closed.' ); ?></p>
<?php endif; ?>

<?php $defaults = array(
		'fields'=> array(
		'author' => '<div class="inputText"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="Ваше имя" /></div>',
		'email'  => '<div class="inputText"><input id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="E-mail" aria-describedby="email-notes" /></div>',
		'cookies' => false, 
		),
		'comment_field'        => '<div class="inputText"><textarea id="comment" name="comment" cols="45" rows="4"  aria-required="true" required="required" placeholder="Отзыв"></textarea></div>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'comment_notes_before' => '', // текст перед формой комментирования
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'comment-form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => 'Оставьте Ваш отзыв о "'.get_the_title().'"',
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'title_reply_before'   => '<div id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</div>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => '<div class="inputText"><input name="%1$s" type="submit" id="%2$s" class="btn %3$s" value="Оставить отзыв" /></div>',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		'format'               => 'xhtml',
	);

	comment_form( $defaults ); 
	?>
</div><!-- #comments -->
