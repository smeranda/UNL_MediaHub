<?php
require_once 'UNL/Templates.php';
UNL_Templates::$options['version'] = 3;

$template = 'Fixed';

if ($context->options['mobile']) {
    $template = 'Mobile';
}

$page = UNL_Templates::factory($template);

if (isset($GLOBALS['UNLTEMPLATEDEPENDENTSPATH'])) {
    UNL_Templates::$options['templatedependentspath'] = $GLOBALS['UNLTEMPLATEDEPENDENTSPATH'];
}
$page->doctitle     = '<title>UNL | MediaHub</title>';
$page->titlegraphic = '<h1>UNL MediaHub</h1><h2>Lights, Camera, Action</h2>';
$page->addStyleSheet(UNL_MediaHub_Controller::getURL().'templates/html/css/all.css');
$page->breadcrumbs = '<ul> <li><a href="http://www.unl.edu/">UNL</a></li> <li>MediaHub</li></ul>';
//$page->head .= '<link rel="search" href="'.UNL_MediaHub_Controller::getURL().'search/" />';
$page->addScript(UNL_MediaHub_Controller::getURL().'templates/html/scripts/mediatools.js');
if (!$context->output instanceof UNL_MediaHub_FeedAndMedia) {
    $page->head .= '<link rel="alternate" type="application/rss+xml" title="UNL MediaHub" href="?format=xml" />';
}

$page->maincontentarea = '<div id="wdn_app_search"><form method="get" action="'.UNL_MediaHub_Controller::getURL().'search/"><label for="q_app">Search MediaHub</label><input id="q_app" name="q" type="text" /><input type="submit" class="search_submit_button" value="Go" /></form></div>';
$page->maincontentarea .= $savvy->render($context->output);

$page->navlinks        = '
<ul>
    <li><a href="'.UNL_MediaHub_Controller::getURL().'">MediaHub</a>';

    if (!UNL_MediaHub_Controller::isLoggedIn()) {
        $page->navlinks .= '<ul><li><a href="https://login.unl.edu/cas/login?service='.urlencode(UNL_MediaHub_Controller::getURL()).'">Login</a></li></ul>';
    } else {
        $page->navlinks .='<ul><li><a href="'.UNL_MediaHub_Controller::getURL().'manager/">Your Media</a></li></ul>';
        $page->navlinks .= '<ul><li><a href="?logout">Logout</a></li></ul>';
    }
$page->navlinks .='
</li>
<li><a href="'.UNL_MediaHub_Controller::getURL().'channels/">Channels</a></li>
</ul>';

$page->leftcollinks = '
<h3>Related Links</h3>
<ul>
    <li><a href="'.UNL_MediaHub_Controller::getURL().'developers" title="Documentation for developers that want to use MediaHub">Developer Documentation</a></li>
    <li><a href="http://itunes.unl.edu/">UNL On iTunes U</a></li>
</ul>
';
$page->contactinfo = '<h3>Contacting Us</h3>
<p>University of Nebraska&ndash;Lincoln<br />
1400 R Street<br />
Lincoln, NE 68588<br />
402-472-7211</p>';

$page->footercontent = '&copy; '.date('Y').' University of Nebraska&mdash;Lincoln | Lincoln, NE 68588 | 402-472-7211 | <a href="http://www1.unl.edu/comments/" title="Click here to direct your comments and questions">comments?</a><br />
The UNL Office of University Communications maintains this database of online media.<br />
    If there are additional functions that would be of interest to you, please
    <a href="http://www1.unl.edu/comments/">send us a comment</a>.
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push([\'_setAccount\', \'UA-22295578-1\']);
_gaq.push([\'_setDomainName\', \'.unl.edu\']);
_gaq.push([\'_setAllowLinker\', true]);
_gaq.push([\'_setAllowHash\', false]);
_gaq.push([\'_trackPageview\']);
</script>';
$page->leftRandomPromo = '';
echo $page;
