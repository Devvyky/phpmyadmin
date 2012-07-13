<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Functionality for the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
/**
 * Represents a container for procedure nodes in the navigation tree
 *
 * @package PhpMyAdmin-Navigation
 */
class Node_Procedure_Container extends Node
{
    /**
     * Initialises the class
     *
     * @return Node_Procedure_Container
     */
    public function __construct()
    {
        parent::__construct(__('Procedures'), Node::CONTAINER);
        $this->icon  = $this->_commonFunctions->getImage('b_routines.png');
        $this->links = array(
            'text' => 'db_routines.php?server=' . $GLOBALS['server']
                    . '&amp;db=%1$s&amp;token=' . $GLOBALS['token'],
            'icon' => 'db_routines.php?server=' . $GLOBALS['server']
                    . '&amp;db=%1$s&amp;token=' . $GLOBALS['token'],
        );
        $this->real_name = 'procedures';

        $new        = new Node(__('New'));
        $new->isNew = true;
        $new->icon  = $this->_commonFunctions->getImage('b_routine_add.png', '');
        $new->links = array(
            'text' => 'db_routines.php?server=' . $GLOBALS['server']
                    . '&amp;db=%2$s&amp;token=' . $GLOBALS['token']
                    . '&add_item=1',
            'icon' => 'db_routines.php?server=' . $GLOBALS['server']
                    . '&amp;db=%2$s&amp;token=' . $GLOBALS['token']
                    . '&add_item=1',
        );
        $new->classes = 'new_procedure italics';
        $this->addChild($new);
    }
}

?>
