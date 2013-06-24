<?php

class Application_Form_News extends Zend_Form
{

    public function init()
    {
        $this->setName('news');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');

        $url = new Zend_Form_Element_Text('url');
        $url->setLabel('Web url')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $web_title = new Zend_Form_Element_Text('web_title');
        $web_title->setLabel('Web title')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');

        $web_abstract = new Zend_Form_Element_Textarea('web_abstract');
        $web_abstract->setLabel('Web abstract')
                     ->setRequired(true)
                     ->addFilter('StripTags')
                     ->addFilter('StringTrim')
                     ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $submit->setAttrib('class', 'btn');

        $this->addElements(array($id, $title, $url, $web_title, $web_abstract, $submit));
    }
}

