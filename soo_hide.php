<?php
$plugin['name'] = 'soo_hide';
$plugin['version'] = '0.1';
$plugin['author'] = 'Jeff Soo';
$plugin['author_uri'] = 'http://ipsedixit.net/';
$plugin['description'] = 'Replacement for txp:hide';
$plugin['type'] = 0; 

defined('txpinterface') or @include_once('zem_tpl.php');

# --- BEGIN PLUGIN CODE ---

function soo_hide ( $atts, $thing )
{
	extract(lAtts(array(
 		'force' => 0,
	), $atts));
	
	global $production_status;
	if ( ! $force ) switch ( $production_status )
	{
		case 'debug': return parse($thing);
		case 'testing': return '<!-- ' . parse($thing) . ' -->';
	}
	return '';
}

# --- END PLUGIN CODE ---

if (0) {
?>
<!-- CSS SECTION
# --- BEGIN PLUGIN CSS ---
<style type="text/css">
div#sed_help pre {padding: 0.5em 1em; background: #eee; border: 1px dashed #ccc;}
div#sed_help h1, div#sed_help h2, div#sed_help h3, div#sed_help h3 code {font-family: sans-serif; font-weight: bold;}
div#sed_help h1, div#sed_help h2, div#sed_help h3 {margin-left: -1em;}
div#sed_help h2, div#sed_help h3 {margin-top: 2em;}
div#sed_help h1 {font-size: 2.4em;}
div#sed_help h2 {font-size: 1.8em;}
div#sed_help h3 {font-size: 1.4em;}
div#sed_help h4 {font-size: 1.2em;}
div#sed_help h5 {font-size: 1em;margin-left:1em;font-style:oblique;}
div#sed_help h6 {font-size: 1em;margin-left:2em;font-style:oblique;}
div#sed_help li {list-style-type: disc;}
div#sed_help li li {list-style-type: circle;}
div#sed_help li li li {list-style-type: square;}
div#sed_help li a code {font-weight: normal;}
div#sed_help li code:first-child {background: #ddd;padding:0 .3em;margin-left:-.3em;}
div#sed_help li li code:first-child {background:none;padding:0;margin-left:0;}
div#sed_help dfn {font-weight:bold;font-style:oblique;}
div#sed_help .required, div#sed_help .warning {color:red;}
div#sed_help .default {color:green;}
div#sed_help dt {font-weight: bold;}
div#sed_help dd {margin: 0.5em 2em;}
div#sed_help dd + dt {margin-top: 1em;}
</style>
# --- END PLUGIN CSS ---
-->
<!-- HELP SECTION
# --- BEGIN PLUGIN HELP ---
 <div id="sed_help">

h1. soo_hide

Drop-in replacement for the core " @hide@ ":http://textpattern.net/wiki/index.php?title=hide tag, offering different behavior based on the site's "Production Status":http://textpattern.net/wiki/index.php?title=Basic_Preferences#Production_Status setting:

; Live
: Hide tag contents
; Testing
: Output tag contents, enclosed by HTML comment delimiters
; Debugging
: Display tag contents

To force the tag to hide its contents even when in Testing or Debugging mode, set the tag's @force@ attribute to @1@.

h2(#history). Version History

h3. 0.1 (2011/01/13)

* Initial release. 
* Behavior based on site production status.
* Override test/debug behavior with @force@ attribute.

 </div>
# --- END PLUGIN HELP ---
-->
<?php
}

?>