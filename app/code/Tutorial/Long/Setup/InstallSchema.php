<?php
/**
* Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/

namespace Tutorial\Long\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
          * Create table 'Tutorial_Long'
          */
          $table = $setup->getConnection()
              ->newTable($setup->getTable('Tutorial_Long'))
              ->addColumn(
                  'id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                  null,
                  ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                  'tutorial id'
              )
              ->addColumn(
                  'title',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                    'tutorial title'
              )
              ->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                  'tutorial description'
            )
            ->addColumn(
                'image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                  'tutorial image'
            )
            ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null,
                ['nullable' => false, 'default' => '1'],
                  'tutorial status: Enabled is 1 and Disabled is 2'
            )
            ->addColumn(
                'create_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,null, 
                ['nullable' => false, 'default' => ''],
                  'tutorial create at'
            )
            ->addColumn(
                'update_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null,
                ['nullable' => false, 'default' => ''],
                  'tutorial update at'
            )
              ->setComment("Tutorial add table");
          $setup->getConnection()->createTable($table);
      }
}