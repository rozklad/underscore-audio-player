<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://plugins.sanatorium.ninja
 * @since      1.0.0
 *
 * @package    Underscore_Audio_Player
 * @subpackage Underscore_Audio_Player/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
	
	<h1><?php _e('Underscore Audio Player') ?></h1>

	<form method="post">

		<table cellpadding="0" cellspacing="0" class="plugin_options">
			<tbody>

				<tr>
					<th colspan="2" class="title">
						<?php _e('General Options') ?>
					</th>
				</tr>
				<tr>
					<th><?php _e('Autoplay') ?></th>
					<td><input name="<?php echo $class ?>[autoplay]" value="1" type="checkbox" <?php echo isset($options['autoplay']) ? 'checked="checked"' : "" ?>></td>
				</tr>

				<tr>
					<th><?php _e('Rewind/Fastforward seconds') ?></th>
					<td><input name="<?php echo $class ?>[rewind_ff_seconds]" type="text" value="<?php echo $options['rewind_ff_seconds'] ?>"></td>
				</tr>

			</tbody>

			<tfoot>
				<tr>
					<th colspan="2">
						<input name="save" type="submit" class="button button-primary button-large" value="<?php _e('Update Options') ?>">
					</th>
				</tr>
			</tfoot>
		</table>

		<!-- Dummy input if the others are only checkboxes -->
		<input type="hidden" name="<?php echo $class ?>[class]" value="<?php echo $class ?>">

	</form>

</div>