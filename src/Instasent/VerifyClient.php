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

class VerifyClient extends InstasentClient
{
    /**
     * Request a Verify for a number.
     *
     * @param string $from        Remittent, 11chars max
     * @param string $to          Recipient where SMS is delivered, Include the country phone prefix format E164
     * @param string $text        Message text content, 160 chars per SMS
     * @param string $tokenLength Length of token code. min => 3, max => 8
     * @param string $timeout     Time token is valid in seconds. min => 30
     * @param string $clientId    An user reference for your internal use, Optional - 40chars max, Unique per Verify
     *
     * @return array
     */
    public function requestVerify($from, $to, $text, $tokenLength = null, $timeout = null, $clientId = null)
    {
        $url = $this->secureChannel.'/verify/';
        $httpMethod = 'POST';
        $data = ['sms' => ['from' => $from, 'to' => $to, 'text' => $text]];

        if ($clientId) {
            $data['clientId'] = $clientId;
        }

        if ($tokenLength) {
            $data['tokenLength'] = $tokenLength;
        }

        if ($timeout) {
            $data['timeout'] = $timeout;
        }

        return $this->execRequest($url, $httpMethod, $data);
    }

    /**
     * Check a Verify by entity Id and token.
     *
     * @param string $id
     * @param string $token
     *
     * @return array
     */
    public function checkVerify($id, $token)
    {
        $url = $this->secureChannel.'/verify/'.$id;
        $url .= '?token='.$token;
        $httpMethod = 'GET';

        return $this->execRequest($url, $httpMethod, []);
    }

    /**
     * Get Verify by entity Id.
     *
     * @param string $id
     *
     * @return array
     */
    public function getVerifyById($id)
    {
        $url = $this->secureChannel.'/verify/'.$id;
        $httpMethod = 'GET';

        return $this->execRequest($url, $httpMethod, []);
    }

    /**
     * Get all verifies. Filter by page and resultes per page.
     *
     * @param int $page
     * @param int $perPage
     *
     * @return array
     */
    public function getVerify($page = 1, $perPage = 10)
    {
        $query = http_build_query(['page' => $page, 'per_page' => $perPage]);
        $url = $this->secureChannel.'/verify/?'.$query;
        $httpMethod = 'GET';

        return $this->execRequest($url, $httpMethod, []);
    }
}
