;(function($) {
	"use strict";

	/**
	 * http://www.sitepoint.com/css3-animation-javascript-event-handlers/
	 */
	var pfx = ["webkit", "moz", "MS", "o", ""];
	function PrefixedEvent(element, type, callback) {
		for (var p = 0; p < pfx.length; p++) {
			if (!pfx[p]) type = type.toLowerCase();
			element.addEventListener(pfx[p]+type, callback, false);
		}
	}

	if(typeof String.prototype.trim !== 'function') {
		String.prototype.trim = function() {
			return this.replace(/^\s+|\s+$/g, ''); 
		}
	}

	$(document).on('ready', function() {

		// Accordion
		var slideAccordionItem = function($el) {
			if ($el.is(':visible')) {
				$el.stop().slideUp(500);
			} else {
				$el.stop().slideDown(500);
			}
		};
		$('.vp-js-accordion').each(function(i, el) {

			var $el           = $(el),
			    open_multiple = $el.data('openmultiple'),
			    $toggles      = $el.find('.vp-accordion-pane-heading > a');

			$toggles.on('click', function(e) {
				e.preventDefault();

				var $this         = $(this),
				    $li           = $this.parents('.vp-accordion-pane'),
				    $core         = $li.find('.vp-accordion-pane-core'),
				    $visible_li   = $li.parent().find('.vp-accordion-pane.vp-active'),
				    $visible_pane = $visible_li.find('.vp-accordion-pane-core');

				if ($li.hasClass('vp-active')) {
					// close active item
					$li.removeClass('vp-active');
					slideAccordionItem($core);
				} else {
					// open other item
					$li.addClass('vp-active');
					slideAccordionItem($core);
					if (!open_multiple) {
						$visible_li.removeClass('vp-active');
						slideAccordionItem($visible_pane);
					}
				}
			});

			// initiate active items
			if (!open_multiple) $el.children('.vp-accordion-pane.vp-active').removeClass('vp-active').last().addClass('vp-active');
			slideAccordionItem($el.find('.vp-accordion-pane.vp-active > .vp-accordion-pane-core'));

		});

		// Tabs
		$('.vp-js-tabs').each(function(i, el) {

			var $el           = $(el),
			    default_index = $el.data('defaultindex'),
			    $toggles      = $el.find('.vp-tabs-nav > li > a');

			$toggles.on('click', function(e) {
				e.preventDefault();

				var $this = $(this),
				    $li = $this.parent('li'),
				    $panel = $el.find('.vp-tab:nth-child(' + $this.data('index') + ')'),
				    $visible_li = $el.find('.vp-tabs-nav > li:visible'),
				    $visible_panel = $el.find('.vp-tab:visible');

				if ($visible_panel.get(0) === $panel) return;

				if ($visible_panel.length > 0) {
					$visible_li.removeClass('vp-active');
					$visible_panel.removeClass('vp-active');
					$li.addClass('vp-active');
					$panel.addClass('vp-active');
					$visible_panel.stop().fadeOut(250, function() {
						$panel.stop().fadeIn(250);
					});
				} else {
					$li.addClass('vp-active');
					$panel.addClass('vp-active');
					$panel.stop().fadeIn(250);
				}
			});

			$toggles[default_index].click();
		});

		// Alert Close
		$('.vp-js-alert-close').on('click', function(e) {
			e.preventDefault();
			var $alert = $(this).parent('.vp-alert');
			$alert.fadeOut(500);
		});

		// Google Maps
		var gmapSetMarker = function(map, lat, lng, icon) {
			var latlng = new google.maps.LatLng(lat, lng);
			var marker = new google.maps.Marker({
				position: latlng,
				animation: google.maps.Animation.DROP,
				map: map
			});
			if (icon) {
				marker.setIcon({url: icon});
			}
		};
		var geoParser = function(geostring) {
			var coords      = geostring.split('|'),
			    geo         = [],
			    coordFilter = function(n) {
					n = n.trim();
					if ($.isNumeric(n)) return n;
					return null;
				};
			for (var i = 0; i < coords.length; i++) {
				var coord = coords[i].split(',');
				coord = $.map(coord, coordFilter);
				if (coord.length === 2)
					geo.push(coord);
			}
			return geo;
		};
		if (window.google !== undefined) google.maps.event.addDomListener(window, 'load', initGMAP);

		function initGMAP() {
			$('.vp-js-google-maps').each(function() {
				var $this       = $(this),
				    $canvas     = $this.find('.vp-map-canvas'),
				    latlng      = $this.data('latlng'),
				    icon        = $this.data('icon'),
					addr        = $this.data('address'),
					zoom        = $this.data('zoom'),
					markers     = [],
					animDelay   = 500, //ms
					options     = {
						'zoom': zoom,
						'scrollwheel': false,
						'disableDefaultUI': true,
						'zoomControl': true,
						'zoomControlOptions': {'style': google.maps.ZoomControlStyle.SMALL}
					},
				    lat, lng;

				function addMarker(map, lat, lng, icon) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(lat, lng),
						draggable: false,
						animation: google.maps.Animation.DROP,
						map: map

					});
					if (icon) {
						marker.setIcon({url: icon});
					}
					markers.push(marker);
				}

				var map = new google.maps.Map($canvas[0], options);

				if (!(latlng)) {
					if (addr) {
						var geocoder         = new google.maps.Geocoder(),
						    geoCoderCallback = function(i) {
								return function(results, status) {
									if(status == google.maps.GeocoderStatus.OK) {
										lat = results[0].geometry.location.lat();
										lng = results[0].geometry.location.lng();
									} else {
										lng = 0; lat = 0;
									}
									// if it's the first coord, set center
									if(i === 0)
										map.setCenter(new google.maps.LatLng(lat, lng));
									// set marker
									gmapSetMarker(map, lat, lng, icon);
								};
						    };
							delayedSetMarker = function(addr, i) {
								return function(){
									geocoder.geocode({'address': addr}, geoCoderCallback(i));
								};
							};
						addr = addr.split('|');
						for (var i = 0; i < addr.length; i++) {
							setTimeout(delayedSetMarker(addr[i].trim(), i), i * animDelay * 2);
						}
					}
				}
				else {
					// set marker
					var delayedSetMarker = function(lat, lng) {
							return function(){
								gmapSetMarker(map, lat, lng, icon);
							};
						},
						coords = geoParser(latlng);

					// center at first coord
					map.setCenter(new google.maps.LatLng(coords[0][0], coords[0][1]));
					for (var i = 0; i < coords.length; i++) {
						setTimeout(delayedSetMarker(coords[i][0], coords[i][1]), i * animDelay);
					}
				}
			});
		}

		// Progress Bar
		$('.vp-js-progress-bar').each(function(i, el) {

			var $el    = $(el),
			    $bar   = $el.find('.vp-progress-bar-thumb'),
			    $label = $el.find('.vp-progress-bar-label'),
			    label  = $el.data('label'),
			    value  = $el.data('value'),
			    min    = $el.data('min'),
			    max    = $el.data('max');

			var animateBar = function(){
				$({progress: min}).animate({progress: value}, {
					duration: 1000,
					step: function(now, tween) {
						var percent = Math.max(0, Math.min(100, Math.round((now - min) * 100 * 10 / (max - min)) / 10)) + '%';

						if (label == 'value') $label.html(Math.round(now));
						else if (label == 'percent') $label.html(percent);
						$bar.width(percent);
					}
				});
			};

			if ($el.data('animated')) {

				(function(min, max, value, label){
					if (label == 'value') $label.html(min);
					else if (label == 'percent') $label.html('0%');
					$bar.width('0%');

					var $parent = $el.parent();
					$el.one('inview', function(event, isInView, visiblePartX, visiblePartY) {
						if( $parent.hasClass( 'animation' ) )
							PrefixedEvent($parent.get(0), "AnimationEnd", function(){
								animateBar();
							});
						else
							animateBar();
					});
				}(min, max, value, label));
			} else {
				var percent = Math.max(0, Math.min(100, Math.round((value - min) * 100 * 10 / (max - min)) / 10)) + '%';
				if (label == 'value') $label.html(value);
				else if (label == 'percent') $label.html(percent);
				$bar.width(percent);
			}
		});

		// Counter
		$('.vp-js-counter').each(function(i, el) {

			var $el      = $(el),
			    $value   = $el.find('.vp-counter-value'),
			    $caption = $el.find('.vp-counter-caption'),
			    begin    = $el.data('begin'),
			    end      = $el.data('end');

			var animateCounter = function(){
				$({progress: begin}).animate({progress: end}, {
					duration: 2000,
					step: function(now, tween) {
						$value.html(Math.ceil(now));
					},
					complete: function() {
						$caption.fadeIn(100);
					}
				});
			};

			(function(begin, end){

				var $parent = $el.parent();
				$el.one('inview', function(event, isInView, visiblePartX, visiblePartY) {
					if( $parent.hasClass( 'animation' ) )
						PrefixedEvent($parent.get(0), "AnimationEnd", function(){
							animateCounter();
						});
					else
						animateCounter();
				});
			}(begin, end));

		});

		// Progress Ring
		$('.vp-js-progress-ring').each(function(i, el) {

			var $el         = $(el),
			    $input      = $el.find('.vp-progress-ring-canvas > input'),
			    label       = $el.data('label'),
			    thickness   = $el.data('thickness'),
			    diameter    = $el.width(),
			    min         = $el.data('min'),
			    max         = $el.data('max'),
			    value       = $input.val(),
			    fg_color    = $el.find('.vp-dummy-background-color').css('color'),
			    bg_color    = $el.find('.vp-dummy-track-color').css('color'),
			    input_color = $el.find('.vp-dummy-color').css('color');

			$input.knob({
			    lineCap      : 'round',
			    readOnly     : true,
			    min          : min,
			    max          : max,
			    thickness    : thickness,
			    width        : diameter,
			    height       : diameter,
			    displayInput : (label !== 'none'),
			    fgColor      : fg_color,
			    bgColor      : bg_color,
			    inputColor   : input_color,
			    inline       : false,
			});

			var animateRing = function(){
				$({progress: min}).animate({progress: value}, {
					duration: 1000,
					step: function(now, tween) {
						var percent = Math.max(0, Math.min(100, Math.round((now - min) * 100 * 10 / (max - min)) / 10)) + "%";

						$input.val(Math.round(now)).trigger('change');
						if (label === 'percent') $input.val(percent);
					}
				});
			};

			// centerize progress ring
			$el.find('.vp-progress-ring-canvas > div').css('margin', '0 auto');

			if ($el.data('animated')) {

				(function(min, max, value, label) {
					$input.val(min).trigger('change');

					var $parent = $el.parent();
					$el.one('inview', function(event, isInView, visiblePartX, visiblePartY) {
						if( $parent.hasClass( 'animation' ) )
							PrefixedEvent($parent.get(0), "AnimationEnd", function(){
								animateRing();
							});
						else
							animateRing();
					});
				}(min, max, value, label));
			} else {
				var percent = Math.max(0, Math.min(100, Math.round(($input.val() - min) * 100 * 10 / (max - min)) / 10)) + "%";
				if (label === 'percent') $input.val(percent);
			}

			// remove forced font styling
			$input.css('fontWeight', 'inherit').css('fontFamily', 'inherit').css('width', diameter + 'px').css('marginLeft', '-' + diameter + 'px');

			var resize_callback = function(min, max, label) {
				return function() {
					// update div and canvas size in order to make responsive works
					var $d = $el.find('.vp-progress-ring-canvas > div'), $c = $d.find('canvas'), diameter = $el.width();
					$d.width(diameter).height(diameter);
					$c.attr('width', diameter).attr('height', diameter);

					$input.trigger('configure', {
						width : diameter,
						height: diameter
					});
					// percentaging
					var percent = Math.max(0, Math.min(100, Math.round(($input.val() - min) * 100 * 10 / (max - min)) / 10)) + "%";
					if (label === 'percent') $input.val(percent);
					// remove forced font styling
					$input.css('fontWeight', 'inherit').css('fontFamily', 'inherit').css('width', diameter + 'px').css('marginLeft', '-' + diameter + 'px');
				};
			};

			$(window).on('resize', resize_callback(min, max, label));

		});

	});


}(jQuery));