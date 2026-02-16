<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthMerchantUser\Business;

use Generated\Shared\Transfer\AuthorizationRequestTransfer;
use Generated\Shared\Transfer\UserIdentifierTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\OauthMerchantUser\Business\OauthMerchantUserBusinessFactory getFactory()
 */
class OauthMerchantUserFacade extends AbstractFacade implements OauthMerchantUserFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UserIdentifierTransfer $userIdentifierTransfer
     *
     * @return list<\Generated\Shared\Transfer\OauthScopeTransfer>
     */
    public function getMerchantUserTypeOauthScopes(UserIdentifierTransfer $userIdentifierTransfer): array
    {
        return $this->getFactory()
            ->createMerchantUserTypeOauthScopeProvider()
            ->getScopes($userIdentifierTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AuthorizationRequestTransfer $authorizationRequestTransfer
     *
     * @return bool
     */
    public function authorizeByMerchantUserScope(AuthorizationRequestTransfer $authorizationRequestTransfer): bool
    {
        return $this->getFactory()
            ->createMerchantUserTypeOauthScopeAuthorizationChecker()
            ->authorize($authorizationRequestTransfer);
    }
}
