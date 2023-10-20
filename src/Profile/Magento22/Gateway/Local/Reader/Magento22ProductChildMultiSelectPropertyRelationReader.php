<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento22\Gateway\Local\Reader;

use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento\DataSelection\DataSet\ProductChildMultiSelectPropertyRelationDataSet;
use Swag\MigrationMagento\Profile\Magento2\Gateway\Local\Reader\Magento2ProductChildMultiSelectPropertyRelationReader;
use Swag\MigrationMagento\Profile\Magento22\Gateway\Local\Magento22LocalGateway;
use Swag\MigrationMagento\Profile\Magento22\Magento22Profile;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
class Magento22ProductChildMultiSelectPropertyRelationReader extends Magento2ProductChildMultiSelectPropertyRelationReader
{
    public function supports(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento22Profile
            && $migrationContext->getGateway()->getName() === Magento22LocalGateway::GATEWAY_NAME
            && $this->getDataSetEntity($migrationContext) === ProductChildMultiSelectPropertyRelationDataSet::getEntity();
    }

    public function supportsTotal(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento22Profile
            && $migrationContext->getGateway()->getName() === Magento22LocalGateway::GATEWAY_NAME;
    }
}
