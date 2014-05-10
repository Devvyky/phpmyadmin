<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Test for PMA_NavigationTree class
 *
 * @package PhpMyAdmin-test
 */

require_once 'libraries/Util.class.php';
require_once 'libraries/Theme.class.php';
require_once 'libraries/database_interface.inc.php';
require_once 'libraries/relation.lib.php';
require_once 'libraries/url_generating.lib.php';
require_once 'libraries/php-gettext/gettext.inc';
require_once 'libraries/navigation/NavigationTree.class.php';
require_once 'libraries/navigation/NodeFactory.class.php';
require_once 'libraries/Tracker.class.php';
require_once 'libraries/Config.class.php';
require_once 'libraries/RecentFavoriteTable.class.php';

/**
 * Tests for PMA_NavigationTree class
 *
 * @package PhpMyAdmin-test
 */
class PMA_NavigationTreeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PMA_NavigationTree
     */
    protected $object;

    /**
     * Sets up the fixture.
     *
     * @access protected
     * @return void
     */
    protected function setUp()
    {
        $GLOBALS['server'] = 1;
        $GLOBALS['PMA_Config'] = new PMA_Config();
        $GLOBALS['PMA_Config']->enableBc();
        $GLOBALS['cfg']['Server']['host'] = 'localhost';
        $GLOBALS['cfg']['Server']['user'] = 'root';
        $GLOBALS['cfg']['Server']['pmadb'] = '';

        $GLOBALS['pmaThemeImage'] = 'image';
        $_SESSION['PMA_Theme'] = PMA_Theme::load('./themes/pmahomme');
        $_SESSION['PMA_Theme'] = new PMA_Theme();
        $this->object = new PMA_NavigationTree();
    }

    /**
     * Tears down the fixture.
     *
     * @access protected
     * @return void
     */
    protected function tearDown()
    {
        unset($this->object);
    }

    /**
     * Very basic rendering test.
     *
     * @return void
     */
    public function testRenderState()
    {
        $result = $this->object->renderState();
        $this->assertContains('pma_quick_warp', $result);
    }
}
?>
