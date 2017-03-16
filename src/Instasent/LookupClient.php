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

class LookupClient extends InstasentClient
{
    /**
     * Do a lookup to get number info.
     *
     * @param string $to Recipient where lookup is requested
     *
     * @return array
     */
    public function doLookup($to)
    {
        $url = $this->secureChannel.'/lookup/';
        $httpMethod = 'POST';
        $data = ['to' => $to];

        return $this->execRequest($url, $httpMethod, $data);
    }

    /**
     * Get a lookup by id.
     *
     * @param string $id
     *
     * @return array
     */
    public function getLookupById($id)
    {
        $url = $this->secureChannel.'/lookup/'.$id;
        $httpMethod = 'GET';

        return $this->execRequest($url, $httpMethod, []);
    }

    /**
     * Get all lookups. Filter by page and resultes per page.
     *
     * @param int $page
     * @param int $perPage
     *
     * @return array
     */
    public function getLookups($page = 1, $perPage = 10)
    {
        $query = http_build_query(['page' => $page, 'per_page' => $perPage]);
        $url = $this->secureChannel.'/lookup/?'.$query;
        $httpMethod = 'GET';

        return $this->execRequest($url, $httpMethod, []);
    }
}
