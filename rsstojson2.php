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
</style>

</head>
<body>

<div id="main">

<h1>RSStoJSON Converter</h1>

<?php 

$rss = 'topstories.xml';

//get file
$content = file_get_contents( $rss );     

//convert xml to php object
$xml = new SimpleXmlElement($content);

//convert php object to json
$json = json_encode( $xml );

?>
<h2>Showing JSON from origin RSS file: <a href='<?php echo $rss; ?>'><?php echo $rss ?></a></h2>

<h3>JSON</h3>

<pre><code id="json">

	<?php echo $json; ?>

</code></pre>

</body>
</head>
