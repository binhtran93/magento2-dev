<?php

namespace Smart\Blog\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
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
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $this->installPostEntity($installer);
        $this->installCategoryEntity($installer);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('smart_blog_category_post'))
            ->addColumn(
                'category_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
                'Category ID'
            )->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true, 'default' => '0'],
                'Post ID'
            )->addIndex(
                $installer->getIdxName('smart_blog_category_post', ['post_id']),
                ['post_id']
            )->addForeignKey(
                $installer->getFkName(
                    'smart_blog_category_post',
                    'category_id',
                    'smart_blog_category_entity',
                    'entity_id'
                ),
                'category_id',
                $installer->getTable('smart_blog_category_entity'),
                'entity_id',
                Table::ACTION_CASCADE
            )->addForeignKey(
                $installer->getFkName(
                    'smart_blog_category_post',
                    'post_id',
                    'smart_blog_post_entity',
                    'entity_id'
                ),
                'post_id',
                $installer->getTable('smart_blog_post_entity'),
                'entity_id',
                Table::ACTION_CASCADE
            )->setComment('Blog Post To Category Linkage Table');
        $installer->getConnection()->createTable($table);
    }

    /**
     * @param SchemaSetupInterface $installer
     *
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */
    protected function installPostEntity(SchemaSetupInterface $installer)
    {
        $table = $installer->getConnection()
            ->newTable($installer->getTable('smart_blog_post_entity'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->addColumn(
                'type',
                Table::TYPE_TEXT,
                255,
                ['unsigned' => true, 'nullable' => true],
                'Post type'
            )
            ->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                [],
                'Name'
            )
            ->addColumn(
                'description',
                Table::TYPE_TEXT,
                255,
                [],
                'Description'
            )
            ->addColumn(
                'content',
                Table::TYPE_TEXT,
                '64k',
                [],
                'Content'
            )
            ->addColumn(
                'status',
                Table::TYPE_TEXT,
                '100',
                [],
                'status'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            );
        $installer->getConnection()->createTable($table);
    }

    /**
     * @param SchemaSetupInterface $installer
     *
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */
    protected function installCategoryEntity(SchemaSetupInterface $installer)
    {
        $table = $installer->getConnection()
            ->newTable($installer->getTable('smart_blog_category_entity'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                [],
                'Name'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            );
        $installer->getConnection()->createTable($table);
    }
}
