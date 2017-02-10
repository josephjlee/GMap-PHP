# GMap-PHP
Use Google Map with PHP (and MySQL) arrays
## How to use it
You have to include the gmap_php.php file where you want to place the map:
```php
<?php require("gmap_php.php"); ?>
```
Now open the gmap_php.php file and look at the first lines. You can find a quick tutorial with some data examples.
What you MUST do is to put your Google API key (that you can create [HERE)](https://developers.google.com/maps/documentation/javascript/get-api-key#key).
You can even choose the default zoom amount.
## Pass your data
You have to pass your markers as an array:
```php
$markers = array(
  "first"=>["lat"=>12.89,"lon"=>77.59],
  "second"=>["lat"=>12.90,"lon"=>77.58]
);
```
You can use your own data names (lat could be latit, latitude or thelargeone) and you can set it like the following:
```php
$latitude = "thelargeone"; //will search for $markers[n°]['thelargeone']
$longitude = "thelongone"; //will search for $markers[n°]['thelongone']
```
If you want to show a popup when you click on the map pointer, you have to add the $content variable with the name of field that contains the content you want to show:
```php
$content = "my_marker_content"; //will search for $markers[n°]['my_marker_content'];
```
If you want to change the pointer ICON you have to create the $icon variable with the url of the image (this will work for ALL your pointers):
```php
$icon = "http://your_website.com/gps_pointer.svg";
//if you want it for each marker just ask me and I tell you how to edit the script to make it happen
```

# FULL EXAMPLE
```php
<html>
  <head>
  </head>
  <body>
    <h1>Your cool map!</h1>
    <?php
    $markers = array(
      "home"=>[
        "latitude"=>12.89,
        "longitude"=>77.59,
        "marker_content"=>"<h2>This is my house</h2>"
      ],
      "work"=>[
        "latitude"=>12.90,
        "longitude"=>77.58,
        "marker_content"=>"<h2>This is my office</h2>"
      ]
    );
    $latitude = "latitude";
    $longitude = "longitude";
    $content = "marker_content";
    $icon = "https://image.flaticon.com/icons/svg/25/25231.svg";
    require("gmap_php.php");
    ?>
  </body>
</html>
```
