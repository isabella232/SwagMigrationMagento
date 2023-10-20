<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento23\Premapping;

use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento2\Premapping\Magento2CurrencyReader;
use Swag\MigrationMagento\Profile\Magento23\Magento23Profile;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
class Magento23CurrencyReader extends Magento2CurrencyReader
{
    public function supports(MigrationContextInterface $migrationContext, array $entityGroupNames): bool
    {
        return $migrationContext->getProfile() instanceof Magento23Profile;
    }
}
