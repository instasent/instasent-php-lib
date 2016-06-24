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

class VerifyClient
{
    /**
     * [$rootEndpoint description]
     * @var string
     */
    private $rootEndpoint = 'http://api.instasent.com';

    /**
     * [$secureCahnnel description]
     * @var string
     */
    private $secureChannel = 'https://api.instasent.com';

    /**
     * [$token description]
     * @var string
     */
    private $token;

    /**
     * [$useSecureChannel description]
     * @var boolean
     */
    private $useSecureChannel = true;

    /**
     * [__construct description]
     * @param [type] $environment [description]
     */
    public function __construct($token, $useSecureChannel = true)
    {
        $this->token = $token;
        $this->useSecureChannel = $useSecureChannel;
    }

    /**
     * [request a Verify for a number.]
     * @param  [string] $from        [Remittent, 11chars max]
     * @param  [string] $to          [Recipient where SMS is delivered, Include the country phone prefix format E164]
     * @param  [string] $text        [Message text content, 160 chars per SMS]
     * @param  [string] $tokenLength [Length of token code. min => 3, max => 8]
     * @param  [string] $timeout     [Time token is valid in seconds. min => 30]
     * @param  [string] $clientId    [An user reference for your internal use, Optional - 40chars max, Unique per SMS]
     *
     * @return array              [description]
     */
    public function requestVerify($from, $to, $text, $tokenLength = null, $timeout = null, $clientId = null)
    {
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/verify/' : $this->rootEndpoint.'/verify/';
        $httpMethod = 'POST';
        $data = array('sms' => array('from' => $from, 'to' => $to, 'text' => $text));

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
     * [getVerify Get Verify by entity Id.]
     * @param  [string] $id     [verify id]
     * @param  [string] $token  [token value]
     *
     * @return array          [description]
     */
    public function checkVerify($id, $token)
    {
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/verify/'.$id : $this->rootEndpoint.'/verify/'.$id;
        $url .= '?token='.$token;
        $httpMethod = 'GET';
        return $this->execRequest($url, $httpMethod, array());
    }

    /**
     * [getVerify Get Verify by entity Id.]
     * @param  [type] $id     [description]
     *
     * @return array          [description]
     */
    public function getVerifyById($id)
    {
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/verify/'.$id : $this->rootEndpoint.'/verify/'.$id;
        $httpMethod = 'GET';
        return $this->execRequest($url, $httpMethod, array());
    }

    /**
     * [getSms Get all sms. Filter by page and resultes per page.]
     * @param  integer $page    [description]
     * @param  integer $perPage [description]

     * @return array            [description]
     */
    public function getVerify($page = 1, $perPage = 10)
    {
        $query = http_build_query(array('page' => $page, 'per_page' => $perPage));
        $url = ($this->useSecureChannel) ? $this->secureChannel.'/verify/?'.$query : $this->rootEndpoint.'/verify/?'.$query;
        $httpMethod = 'GET';
        return $this->execRequest($url, $httpMethod, array());
    }

   /**
    * [execRequest Execute the request using curl]
    * @param  [type] $url        [description]
    * @param  [type] $httpMethod [description]
    * @param  [type] $data       [description]
    *
    * @return array              [description]
    */
    private function execRequest($url, $httpMethod, $data)
    {
        $curl = curl_init();
        $headers = array(
            'Authorization: Bearer '.$this->token,
        );

        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        if ($httpMethod == 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }
        $body = curl_exec($curl);
        $info = curl_getinfo($curl);

        return array(
            "response_code" => $info['http_code'],
            "response_body" => $body,
        );
    }
}
