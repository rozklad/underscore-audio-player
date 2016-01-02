

var Underscore_Audio_Player = {


	init: function($player) {

		this.$player = $player;

		this.audio = this.$player.find('audio')[0];

		this.playing = this.$player.hasClass('playing');

		this.duration = this.audio.duration;

		this.getSettings();

		this.cacheSelectors();

		this.setEventListeners();

		if ( this.playing )
			this.setIntervalActions();

	},

	getSettings: function() {

		this.rewind_ff_seconds = parseInt( this.$player.data('rewind-ff-seconds') );

	},

	cacheSelectors: function() {

		this.$time = this.$player.find('[data-underscore-audio-player-time]');

		this.$remains = this.$player.find('[data-underscore-audio-player-remains]');

		this.$track = this.$player.find('[data-underscore-audio-player-track]');

		this.$currentTrack = this.$player.find('[data-underscore-audio-player-current-track]');

	},

	setEventListeners: function() {

		var self = this;

		this.$player.find('[data-underscore-audio-player-control]').click(function(event){

			event.preventDefault();

			var $this = $(this),
				action = $this.data('underscore-audio-player-control');

			switch( action ) {

				case 'play':

					self.play();

				break;

				case 'pause':

					self.pause();

				break;

				case 'rewind':

					self.rewind();

				break;

				case 'fastforward':

					self.fastforward();

				break;

			}

			if ( self.playing ) {
				self.setIntervalActions();
			} else {
				self.clearIntervalActions();
			}

		}).css('cursor', 'pointer');


		this.audio.addEventListener('loadedmetadata', function() {
			
			self.setTimer();

			self.setRemains();
		
		});

		this.$track.click(function(event){

			event.preventDefault();

			var parentOffset = $(this).offset(); 
   			var relX = event.pageX - parentOffset.left;
   			var width = $(this).width();
   			var percentual = relX/width * 100;

   			self.moveToPercentage(percentual);
		
		}).css('cursor', 'pointer');

		$(window).on('keyup', function(event){

			var key = event.keyCode ? event.keyCode : event.which;

			switch ( key ) {
				
				// Space
				case 32:

					event.preventDefault();
					
					self.togglePlay();

				break;

				// Left arrow
				case 37:

					event.preventDefault();

					self.rewind();

				break;

				// Right arrow
				case 39:

					event.preventDefault();

					self.fastforward();

				break;
			
			}

		});

	},

	play: function() {

		var self = this;

		self.audio.play();

		self.$player.addClass('playing');

		self.playing = true;

	},

	pause: function() {

		var self = this;

		self.audio.pause();

		self.$player.removeClass('playing');

		self.playing = false;

	},

	rewind: function() {

		var self = this;

		self.audio.currentTime = self.audio.currentTime - self.rewind_ff_seconds;

		this.setTimeActions();

	},

	fastforward: function() {

		var self = this;

		self.audio.currentTime = self.audio.currentTime + self.rewind_ff_seconds;

		this.setTimeActions();

	},

	togglePlay: function() {

		var self = this;

		if ( self.playing ) {

			self.pause();

			self.clearIntervalActions();
		
		} else {
		
			self.play();

			self.setIntervalActions();
		
		}
	},

	setIntervalActions: function() {

		var self = this;

		self.timerInterval = setInterval(function(){

			self.setTimer();

			self.setRemains();

			self.setTrack();

		}, 500);

	},

	clearIntervalActions: function() {

		clearInterval(this.timerInterval);

	},

	setTimeActions: function() {

		this.setTimer();
		this.setRemains();
		this.setTrack();
	},

	setTimer: function() {

		var currentTime = moment.utc( this.audio.currentTime * 1000 ).format("mm:ss");
		this.$time.text( currentTime );
	
	},

	setRemains: function() {

		var remains = moment.utc( (this.audio.duration - this.audio.currentTime) * 1000 ).format("mm:ss");
		this.$remains.text( '-' + remains );

	},

	setTrack: function() {

		var percentualTrack = ( this.audio.currentTime / this.audio.duration ) * 100;
		
		this.$currentTrack.width( percentualTrack + '%' );

		if ( percentualTrack == 100 )
			this.clearIntervalActions();
	},

	moveToPercentage: function(percentage) {

		this.moveTo(this.audio.duration / 100 * percentage);
	},

	moveTo: function(absolute) {

		this.audio.currentTime = absolute;

		this.setTimeActions();

	}

};

(function( $ ) {
	'use strict';

	$(function() {

		$('.player').each(function(){
			
			Underscore_Audio_Player.init($(this));
		
		});

	});

})( jQuery );
