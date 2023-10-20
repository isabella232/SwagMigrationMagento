<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento23\Gateway\Local\Reader;

use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento\Gateway\Local\Reader\MediaReader;
use Swag\MigrationMagento\Profile\Magento23\Gateway\Local\Magento23LocalGateway;
use Swag\MigrationMagento\Profile\Magento23\Magento23Profile;
use SwagMigrationAssistant\Migration\DataSelection\DefaultEntities;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
class Magento23MediaReader extends MediaReader
{
    public function supports(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento23Profile
            && $migrationContext->getGateway()->getName() === Magento23LocalGateway::GATEWAY_NAME
            && $this->getDataSetEntity($migrationContext) === DefaultEntities::MEDIA;
    }

    public function supportsTotal(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento23Profile
            && $migrationContext->getGateway()->getName() === Magento23LocalGateway::GATEWAY_NAME;
    }
}
