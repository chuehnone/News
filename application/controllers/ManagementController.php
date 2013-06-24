<?php

class ManagementController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $news = new Application_Model_DbTable_News();
        $this->view->news = $news->fetchAll();

        $link = new Application_Model_DbTable_Link();
        $this->view->link = $link;
    }

    public function addAction()
    {
        $form = new Application_Form_News();
        $form->submit->setLabel('Add');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                // Get form value
                $title        = $form->getValue('title');
                $url          = $form->getValue('url');
                $web_title    = $form->getValue('web_title');
                $web_abstract = $form->getValue('web_abstract');

                // Write to db table link
                $link    = new Application_Model_DbTable_Link();
                $link_id = $link->addLink($url, $web_title, $web_abstract);

                // Write to db table news
                $news = new Application_Model_DbTable_News();
                $news->addNews($link_id, $title);
                $this->_helper->redirector('index');

            } else {
                $form->populate($formData);
            }
        }
    }


}



