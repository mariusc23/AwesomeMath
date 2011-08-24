/*(function(){

    tinymce.PluginManager.requireLangPack('flickr-mini-gallery');
    console.log('testing');
    tinymce.create('tinymce.plugins.flickrMiniGallery', {
    
        init : function(ed, url){
            ed.addCommand('mceilcPHP', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[php]' + ilc_sel_content + '[/php]');
            });
            ed.addButton('fmgbt', {
                title: 'flickr-mini-gallery',
                image: WP_PLUGIN_DIR + '/flickr-mini-gallery/images/flickr_icon.png',
                cmd: 'mceilcPHP'
            });
            ed.addShortcut('alt+ctrl+x', ed.getLang('ilcsyntax.php'), 'mceilcPHP');
			
        },
        createControl : function(n, cm){
            return null;
        },
        getInfo : function(){
            return {
                longname : "Flickr mini gallery",
                author : 'Felipe Skroski',
                authorurl : 'http://felipesk.com/',
                infourl : 'http://felipesk.com/',
                version : "1.3"
            };
        }
    });
    tinymce.PluginManager.add('flickr-mini-gallery', tinymce.plugins.flickrMiniGallery);
})();*/

(function() {
	// Load plugin specific language pack
	
	tinymce.PluginManager.requireLangPack('flickr_mini_gallery');

	tinymce.create('tinymce.plugins.ExamplePlugin', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mceExample', function() {
				ed.windowManager.open({
					file : url + '/dialog.htm',
					width : 620 + ed.getLang('flickr_mini_gallery.delta_width', 0),
					height : 420 + ed.getLang('flickr_mini_gallery.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url, // Plugin absolute URL
					some_custom_arg : 'custom arg' // Custom argument
				});
			});

			// Register example button
			ed.addButton('flickr_mini_gallery', {
				title : 'flickr_mini_gallery.desc',
				cmd : 'mceExample',
				image : url + '/images/flickr_icon.png'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('flickr_mini_gallery', n.nodeName == 'IMG');
			});
		},

		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function(){
            return {
                longname : "Flickr mini gallery",
                author : 'Felipe Skroski',
                authorurl : 'http://felipesk.com/',
                infourl : 'http://felipesk.com/',
                version : "1.3"
            };
        }
	});

	// Register plugin
	tinymce.PluginManager.add('flickr_mini_gallery', tinymce.plugins.ExamplePlugin);
})();
