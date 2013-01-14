<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Testing YUI 3 IO Module</title>

<style>
	#main{
		margin-left: 30px;

	}
	ul{ list-style: none; }
	li{ float:left;}
	h2{ clear:left; }
	img{margin:5px;}
</style>

</head>
<body>

<div id="main">

<h1>AJAXing Stuff</h1>

<form action="yuiiotest.php" method="get">
        Enter what you're looking for on Flickr: <input type="text" name="thing" id="search">
        <input type="submit" id="flickrbut">
</form>


<div id="stuff">

</div>

<script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>
<script>

// Create a YUI sandbox on your page.

YUI().use("node", "io", "dump", "json-parse", function (Y) {

var getSomething = function(e){
		
	e.preventDefault();

	//get value in form field
	var search = Y.one('#search').get('value');

	//  Build a URL
		var uri = '/~murrayrowan/flickrphotos.js';
		alert( uri );

 // Create the io callback/configuration
    var callback = {

        timeout : 3000,

        on : {
            success : function (x,o) {
                Y.log("RAW JSON DATA: " + o.responseText);

                var data = [],
                    html = '', i, l;

		//alert(o.responseText);

                // Process the JSON data returned from the server
                try {
                    data = Y.JSON.parse(o.responseText);
                    //alert("JSON Parse succeded!");
                }

                catch (e) {
                    alert("JSON Parse failed!");
                    return;
                }

                Y.log("PARSED DATA: " + Y.Lang.dump(data.query.results.photo[0]));

                // The returned data was parsed into an array of objects.

		url = '<a href="http://flickr.com/photos/{owner}/{id}"><img src="http://static.flickr.com/{server}/{id}_{secret}_t.jpg"></a>';
		var stuff = Y.one('#stuff');
		stuff.append('<h2>Flickr ' + search + '</h2>');
		Y.each(data.query.results.photo, function(v)  {
                           stuff.append(Y.Lang.sub(url, v));
                        });

                // Use the Node API to apply the new innerHTML to the target
                //stuff.append('<h2>photo</h2>');
            },

            failure : function (x,o) {
                alert("Async call failed!");
            }

        }
    };

        // Execute the AJAX query
        var request = Y.io(uri, callback);

	}

Y.one('#flickrbut').on("click", getSomething);
	
});
</script>
</body>
</head>
