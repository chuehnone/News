<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $news = new Application_Model_DbTable_News();
        $this->view->news = $news->fetchAll('DATE(`time`) = CURDATE()');

        $link = new Application_Model_DbTable_Link();
        $this->view->link = $link;
    }
}


