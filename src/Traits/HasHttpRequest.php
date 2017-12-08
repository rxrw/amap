<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/7
 * Time: 15:02
 */

namespace Reprover\Amap\Traits;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Reprover\Amap\Exceptions\CannotParseResponseException;
use Reprover\Amap\Exceptions\HttpException;

trait HasHttpRequest
{

    /**
     * @param string $endpoint 补全url
     * @param array $params 请求参数
     * @param array $headers 请求头
     * @return Object
     * @throws CannotParseResponseException
     * @throws HttpException
     */
    protected function get($endpoint, $params, $headers = [])
    {
        return $this->request('get', $endpoint, [
            'header' => $headers,
            'query' => $params
        ]);
    }

    /**
     * @param string $endpoint 补全url
     * @param array|string $params
     * @param array ...$options
     * @return Object
     * @throws CannotParseResponseException
     * @throws HttpException
     */
    protected function post($endpoint, $params = [], ...$options)
    {
        if (is_array($params))
            $options['form_params'] = $params;
        else
            $options['body'] = $params;
        return $this->request('post', $endpoint, !empty($options) ?: []);
    }

    /**
     * @param array $config
     * @return Client
     */
    protected function getHttpClient(array $config)
    {
        return new Client($config);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return Object
     * @throws CannotParseResponseException
     * @throws HttpException
     */
    protected function request($method, $endpoint, $options)
    {
        return $this->unwrapResponse($this->getHttpClient($this->getBaseOptions())->{$method}($endpoint, $options));
    }

    /**
     * Return base Guzzle options.
     *
     * @return array
     */
    protected function getBaseOptions()
    {
        $options = [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => property_exists($this, 'timeout') ? $this->timeout : 5.0,
        ];
        return $options;
    }

    /**
     * 转换返回数据为Result对象
     *
     * @param ResponseInterface $response 请求获得的对象
     *
     * @return Object
     * @throws CannotParseResponseException
     * @throws HttpException
     */
    protected function unwrapResponse(ResponseInterface $response)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents = $response->getBody()->getContents();
        if ($response->getStatusCode() != 200)
            throw new HttpException();

        if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {
            return json_decode($contents);
        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)));
        }
        throw new CannotParseResponseException();
    }

}