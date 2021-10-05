<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento\Gateway\Connection;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Swag\MigrationMagento\Exception\InvalidTablePrefixException;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

class ConnectionFactory implements ConnectionFactoryInterface
{
    public function createDatabaseConnection(MigrationContextInterface $migrationContext): ?Connection
    {
        $connection = $migrationContext->getConnection();

        if ($connection === null) {
            return null;
        }

        $credentials = $connection->getCredentialFields();

        if ($credentials === null) {
            return null;
        }

        $connectionParams = [
            'dbname' => (string) ($credentials['dbName'] ?? ''),
            'user' => (string) ($credentials['dbUser'] ?? ''),
            'password' => (string) ($credentials['dbPassword'] ?? ''),
            'host' => (string) ($credentials['dbHost'] ?? ''),
            'driver' => 'pdo_mysql',
            'charset' => 'utf8mb4',
        ];

        if (isset($credentials['dbPort'])) {
            $connectionParams['port'] = (int) $credentials['dbPort'];
        }

        $connection = DriverManager::getConnection($connectionParams);

        if (!isset($credentials['tablePrefix']) || $credentials['tablePrefix'] === '') {
            return $connection;
        }
        $schemaManager = $connection->getSchemaManager();
        if (!$schemaManager->tablesExist([$credentials['tablePrefix'] . 'customer_entity'])) {
            throw new InvalidTablePrefixException('The configured table prefix is invalid.');
        }

        return $connection;
    }
}
