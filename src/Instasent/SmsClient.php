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

class SmsClient extends InstasentClient
{

    /**
     * Send a sms
     * @param  string $from     Remittent, 11chars max
     * @param  string $to       Recipient where SMS is delivered, Include the country phone prefix format E164
     * @param  string $text     Message text content, 160 chars per SMS
     * @param  string $clientId An user reference for your internal use, Optional - 40chars max, Unique per SMS
     *
     * @return array
     */
    public function sendSms($from, $to, $text, $clientId = null)
    {
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/sms/' : $this->rootEndpoint.'/sms/';
        $httpMethod = 'POST';
        $data = array('from' => $from, 'to' => $to, 'text' => $text);
        if ($clientId) {
            $data['clientId'] = $clientId;
        }
        return $this->execRequest($url, $httpMethod, $data);
    }

    /**
     * Send a sms
     * @param  string $from     Remittent, 11chars max
     * @param  string $to       Recipient where SMS is delivered, Include the country phone prefix format E164
     * @param  string $text     Message text content, 160 chars per SMS
     * @param  string $clientId An user reference for your internal use, Optional - 40chars max, Unique per SMS
     *
     * @return array
     */
    public function sendBulkSms($messages, $clientId = null)
    {
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/sms/bulk/' : $this->rootEndpoint.'/sms/bulk/';
        $httpMethod = 'POST';

        if ($clientId) {
            $data['clientId'] = $clientId;
        }
        return $this->execRequest($url, $httpMethod, $messages);
    }

    /**
     * Get Sms by entity Id
     * @param  string $id
     *
     * @return array
     */
    public function getSmsById($id)
    {
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/sms/'.$id : $this->rootEndpoint.'/sms/'.$id;
        $httpMethod = 'GET';
        return $this->execRequest($url, $httpMethod, array());
    }

    /**
     * Get all sms. Filter by page and resultes per page.
     * @param  integer $page
     * @param  integer $perPage
     *
     * @return array
     */
    public function getSms($page = 1, $perPage = 10)
    {
        $query = http_build_query(array('page' => $page, 'per_page' => $perPage));
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/sms/?'.$query : $this->rootEndpoint.'/sms/?'.$query;
        $httpMethod = 'GET';
        return $this->execRequest($url, $httpMethod, array());
    }
}
