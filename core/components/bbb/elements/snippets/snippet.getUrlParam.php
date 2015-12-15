<?php
/**
*
* getUrlParam
*
* A simple snippet to return a value passed through a URL parameter.
*
* @ author Paul Merchant
* @ copyright 2010 Paul Merchant
* @ version 1.0.0 - October 15, 2010
* @ MIT License
*
* OPTIONS
* name - The parameter name, defaults to p
* int - (Opt) Set as true to only allow integer values
* max - (Opt) The maximum length of the returned value, defaults to 20
* default - (Opt) The value returned if no URL parameter is found
*
* Example: [[getUrlParam? &name=`pageid` &int=`1`]]
*
**/

// set defaults
$name = $modx->getOption('name',$scriptProperties,'p');
$int = $modx->getOption('int',$scriptProperties,false);
$max = $modx->getOption('max',$scriptProperties,20);
$output = $modx->getOption('default',$scriptProperties,'');

// get the sanitized value if there is one
if (isset($_REQUEST[$name])) {
if ($int) {
$value = intval($_REQUEST[$name]);
} else {
if (strlen($_REQUEST[$name]) > $max) {
$value = filter_var(substr($_REQUEST[$name],0,$max), FILTER_SANITIZE_STRING);
} else {
$value = filter_var($_REQUEST[$name], FILTER_SANITIZE_STRING);
}
}
$output = $value;
}

return $output;
