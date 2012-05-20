<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Post Type:'); ?></label>
	<br/>
	<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>">
		<option value="post" <?php selected( $category, 'post' );?> class="level-0">Blogs</option>
		<option value="volunteer" <?php selected( $category, 'volunteer' );?> class="level-0">Volunteer Opportunities</option>
		<option value="events" <?php selected( $category, 'events' );?> class="level-0">Events</option>
		<option value="announcements" <?php selected( $category, 'announcements' );?> class="level-0">Announcements</option>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Size:'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" type="text" value="<?php echo $size; ?>" />
</p>