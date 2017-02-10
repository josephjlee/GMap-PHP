<?php

//Default settings of the map
$api_key = "YOUR_API_KEY"; //Your API KEY. Make one here: https://developers.google.com/maps/documentation/javascript/get-api-key#key
$zoom = 12; //the lowest, the farest, the highest, the nearest. 2 is the world, 18 is a single block.


//Set the name of the fields you have in your array
if(!isset($latitude)) $latitude = "lat";
if(!isset($longitude)) $longitude = "lon";

//The Marker's array must be like this:
if(!isset($markers))
	$markers = array(
		"uno"=> ["lat"=>12.98,"lon"=>77.59],
		"due"=> ["lat"=>12.95,"lon"=>77.58],
		"tre"=> ["lat"=>12.96,"lon"=>77.60],
	);

/* Just to be sure:
"label" => ["lat"=>FLOAT,"lon"=>FLOAT],
"label2" => ["lat"=>FLOAT,"lon"=>FLOAT],
...
*/
$centermap = $markers[key($markers)];
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?=$api_key?>"></script>


<script>
  function initialize() {
    var centermap = { lat: <?=$centermap[$latitude]?>, lng: <?=$centermap[$longitude]?> }; //The first marker will be taken
    var map = new google.maps.Map(document.getElementById('gmap_php_map'), {
      zoom: <?=$zoom?>,
      center: centermap
    });

	<?php foreach($markers as $k=>$v){
		echo "addMarker({lat:$v[$latitude],lng:$v[$longitude]},map,'$k','$v[$content]');";
	}
	?>
  }

  // Adds a marker to the map.
  function addMarker(location, map, label,content) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    var marker = new google.maps.Marker({
      position: location,
      //label: label,
      map: map<? if(isset($icon))
	      echo ",
	  icon: '$icon'";
	  ?>
    });
    <? if(isset($content)){ ?>
    var contentString = content;
    
    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });
        
    marker.addListener('click', function() {
    	infowindow.open(map, marker);
    });
    <? } ?>

  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
      #gmap_php_map {
        height: 100%;
      }
</style>

<div id="gmap_php_map"></div>
