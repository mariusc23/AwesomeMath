=== Flickr Mini Gallery ===
Contributors: felipeskroski
Donate link: http://www.felipesk.com/flickr-mini-gallery/
Plugin URI: http://www.felipesk.com/flickr-mini-gallery/
Tags: flickr, gallery, photos, ajax, image, images, photo
Requires at least: 2.5
Tested up to: 1.3
Stable tag: trunk

==Description==

Mini flickr gallery is a easy way to embed super flexible galeries from any flickr account or group, using different parameters to customise it.

Now with new features on 1.3 you can also load a photoset, load descriptions of your images on the lightbox, add images from the text editor, change image sizes of the lightbox.

This plugin is a gallery generator / lightbox view combo. Very easy to add to your post or page. Type a little code like [miniflickr user="yourusercode" tags="tag1&tag2"] and done. You'll have a super flexible gallery on your post

==Changelog==

Version 1.3

   1. Now is possible add galleries from a tiny MCE (text editor) interface
   2. Possible to change image size of the light box

Version 1.2

   1. Now is possible to load a photoset by its ID no need for tagging anymore
   2. Descriptions can be loaded on the lightbox (you can turn it of on the admin)
   3. Link back to flickr (to comply with community guidelines)
   
   
Version 1.1

   1. using jquery from wordpress(wp_enqueue_script('jquery')) and encapsuled the js functions into jQuery(function($) to avoid conflicts with other plugins
   2. added a special class on the thumbnails .flickr-mini-gallery-thumb so it easier to style or run scripts on it
   3. added image titles on the title tag
   4. Fixed the thumbnail/square selector on the admin


==Installation==

This plugin can be installed like all the other plugin. It requires no extra configuration except being activated.

   1. Extract the downloaded zip file to the /wp-content/plugins/ directory. You might also want to use OneClick Installer to automate this step.
   2. In the Admin control panel, goes to the Plugins page and activate the mini-flickr-gallery plugin.
   3. Configure the plugin under the Options page (Optional).
   4. Start building your flickr galleries by using these codes:

= Gets photos from all the users with these tags =
[miniflickr tags="travel, sunset, landscape"]

= 10 last images from my portfolio or shows the link if javascript is not enabled =
[miniflickr user_id="56755410@N00"  tags="portfolio" per_page="10" ] Portfolio[/miniflickr]

= Gets photos from all the users with these tags =
[miniflickr tags="poster" group_id="92076845@N00" per_page="5" ]

= Gets all the photos from a photoset =
[miniflickr photoset_id="72157600010075630" ]

[Check this link for more examples](http://www.felipesk.com/flickr-mini-gallery/) 


== Screenshots ==

1. Creating the gallery on the editor
2. Gallery on page
2. Image loading on enlarge
3. Image navigation and subtitle


== Frequently Asked Questions ==

[Full usage guide](http://www.felipesk.com/flickr-mini-gallery/) is kept updated at the plugin homepage.

= Usage guide =

To get the photos this plugin uses  the search API from flickr here are the parameters accepted:
note: you need at least one parameter

[miniflickr lang="pt" user_id="your_flickr_id'' tags="tag1,tag2" ...other parameters... ]Content for non javascript clients like RSS and email[/miniflickr]

= lang (Optional) =
This parameter only works if you're using xLanguage plugin. And is the locale code like en, es, pt_br, en_gb. 

= user_id (Optional) =
The NSID of the user who's photo to search. If this parameter isn't passed then everybody's public photos will be searched.
 
= tags (Optional) =
A comma-delimited list of tags. Photos with one or more of the tags listed will be returned.

= tag_mode (Optional) =
Either 'any' for an OR combination of tags, or 'all' for an AND combination. Defaults to 'any' if not specified.

= min_upload_date (Optional) =
Minimum upload date. Photos with an upload date greater than or equal to this value will be returned. The date should be in the form of a unix timestamp.

= max_upload_date (Optional) =
Maximum upload date. Photos with an upload date less than or equal to this value will be returned. The date should be in the form of a unix timestamp.

= min_taken_date (Optional) =
Minimum taken date. Photos with an taken date greater than or equal to this value will be returned. The date should be in the form of a mysql datetime.

= max_taken_date (Optional) =
Maximum taken date. Photos with an taken date less than or equal to this value will be returned. The date should be in the form of a mysql datetime.

= sort (Optional) =
The order in which to sort returned photos. Deafults to date-posted-desc (unless you are doing a radial geo query, in which case the default sorting is by ascending distance from the point specified). The possible values are: date-posted-asc, date-posted-desc, date-taken-asc, date-taken-desc, interestingness-desc, interestingness-asc, and relevance.

= bbox (Optional) =
A comma-delimited list of 4 values defining the Bounding Box of the area that will be searched.The 4 values represent the bottom-left corner of the box and the top-right corner, minimum_longitude, minimum_latitude, maximum_longitude, maximum_latitude.Longitude has a range of -180 to 180 , latitude of -90 to 90. Defaults to -180, -90, 180, 90 if not specified.Unlike standard photo queries, geo (or bounding box) queries will only return 250 results per page.Geo queries require some sort of limiting agent in order to prevent the database from crying. This is basically like the check against "parameterless searches" for queries without a geo component.

A tag, for instance, is considered a limiting agent as are user defined min_date_taken and min_date_upload parameters — If no limiting factor is passed we return only photos added in the last 12 hours (though we may extend the limit in the future).

= group_id (Optional) =
The id of a group who's pool to search. If specified, only matching photos posted to the group's pool will be returned.

= lat (Optional) =
A valid latitude, in decimal format, for doing radial geo queries.Geo queries require some sort of limiting agent in order to prevent the database from crying. This is basically like the check against "parameterless searches" for queries without a geo component.A tag, for instance, is considered a limiting agent as are user defined min_date_taken and min_date_upload parameters &emdash; If no limiting factor is passed we return only photos added in the last 12 hours (though we may extend the limit in the future). 

= lon (Optional) =
A valid longitude, in decimal format, for doing radial geo queries.Geo queries require some sort of limiting agent in order to prevent the database from crying. This is basically like the check against "parameterless searches" for queries without a geo component.A tag, for instance, is considered a limiting agent as are user defined min_date_taken and min_date_upload parameters &emdash; If no limiting factor is passed we return only photos added in the last 12 hours (though we may extend the limit in the future). 

= radius (Optional) =
A valid radius used for geo queries, greater than zero and less than 20 miles (or 32 kilometers), for use with point-based geo queries. The default value is 5 (km).

= radius_units (Optional) =
The unit of measure when doing radial geo queries. Valid options are "mi" (miles) and "km" (kilometers). The default is "km".

= extras (Optional) =
A comma-delimited list of extra information to fetch for each returned record. Currently supported fields are: license, date_upload, date_taken, owner_name, icon_server, original_format, last_update, geo, tags, machine_tags, o_dims, views, media.

= per_page (Optional) =
Number of photos to return per page. If this argument is omitted, it defaults to 100. The maximum allowed value is 500. 


== Examples ==

= Gets photos from all the users with these tags =
[miniflickr tags="travel, sunset, landscape"]

= 10 last images from my portfolio or shows the link if javascript is not enabled =
[miniflickr user_id="56755410@N00"  tags="portfolio" per_page="10" ] Portfolio[/miniflickr]

= Gets photos from all the users with these tags =
[miniflickr tags="poster" group_id="92076845@N00" per_page="5" ]

= Gets all the photos from a photoset =
[miniflickr photoset_id="72157600010075630" ]


== Features ==

= RSS, Email and non javascript friendly =
The plugin uses javascript to build the gallery but if the client (browser, email client, feeds reader) doesn't support it there is an option to show plain html content instead

= Internationalization =
The plugin is compatible with xlanguage plugin, use the parameter lang if you need to show a gallery just in a specific language.

= Image enlargement on rollover =
You can choose 2 hover modes only the title or enlarge the thumbnail

= Load images from a photoset =
Simply use [miniflickr photoset_id="ID_NUMBER_HERE" ] and you'll instantly have a photoset loaded on your page or post

= Images with descriptions =
You can load descriptions of images easily changabl on your admin

= Link back to flickr =
After enlarging the image there is a link back to flickr so users can comment and interact with your flickr account




== Support ==

Please if you find any bug or issue or have any suggestion please let me know. Leave a comment at www.felipesk.com/fmg.




