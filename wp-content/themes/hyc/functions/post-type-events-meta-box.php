<?php 
$metaData = get_post_meta($post->ID, 'events-meta', true);
?>
<table id="events-meta-data" class="form-table">
    <tbody>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[start-date]"><?php _e('Start Date'); ?></label></th>
            <td>
                <input id="events-meta-data-start-date" type="text" name="events-meta[start-date]" value="<?php _e($metaData['start-date']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[end-date]"><?php _e('End Date'); ?></label></th>
            <td>
                <input id="events-meta-data-end-date" type="text" name="events-meta[end-date]" value="<?php _e($metaData['end-date']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[time]"><?php _e('Time'); ?></label></th>
            <td>
                <input id="events-meta-data-start-time" type="text" name="events-meta[start-time]" value="<?php _e($metaData['start-time']);?>"/> - <input id="events-meta-data-end-time" type="text" name="events-meta[end-time]" value="<?php _e($metaData['end-time']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[street1]"><?php _e('Street Address'); ?></label></th>
            <td>
                <input id="events-meta-data-street" type="text" name="events-meta[street1]" value="<?php _e($metaData['street1']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[street2]"></label></th>
            <td>
                <input id="events-meta-data-street2" type="text" name="events-meta[street2]" value="<?php _e($metaData['street2']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[city]"><?php _e('City'); ?></label></th>
            <td>
                <input id="events-meta-data-city" type="text" name="events-meta[city]" value="<?php _e($metaData['city']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[state]"><?php _e('State'); ?></label></th>
            <td>
                <input id="events-meta-data-state" type="text" name="events-meta[state]" value="<?php _e($metaData['state']);?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><label for="events-meta[zip-code]"><?php _e('Zip Code'); ?></label></th>
            <td>
                <input id="events-meta-data-zip" type="text" name="events-meta[zip-code]" value="<?php _e($metaData['zip-code']);?>"/>
            </td>
        </tr>
    </tbody>
</table>
<script>
(function($){
	$('#events-meta-data-start-date,#events-meta-data-end-date').datepicker();
	$("#events-meta-data-start-time, #events-meta-data-end-time").timePicker({show24Hours: false});
	var oldTime = $.timePicker("#events-meta-data-start-time").getTime();
	$("#events-meta-data-start-time").change(function() {
	  if ($("#events-meta-data-end-time").val()) {
	    var duration = ($.timePicker("#events-meta-data-end-time").getTime() - oldTime);
	    var time = $.timePicker("#events-meta-data-start-time").getTime();
	    $.timePicker("#events-meta-data-end-time").setTime(new Date(new Date(time.getTime() + duration)));
	    oldTime = time;
	  }
	});
	$("#events-meta-data-end-time").change(function() {
	  if($.timePicker("#events-meta-data-start-time").getTime() > $.timePicker(this).getTime()) {
	    $(this).addClass("error");
	  }
	  else {
	    $(this).removeClass("error");
	  }
	});
})(jQuery);
</script>


