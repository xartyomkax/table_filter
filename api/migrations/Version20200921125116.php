<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Psr\Log\LoggerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921125116 extends AbstractMigration
{
    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        parent::__construct($connection, $logger);
    }

    public function getDescription(): string
    {
        return 'Init';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE product (
                    id INT AUTO_INCREMENT NOT NULL,
                    gtin BIGINT NOT NULL,
                    product_name VARCHAR(500) NOT NULL,
                    product_desc TEXT NOT NULL,
                    price NUMERIC(6, 2) NOT NULL,
                    currency VARCHAR(3) NOT NULL,
                    category VARCHAR(255) NOT NULL,
                    gender VARCHAR(1) NOT NULL,
                    quantity INT NOT NULL,
                    size VARCHAR(10) NOT NULL,
                    style VARCHAR(30) NOT NULL,
                    color VARCHAR(30) NOT NULL,
                    url TEXT NOT NULL,
                    image VARCHAR(255) NOT NULL,
                    image_additional VARCHAR(255) NOT NULL,
                    additional TEXT NOT NULL,
                    source_video VARCHAR(255) NOT NULL,
                    PRIMARY KEY(id)
                ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        $integerColumns = ['id', 'gtin', 'quantity'];
        $floatColumns = ['price'];
        $productDataJson = file_get_contents(__DIR__ . '/data/table_data.json');
        $productDataArray = json_decode($productDataJson, true);
        $values = [];
        foreach ($productDataArray as $productData) {
            if (empty($columns)) {
                $columns = '(' . implode(',', array_keys($productData)) . ')';
            }

            foreach ($productData as $key => $value) {
                if (in_array($key, $integerColumns)) {
                    $productData[$key] = (int)$value;
                } elseif (in_array($key, $floatColumns)) {
                    $productData[$key] = (float)$value;
                } else {
                    $productData[$key] = addslashes((string)$value);
                }
            }

            $values[] = '("' . implode('","', $productData) . '")';
        }
        $this->addSql("INSERT INTO product $columns VALUES " . implode(',', $values));

        $this->addSql(
            'CREATE TABLE user (
                    id INT AUTO_INCREMENT NOT NULL,
                    name VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    PRIMARY KEY(id)
                ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql('INSERT INTO user (name, password) VALUES ("admin", :passwd)', [':passwd' => md5('admin')]);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
