<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento22;

use Shopware\Core\Framework\Log\Package;
use Swag\MigrationMagento\Profile\Magento2\Profile\Magento2Profile;

#[Package('services-settings')]
class Magento22Profile extends Magento2Profile
{
    public const PROFILE_NAME = 'magento22';

    public const SOURCE_SYSTEM_VERSION = '2.2';
}
