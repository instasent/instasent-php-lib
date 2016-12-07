<?php

/*
 * This file is part of the Instasent PHP Library.
 *
 * (c) Instasent <app@instasent.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Instasent;

use Instasent\Abstracts\InstasentClient;

class AccountClient extends InstasentClient
{

    /**
     * Get Account Balance
     *
     * @return array
     */
    public function getAccountBalance()
    {
        $url = $this->secureChannel.'/organization/account/';
        $httpMethod = 'GET';
        return $this->execRequest($url, $httpMethod, array());
    }

}
