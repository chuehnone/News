<?php

class Application_Model_DbTable_News extends Zend_Db_Table_Abstract
{

    protected $_name = 'news';

    public function getNews($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('`news_id` = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row {$id}");
        }
        return $row->toArray();
    }

    public function addNews($link_id, $title)
    {
        $data = array(
            'link_id' => $link_id,
            'title' => $title,
        );
        $this->insert($data);
    }

    public function updateNews($id, $link_id, $title)
    {
        $data = array(
            'link_id' => $link_id,
            'title' => $title,
        );
        $this->update($data, '`news_id` = '. (int)$id);
    }

    public function deleteNews($id)
    {
        $this->delete('`news_id` =' . (int)$id);
    }
}

