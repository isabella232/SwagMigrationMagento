<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\MigrationMagento\Profile\Magento22\Gateway\Local\Reader;

use Swag\MigrationMagento\Profile\Magento2\Gateway\Local\Reader\Magento2NewsletterRecipientReader;
use Swag\MigrationMagento\Profile\Magento22\Gateway\Local\Magento22LocalGateway;
use Swag\MigrationMagento\Profile\Magento22\Magento22Profile;
use SwagMigrationAssistant\Migration\DataSelection\DefaultEntities;
use SwagMigrationAssistant\Migration\MigrationContextInterface;

class Magento22NewsletterRecipientReader extends Magento2NewsletterRecipientReader
{
    public function supports(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento22Profile
            && $migrationContext->getGateway()->getName() === Magento22LocalGateway::GATEWAY_NAME
            && $migrationContext->getDataSet()::getEntity() === DefaultEntities::NEWSLETTER_RECIPIENT;
    }

    public function supportsTotal(MigrationContextInterface $migrationContext): bool
    {
        return $migrationContext->getProfile() instanceof Magento22Profile
            && $migrationContext->getGateway()->getName() === Magento22LocalGateway::GATEWAY_NAME;
    }
}