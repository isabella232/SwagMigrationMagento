<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento2\Gateway\Local\Reader;

use Doctrine\DBAL\Driver\ResultStatement;
use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento\Gateway\Local\Reader\CountryReader;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
abstract class Magento2CountryReader extends CountryReader
{
    public function read(MigrationContextInterface $migrationContext, array $params = []): array
    {
        $this->setConnection($migrationContext);

        $query = $this->connection->createQueryBuilder();

        $query->addSelect('country.iso2_code as isoCode, country.*');
        $query->from($this->tablePrefix . 'directory_country', 'country');

        return $query->executeQuery()->fetchAllAssociative();
    }
}
