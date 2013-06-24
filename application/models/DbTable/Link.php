<?php

class Application_Model_DbTable_Link extends Zend_Db_Table_Abstract
{

    protected $_name = 'link';

    public function getLink($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('`link_id` = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row {$id}");
        }
        return $row->toArray();
    }

    public function addLink($url, $title, $abstract)
    {
        $data = array(
            'url' => $url,
            'title' => $title,
            'abstract' => $abstract,
        );
        return $this->insert($data);
    }

    public function updateNews($id, $title, $abstract)
    {
        $data = array(
            'link_id' => $id,
            'title' => $title,
            'abstract' => $abstract,
        );
        $this->update($data, '`link_id` = '. (int)$id);
    }

    public function deleteNews($id)
    {
        $this->delete('`link_id` =' . (int)$id);
    }
}

