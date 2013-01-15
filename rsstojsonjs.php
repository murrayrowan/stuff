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

<h2>Showing JSON from origin RSS file: <a href='$rss'>$rss</a></h2>

<h3>YQL Query</h3>

<a href='$yql_query_url'>$yql_query_url</a>

<form action="index.php" method="get">
        Enter RSS file URL: <input type="text" name="rss">
        <input type="submit">
</form>
<div class="subtext">Examples: <a href="/~murrayrowan/index.php?rss=http://rss.news.yahoo.com/rss/topstories">Yahoo! News</a> : <a href="/~murrayrowan/index.php?rss=http://weather.yahooapis.com/forecastrss?w=2502265">Weather in Sunnyvale, CA</a></div>

<h3>JSON</h3>

<pre><code id="json">
        <script>
                var jsonText = JSON.stringify($json, null, 4);
                document.write(jsonText);
        </script>
</code></pre>

?>

<?php echo $showjson; ?>

</div>

</body>
</head>
