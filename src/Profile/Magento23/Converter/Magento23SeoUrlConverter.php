<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento23\Converter;

use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento\Converter\SeoUrlConverter;
use Swag\MigrationMagento\Profile\Magento\DataSelection\DataSet\SeoUrlDataSet;
use Swag\MigrationMagento\Profile\Magento23\Magento23Profile;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

#[Package('services-settings')]
class Magento23SeoUrlConverter extends SeoUrlConverter
{
    public function supports(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento23Profile
             && $this->getDataSetEntity($migrationContext) === SeoUrlDataSet::getEntity();
    }
}
