<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Flickr Photo Getter</title>

<style>
	#main{
		margin-left: 30px;

	}
	#json{
		color: green;
		font-size: 10px;
		}
	pre{
dd
		border: 1px solid #000;
	}
	.subtext{

		font-size: 11px;
	}
	ul{ list-style: none; }
	li{ float:left;}
	h2{ clear:left; }
	img{margin:5px;}
</style>

</head>
<body>

<div id="main">

<h1>Flickr Photo Getter</h1>

<?php
$result = 'No photos found in result';
$thing = isset( $_GET['thing'] ) ? $_GET['thing'] : 'cat';
$yql_url = 'http://query.yahooapis.com/v1/public/yql?';
$query = 'SELECT * FROM flickr.photos.search WHERE has_geo="true" AND text="' . $thing  .'" AND api_key="ff775372effb5f6ff546c2368b21b376"';
$query_url = $yql_url . 'q=' . urlencode($query) . '&format=xml';
 
$photos = simplexml_load_file($query_url);
$result = build_photos($photos->results->photo);
//echo $result;
 
function build_photos($photos){
    $html = '<ul>';
    if (count($photos) > 0){
        foreach ($photos as $photo){
            $html .= '<li><a href="http://www.flickr.com/photos/'.
                     $photo['owner'].'/'.$photo['id'].
                     '"><img src="http://farm'.$photo['farm'].
                     '.static.flickr.com/'.$photo['server'].
                     '/'.$photo['id'].'_'.$photo['secret'].
                     '.jpg" width="75" height="75" alt="'.$photo['title'].
                     '" /></a></li>';
        }

    } else {
        $html .= 'No Photos Found';
    }
    $html .= '</ul>';
    return $html;
}
?>

<form action="flickrphotos.php" method="get">
        Enter what you're looking for on Flickr: <input type="text" name="thing" id="search">
        <input type="submit" id="flickrbut">
</form>

<div id="photos">
<?php 
echo '<H2>Flickr ' . $thing . 's</h2>';
echo $result; 
?>
</div>
</div>
<script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>
<script>

// Create a YUI sandbox on your page.
YUI().use('node', 'yql', function(Y) {

var getPhotos = function(e){
		
	e.preventDefault();

	//get value in form field
	var search = Y.one('#search').get('value');

	// Specify the YQL query
		var query = 'select * from flickr.photos.search where text ="' + search + '" and api_key="ff775372effb5f6ff546c2368b21b376" limit 10';

	// Define the response handler that is executed when YQL responds with data
		 var responseHandler = function(response) {
			var photos = Y.one('#photos');
			photos.append('<h2> Flickr ' + search + '</h2>');
                	url = '<a href="http://flickr.com/photos/{owner}/{id}"><img src="http://static.flickr.com/{server}/{id}_{secret}_t.jpg"></a>';	
			Y.each(response.query.results.photo, function(v)  {	
				photos.append(Y.Lang.sub(url, v));
                	});
				
			}

	// Execute the query
		new Y.YQL(query, responseHandler);
		
	}	

Y.one('#flickrbut').on("click", getPhotos);
	
});
</script>
</body>
</head>
