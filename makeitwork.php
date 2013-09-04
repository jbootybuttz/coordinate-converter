<?php	
	//this is the PHP way of doing it that I made, but we will need to use javascript instead. keep this for reference
	// $string = "115.4234,-8.313,0,-111.213,4.3423,0";
// 	
	// $newarray = explode(',', $string);
// 	
	// $no0s = array_values(array_filter($newarray, function ($v) { return strpos($v, '0') === FALSE; }));
// 	
	// $no0spairs = array_chunk($no0s, 2);
// 	
	// $max = sizeof($no0spairs);
	// for($i = 0; $i < $max; $i++) {
		// echo 'new google.maps.LatLng('.$no0spairs[$i][1].', '.$no0spairs[$i][0].'),'."\n";
	// }
?>
//-112.2550785337791,36.07954952145647,0       -112.2549277039738,36.08117083492122,0       -112.2552505069063,36.08260761307279,0       -112.2564540158376,36.08395660588506,0       -112.2580238976449,36.08511401044813,0       -112.2595218489022,36.08584355239394,0       -112.2608216347552,36.08612634548589,0       -112.262073428656,36.08626019085147,0       -112.2633204928495,36.08621519860091,0       -112.2644963846444,36.08627897945274,0       -112.2656969554589,36.08649599090644,0 
<script type="text/javascript">

	function array_chunk (input, size, preserve_keys) {
	
	  var x, p = '', i = 0, c = -1, l = input.length || 0, n = [];
	
	  if (size < 1) {
	    return null;
	  }
	
	  if (Object.prototype.toString.call(input) === '[object Array]') {
	    if (preserve_keys) {
	      while (i < l) {
	        (x = i % size) ? n[c][i] = input[i] : n[++c] = {}, n[c][i] = input[i];
	        i++;
	      }
	    }
	    else {
	      while (i < l) {
	        (x = i % size) ? n[c][x] = input[i] : n[++c] = [input[i]];
	        i++;
	      }
	    }
	  }
	  else {
	    if (preserve_keys) {
	      for (p in input) {
	        if (input.hasOwnProperty(p)) {
	          (x = i % size) ? n[c][p] = input[p] : n[++c] = {}, n[c][p] = input[p];
	          i++;
	        }
	      }
	    }
	    else {
	      for (p in input) {
	        if (input.hasOwnProperty(p)) {
	          (x = i % size) ? n[c][x] = input[p] : n[++c] = [input[p]];
	          i++;
	        }
	      }
	    }
	  }
	  return n;
	}
	///
	
	Array.prototype.chunk = function ( n ) {
		if ( !this.length ) {
			return [];
		}
		return [ this.slice( 0, n ) ].concat( this.slice(n).chunk(n) );
	};
	///

	function makeitwork(frm) {
		document.getElementById('workisdone').innerHTML = "";
		
		var pasted = frm.pathstuff.value;
		var newarray = pasted.split(',');
		
		var regexp = /0 /g;
		var match, matches = [];
		
		for (i=0; i<newarray.length; i++) {
			while ((match = regexp.exec(newarray[i])) != null) {
				newarray[i] = newarray[i].substring(2);
			}
		}
		
		var chunkedarray = array_chunk(newarray, 2);
		
		for (i=0; i<chunkedarray.length; i++) {
			document.getElementById('workisdone').innerHTML += 'new google.maps.LatLng('+chunkedarray[i][1]+', '+chunkedarray[i][0]+'), ';
		}
		document.getElementById('instructions').setAttribute('style', 'display:block;');
		
	}
	///
</script><br />

Paste the path stuff here:
<form name="test">
	<input id="pathstuff" name="pathstuff" type="text" value="" />
	<input id="pathstuffbutton" type="button" value="Make it work" onclick="makeitwork(this.form);" />
</form>

<div id="workisdone"></div>

<div id="instructions" style="display:none;"><hr />Now copy and paste that and put it in the path form below. <strong>BE SURE TO REMOVE THE FINAL UNDEFINED VALUE IF THERE IS ONE!!! And make sure there is no comma at the very end of the text.</strong> Make it so the last value looks like this: new google.maps.LatLng(-113.726205933819, 48.6974439249447)
</div>
