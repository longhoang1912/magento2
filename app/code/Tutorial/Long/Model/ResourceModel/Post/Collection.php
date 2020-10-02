<?php
namespace Tutorial\Long\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected function _construct()
    {
        $this->_init('Tutorial\Long\Model\Post','Tutorial\Long\Model\ResourceModel\Post');
    }
}