<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Migration\Mapping\Registry;

use Shopware\Core\Framework\Log\Package;

/**
 * @template TMappingArray of array
 * @template-implements MappingRegistryInterface<TMappingArray>
 */
#[Package('services-settings')]
class AbstractMappingRegistry implements MappingRegistryInterface
{
    /**
     * @var TMappingArray
     */
    protected static array $mapping = [];

    public static function get(string $identifier): ?array
    {
        if (!isset(static::$mapping[$identifier])) {
            return null;
        }

        return static::$mapping[$identifier];
    }
}
