<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento23\Gateway\Local\Reader;

use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento2\Gateway\Local\Reader\Magento2SeoUrlReader;
use Swag\MigrationMagento\Profile\Magento23\Gateway\Local\Magento23LocalGateway;
use Swag\MigrationMagento\Profile\Magento23\Magento23Profile;
use SwagMigrationAssistant\Migration\DataSelection\DefaultEntities;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
class Magento23SeoUrlReader extends Magento2SeoUrlReader
{
    public function supports(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento23Profile
            && $migrationContext->getGateway()->getName() === Magento23LocalGateway::GATEWAY_NAME
            && $this->getDataSetEntity($migrationContext) === DefaultEntities::SEO_URL;
    }

    public function supportsTotal(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento23Profile
            && $migrationContext->getGateway()->getName() === Magento23LocalGateway::GATEWAY_NAME;
    }
}
