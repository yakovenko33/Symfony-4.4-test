<?php

declare(strict_types=1);

namespace App\ToDo\CommonModule\Migrations;


use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version2020_05_13_124622_CreateUserTable extends AbstractMigration //Version 2020_05_13_12_46_22
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return 'This is the initial migration which creates users table.';
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema) : void
    {
        if (!$schema->hasTable('users')) {
            $table = $schema->createTable('users');
            $table->addColumn('id', 'integer', ['autoincrement'=>true]);
            $table->addColumn('name', 'text', ['notnull'=>true]);

            $table->setPrimaryKey(['id']);
            $table->addOption('engine' , 'InnoDB');
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema) : void
    {
        if($schema->hasTable('users')) {
            $schema->dropTable('users');
        }
    }
}
