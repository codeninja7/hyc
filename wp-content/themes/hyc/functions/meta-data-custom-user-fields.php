<?php
add_action( 'show_user_profile', 'custom_user_fields' );
add_action( 'edit_user_profile', 'custom_user_fields' );

function custom_user_fields( $user ) { ?>

	<h3>Staff Profile Information</h3>

	<table class="form-table">
		<tr>
			<th><label for="twitter">Title</label></th>
			<td>
				<input type="text" name="staff-title" id="staff-title" value="<?php echo esc_attr( get_the_author_meta( 'staff-title', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your title.</span>
			</td>
		</tr>
		<tr>
			<th><label for="twitter">Date Started</label></th>
			<td>
				<input type="text" name="staff-date-start" id="staff-date-start" value="<?php echo esc_attr( get_the_author_meta( 'staff-date-start', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter month and year you became a staff member for Herald Youth. (ex. Oct 2004)</span>
			</td>
		</tr>
		<tr>
			<th><label for="twitter">Staff Bio</label></th>
			<td>
				<textarea name="staff-bio" id="staff-bio" cols="30" /><?php echo esc_attr( get_the_author_meta( 'staff-bio', $user->ID ) ); ?></textarea> <br />
				<span class="description">Please enter a professional staff biography.</span>
			</td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'save_custom_user_fields' );
add_action( 'edit_user_profile_update', 'save_custom_user_fields' );

function save_custom_user_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'staff-title', $_POST['staff-title'] );
	update_usermeta( $user_id, 'staff-date-start', $_POST['staff-date-start'] );
	update_usermeta( $user_id, 'staff-bio', $_POST['staff-bio'] );
	
}