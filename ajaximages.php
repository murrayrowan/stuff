<?php
// example rss files: http://weather.yahooapis.com/forecastrss?w=2502265  - http://rss.news.yahoo.com/rss/topstories
$rss = '';
$yql_query_url='';
$showjson = '';

if ( isset( $_GET["rss"] ) ){

$rss = $_GET["rss"];
//echo 'YES we have this RSS URL = ' . $rss;

// we have an RSS url

// set up the yql query
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        //$yql_query = 'select * from rss where url="http://rss.news.yahoo.com/rss/topstories';
        //$yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
        $yql_query = 'select%20*%20%20from%20rss%20where%20url%3D%22' . $rss . '"';
        $yql_query_url = $yql_base_url . "?q=" . $yql_query;
        $yql_query_url .= "&format=json";

// execute the yql query using curl
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($session);

// convert json to a php object
//$data = json_decode( $json );

}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RSStoJSON Converter</title>

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
</style>

</head>
<body>

<div id="main">

<h1>RSStoJSON Converter</h1>

<form action="index.php" method="get">
        Enter RSS file URL: <input type="text" name="rss">
        <input type="submit">
</form>
<?php
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        //echo "$key:\n";
    } else {
        	echo "$key => $val\n";
    }
}

var_dump( $data );

?>
</div>

</body>
</head>
