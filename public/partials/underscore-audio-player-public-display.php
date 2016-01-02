<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://plugins.sanatorium.ninja
 * @since      1.0.0
 *
 * @package    Underscore_Audio_Player
 * @subpackage Underscore_Audio_Player/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="player <?php echo isset($options['autoplay']) ? 'playing' : '' ?>" data-rewind-ff-seconds="<?php echo $options['rewind_ff_seconds'] ?>">
	<audio controls <?php echo isset($options['autoplay']) ? 'autoplay' : '' ?> class="hidden">
		<source src="<?php echo $podcast_content['url'] ?>" type="<?php echo $podcast_content['type'] ?>">
	</audio>
	<div class="row top">
		<i class="icon ion-ios-rewind smaller" data-underscore-audio-player-control="rewind"></i>
		<i class="icon ion-ios-play" data-underscore-audio-player-control="play"></i>
		<i class="icon ion-ios-pause" data-underscore-audio-player-control="pause"></i>
		<i class="icon ion-ios-fastforward smaller" data-underscore-audio-player-control="fastforward"></i>
	</div>
	<div class="row bottom">
		<h5 class="time" data-underscore-audio-player-time>0:00</h5>
		<span class="timer" data-underscore-audio-player-track>
			<span data-underscore-audio-player-current-track class="current-track" style="background-color:#2ac0ff;height:100%;width:0px;display:block;">

			</span>
		</span>
		<h5 class="time" data-underscore-audio-player-remains>-0:00</h5>
	</div>
</div>