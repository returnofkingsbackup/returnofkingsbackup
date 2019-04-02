<?php

//83625_fix.html
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML(file_get_contents($argv[1]));
$xpath = new DOMXPath($doc);
$srcs = $xpath->evaluate("//img/@src");

foreach ($srcs as $node) {
  if( !strpos($node->nodeValue, "gravatar") && !strpos($node->nodeValue, "base64") && !strpos($node->nodeValue, "twitter-share") && !strpos($node->nodeValue, "fb-share") && !strpos($node->nodeValue, "ttp:") && !strpos($node->nodeValue, "ttps:") )
     echo rawurldecode($node->nodeValue) . "\n";
}
