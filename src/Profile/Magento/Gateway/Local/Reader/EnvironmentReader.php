<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento\Gateway\Local\Reader;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento\Gateway\Connection\ConnectionFactoryInterface;
use SwagMigrationAssistant\Migration\Gateway\Reader\EnvironmentReaderInterface;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
class EnvironmentReader implements EnvironmentReaderInterface
{
    protected ConnectionFactoryInterface $connectionFactory;

    protected Connection $connection;

    protected string $tablePrefix;

    public function __construct(ConnectionFactoryInterface $connectionFactory)
    {
        $this->connectionFactory = $connectionFactory;
        $this->tablePrefix = '';
    }

    public function read(MigrationContextInterface $migrationContext, array $params = []): array
    {
        $this->setConnection($migrationContext);
        $locale = $this->getDefaultShopLocale();

        $resultSet = [
            'isMagento2' => $this->isMagento2(),
            'defaultShopLanguage' => $locale,
            'host' => $this->getHost(),
            'additionalData' => $this->getAdditionalData(),
            'defaultCurrency' => $this->getDefaultCurrency(),
        ];

        return $resultSet;
    }

    protected function setConnection(MigrationContextInterface $migrationContext): void
    {
        $connection = $migrationContext->getConnection();
        if ($connection === null) {
            return;
        }

        $dbConnection = $this->connectionFactory->createDatabaseConnection($migrationContext);
        if ($dbConnection === null) {
            return;
        }

        $this->connection = $dbConnection;
        $credentials = $connection->getCredentialFields();
        if (isset($credentials['tablePrefix'])) {
            $this->tablePrefix = $credentials['tablePrefix'];
        }
    }

    protected function getHost(): string
    {
        return '';
    }

    protected function getDefaultShopLocale(): string
    {
        $query = $this->connection->createQueryBuilder();

        $query = $query->select('value')
            ->from($this->tablePrefix . 'core_config_data')
            ->where('scope = "default"')
            ->andWhere('path = "general/locale/code"')
            ->executeQuery();

        $value = $query->fetchOne();
        if ($value === false) {
            return '';
        }

        return $value;
    }

    protected function getDefaultCurrency(): string
    {
        $query = $this->connection->createQueryBuilder();

        $query = $query->select('value')
            ->from($this->tablePrefix . 'core_config_data')
            ->where('scope = "default"')
            ->andWhere('path = "currency/options/base"')
            ->executeQuery();

        $value = $query->fetchOne();
        if ($value === false) {
            return '';
        }

        return $value;
    }

    protected function isMagento2(): bool
    {
        return $this->connection->createSchemaManager()->tablesExist($this->tablePrefix . 'store_website');
    }

    protected function getAdditionalData(): array
    {
        return [];
    }
}
