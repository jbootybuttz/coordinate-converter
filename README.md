coordinate-converter
====================

I created this for our data-entry team to shave off DAYS of work for them to meet a deadline. They needed a way to convert a path from a KML file (via Google Earth) to a format that Google Maps API v3 could understand.

The end user enters in the data within the <coordinates> tag in the KML file, and when they click the "make it work" button, it converts the string to a series of google maps latlngs for use in API v3, particularly for showing a path on the map.


Example string:

-112.2550785337791,36.07954952145647,0       -112.2549277039738,36.08117083492122,0       -112.2552505069063,36.08260761307279,0       -112.2564540158376,36.08395660588506,0       -112.2580238976449,36.08511401044813,0       -112.2595218489022,36.08584355239394,0       -112.2608216347552,36.08612634548589,0       -112.262073428656,36.08626019085147,0       -112.2633204928495,36.08621519860091,0       -112.2644963846444,36.08627897945274,0       -112.2656969554589,36.08649599090644,0

Output:

new google.maps.LatLng(36.07954952145647, -112.2550785337791), new google.maps.LatLng(36.08117083492122, -112.2549277039738), new google.maps.LatLng(36.08260761307279, -112.2552505069063), new google.maps.LatLng(36.08395660588506, -112.2564540158376), new google.maps.LatLng(36.08511401044813, -112.2580238976449), new google.maps.LatLng(36.08584355239394, -112.2595218489022), new google.maps.LatLng(36.08612634548589, -112.2608216347552), new google.maps.LatLng(36.08626019085147, -112.262073428656), new google.maps.LatLng(36.08621519860091, -112.2633204928495), new google.maps.LatLng(36.08627897945274, -112.2644963846444), new google.maps.LatLng(36.08649599090644, -112.2656969554589), new google.maps.LatLng(undefined, ),


Then the page displays a reminder to remove the undefined object (if any) and remove the final comma from the string (if any)

Note that it also assumes the KML coordinates data has a 0 at the end of each coordinate in the string, because all of ours did.

===============


I leveraged some code that other people had written in order to make it work in javascript, as I had initially written the code in PHP.

They are:

http://stackoverflow.com/a/11638192

and

http://phpjs.org/functions/array_chunk/

So special thanks to rlemon (http://stackoverflow.com/users/829835/rlemon) and kvz (https://github.com/kvz)
