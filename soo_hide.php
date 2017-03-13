<?php
$plugin['version'] = '0.1.3';
$plugin['author'] = 'Jeff Soo';
$plugin['author_uri'] = 'http://ipsedixit.net/';
$plugin['description'] = 'Replacement for txp:hide';
$plugin['type'] = 0; 
$plugin['allow_html_help'] = 1;

if (! defined('txpinterface')) {
    global $compiler_cfg;
    @include_once('config.php');
    @include_once($compiler_cfg['path']);
}
# --- BEGIN PLUGIN CODE ---

// Register public tags.
if (class_exists('\Textpattern\Tag\Registry')) {
    Txp::get('\Textpattern\Tag\Registry')
        ->register('soo_hide')
        ;
}

function soo_hide ($atts, $thing)
{
    extract(lAtts(array(
        'force' => 0,
    ), $atts));
    
    global $production_status;
    if (! $force) switch ($production_status) {
        case 'debug': return parse($thing);
        case 'testing': return '<!-- '.parse($thing).' -->';
    }
    
    return '';
}

# --- END PLUGIN CODE ---

?>