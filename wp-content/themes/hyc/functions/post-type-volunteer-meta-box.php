<?php 
$metaData = get_post_meta($post->ID, 'volunteer-meta', true);
?>
<table id="events-meta-data" class="form-table">
    <tbody>
        <tr>
            <th scope="row" valign="top"><label for="volunteer-meta[season]"><?php _e('Academic Year'); ?></label></th>
            <td>
            	<select id="volunteers-meta-data-season" type="text" name="volunteer-meta[start-date]">
            		<option value="spring" <?php selected( $metaData['season'], 'spring' ); ?>>Spring</option>
            		<option value="summer" <?php selected( $metaData['season'], 'summer' ); ?>>Summer</option>
            	</select>
            </td>
        </tr>
	</tbody>
</table>