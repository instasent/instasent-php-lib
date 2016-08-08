<?php

/*
 * This file is part of the Instasent PHP Library.
 *
 * (c) Instasent <app@instasent.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Instasent\Abstracts;

abstract class InstasentClient
{
    /**
     * Endpoint URL
     *
     * @var string
     */
    protected $rootEndpoint = 'http://api.instasent.codes';

    /**
     * Secure Channel URL
     *
     * @var string
     */
    protected $secureChannel = 'http://api.instasent.codes';

    /**
     * Api Token
     *
     * @var string
     */
    protected $token;

    /**
     * Use secure channel flag
     *
     * @var boolean
     */
    protected $useSecureChannel = true;

    /**
     * InstasentClient constructor.
     *
     * @param $token
     * @param bool $useSecureChannel
     */
    public function __construct($token, $useSecureChannel = true)
    {
        $this->token = $token;
        $this->useSecureChannel = $useSecureChannel;
    }

    /**
     * Execute the request using curl
     *
     * @param  string $url
     * @param  string $httpMethod
     * @param  string $data
     *
     * @return array
     */
    protected function execRequest($url, $httpMethod, $data)
    {
        $curl = curl_init();
        $headers = array(
            'Authorization: Bearer '.$this->token,
            'Accept: application/json',
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
