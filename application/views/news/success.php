<?php 
//used for error reporting and future features
if ($uploadName
	|| $uploadFilename
	|| $uploadType
	|| $uploadSize
	|| $uploadLocation)
{
	// echo $uploadName;
	// echo $uploadFilename;
	// echo $uploadType;
	// echo $uploadSize;
	// echo $uploadLocation;
}
?>
<a href="/tribune/news"><button id="returnButton" type="button" class="btn btn-success btn-lg">
	Return to News Feed
</button></a>

						<!-- START ADVERTISMENT -->
<?php
$adverts = array(
	'<img class="advertImage" src="/tribune/ads/steal.png">',
	'<img class="advertImage" src="/tribune/ads/this.png">',
	'<img class="advertImage" src="/tribune/ads/duckey.jpg">'
	);
$rand_keys = array_rand($adverts, 1);
echo $adverts[$rand_keys] . "\n";
?>
						<!-- END ADVERTISMENT -->