<?php global $product; ?>
<div class="modal fade modal-add-review" id="modal-add-review" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div id="new_comment_form" class="container">
					<div class="row">
						<div class="col-sm-6 center-block inner">
							<div class="media clearfix inner-bottom-xs">
								<div class="media-left">
									<?php echo woocommerce_get_product_thumbnail(); ?>
								</div>
								<div class="media-body">
									<a class="remove-button" data-dismiss="modal" aria-label="Close">x</a>
									<h4 class="product-title"><?php echo get_the_title(); ?></h4>
									<?php woocommerce_template_single_price() ; ?>
									<?php woocommerce_template_single_rating(); ?>
								</div>
							</div>
							<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

								<div id="review_form_wrapper">
									<div id="review-form">
										<?php
											$commenter = wp_get_current_commenter();

											$comment_form = array(
												'title_reply'          => have_comments() ? __( 'Add a review', 'sportexx' ) : __( 'Be the first to review', 'sportexx' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
												'title_reply_to'       => __( 'Leave a Reply to %s', 'sportexx' ),
												'comment_notes_before' => '',
												'comment_notes_after'  => '',
												'fields'               => array(
													'author' => '<div class="row"><div class="col-xs-12 col-sm-6 form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'sportexx' ) . ' <span class="required">*</span></label> ' .
													            '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
													'email'  => '<div class="col-xs-12 col-sm-6 form-group comment-form-email"><label for="email">' . __( 'Email', 'sportexx' ) . ' <span class="required">*</span></label> ' .
													            '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div></div>',
												),
												'label_submit'  => __( 'Submit', 'sportexx' ),
												'logged_in_as'  => '',
												'comment_field' => ''
											);

											if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
												$comment_form['comment_field'] = '<div class="form-group comment-form-rating"><label for="rating">' . __( 'Your Rating', 'sportexx' ) .'</label><select name="rating" id="rating">
													<option value="">' . __( 'Rate&hellip;', 'sportexx' ) . '</option>
													<option value="5">' . __( 'Perfect', 'sportexx' ) . '</option>
													<option value="4">' . __( 'Good', 'sportexx' ) . '</option>
													<option value="3">' . __( 'Average', 'sportexx' ) . '</option>
													<option value="2">' . __( 'Not that bad', 'sportexx' ) . '</option>
													<option value="1">' . __( 'Very Poor', 'sportexx' ) . '</option>
												</select></div>';
											}

											$comment_form['comment_field'] .= '<div class="form-group comment-form-comment"><label for="comment">' . __( 'Your Review', 'sportexx' ) . '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';

											comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
										?>
									</div>
								</div>

							<?php else : ?>

								<div class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'sportexx' ); ?></div>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>