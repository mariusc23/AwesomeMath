/*
* pcSlider v1 - http://www.jeffrey-way.com
* Last Updated: October 29, 2009

* This is a very simple and convenient slider/fader to transition between images or content. it offers only fade and slide transitions to keep the script
* as lightweight as possible.

* Developed by Jeffrey Way
* http://www.jeffrey-way.com
* jeffrey@effrey-way.com
*/


(function($) {
    
    $.fn.pcSlider = function(options) {

        // set default options
        var defaults = {
            speed : 750,
            pause : 3000,
            transition : 'fade'
        },

        // Take the options that the user selects, and merge them with defaults.
        options = $.extend(defaults, options);
        
        // Needed to fix a tiny bug. If the pause is less than speed, it'll cause a flickr.
        // This will check for that, and if it is smaller, it increases it to just about the options.speed.
        if(options.pause <= options.speed) options.pause = options.speed + 100;
    
        // for each item in the wrapped set
        return this.each(function() {
        
            // cache "this."
            var $this = $(this);
            
            // Wrap "this" in a div with a class of "slider-wrap."
            $this.wrap('<div class="slider-wrap" />');
            
            // Set the width to a really high number. Adjusting the "left" css values, so need to set positioning.
            $this.css({
                'width' : '99999px',
                'position' : 'relative',
                'padding' : 0
            });

            // If the user chose the "slide" transition...
            if(options.transition === 'slide') {
                $this.children().css({
                    'float' : 'left',
                    'list-style' : 'none'
                });
                
                $('.slider-wrap').css({
                    'width' : $this.children().width(),
                    'overflow' : 'hidden'
                });             
            }
            
            // If the user chose the "fade" transition, instead pile all of the images on top of each other.
            if(options.transition === 'fade') {
                $this.children().css({
                    'width' : $this.children().width(),
                    'position' : 'absolute',
                    'left' : 0
                });
                
                // reorder elements to fix z-index issue.
                
                for(var i = $this.children().length, y = 0; i > 0; i--, y++) {      
                    $this.children().eq(y).css('zIndex', i + 99999);
                }   

                // Call the fade function. 
                fade();
            }
            
            // If the user instead chose the "slide" transition, call the slide function.
            if(options.transition === 'slide') slide(); 
            
            
            function slide() {
                setInterval(function() {
                    // Animate to the left the width of the image/div
                    $this.animate({'left' : '-' + $this.parent().width()}, options.speed, function() {
                        // Return the "left" CSS back to 0, and append the first child to the very end of the list.
                        $this
                           .css('left', 0)
                           .children(':first')
                           .appendTo($this); // move it to the end of the line.
                    })
                }, options.pause);
            } // end slide

            function fade() {
                setInterval(function() {
                    $this.children(':first').animate({'opacity' : 0}, options.speed, function() {   
                        $this
                           .children(':first')
                           .css('opacity', 1) // Return opacity back to 1 for next time.
                           .css('zIndex', $this.children(':last').css('zIndex') - 1) // Reduces zIndex by 1 so that it's no longer on top.                  
                           .appendTo($this); // move it to the end of the line.
                    })
                }, options.pause);
            } // end fade           

        }); // end each     
    
    } // End plugin. Go eat cake.
    
})(jQuery);
