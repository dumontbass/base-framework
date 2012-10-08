<?

include_once 'lib/inc.class.php';


Inc::getInc("lib/");



$head = new Head('transitional','',array('styles'));
$page = new Page($head,'sdfddf','','</body></html>','file.html');

$rect = new Rect('jhkjh',"<p>kjhdskh</p>","","1px solid red","cyan","10px",200,200);
$page->getPage($rect->toString());














?>