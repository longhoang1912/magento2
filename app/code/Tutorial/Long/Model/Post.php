<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/07/2017
 * Time: 09:48
 */

namespace Tutorial\Long\Model;


use Magento\Framework\Model\AbstractModel;
use Tutorial\Long\Api\PostApiInterface;

class Post extends AbstractModel
{
    const CACHE_TAG = 'tutorial_long';
    protected function _construct()
    {
        $this->_init('Tutorial\Long\Model\ResourceModel\Post');
    }

}