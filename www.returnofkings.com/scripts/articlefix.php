<html>
<head>
<meta charset="utf-8">
<style>
.social-share-container{
display:none;
}
#cb-author-box{
background-color:rgba(0,0,0,0.1);
font-style: italic;
padding: 10px; 
}
#cb-author-box img{
display:none;
}
body{margin:40px
auto;max-width:650px;line-height:1.6;font-size:18px;color:#444;padding:0
10px}h1,h2,h3{line-height:1.2}
</style>
</head>
<body>
<a href="../index.html">&lt; &lt; &lt; Back</a>
<h1><?php echo $argv[2]; ?></h1>
<?php
function DOMinnerHTML(DOMNode $element) 
{ 
    $innerHTML = ""; 
    $children  = $element->childNodes;

    foreach ($children as $child) 
    { 
        $innerHTML .= str_replace("Loading...","",$element->ownerDocument->saveHTML($child));
    }

    return $innerHTML; 
}


libxml_use_internal_errors(true);

$doc = new DOMDocument();
$doc->LoadHTML('<?xml encoding="utf-8" ?>' .file_get_contents($argv[1]));

foreach ($doc->getElementsByTagName('section') as $tag) {
	if ($tag->getAttribute('itemprop') == "articleBody")
	{
		echo DOMinnerHTML($tag);
		//var_dump($tag->childNodes->item(0)->textContent);
	}
}

?>

</body>
</html>
