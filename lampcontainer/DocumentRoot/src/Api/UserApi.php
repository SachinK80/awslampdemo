<?php

/**
 * UserApi
 *
 * PHP version 7.1
 *
 * @package OpenAPIServer\Api
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * LampDemo
 *
 * LampDemo
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */
namespace OpenAPIServer\Api;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Exception;

/**
 * UserApi Class Doc Comment
 *
 * @package OpenAPIServer\Api
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */
class UserApi extends AbstractUserApi
{

    /**
     * @var ContainerInterface|null Slim app container instance
     */
    protected $container;

    /**
     * Route Controller constructor receives container
     *
     * @param ContainerInterface|null $container Slim app container instance
     */
    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    /**
     * GET userMinIdMaxIdGet
     * Summary: Get user between min and max id to simulate user updation for benchmark
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws Exception to force implementation class to override this method
     */
    public function userMinIdMaxIdGet(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $minId = $args['minId'];
        $maxId = $args['maxId'];
	$reader_redis = new \Redis();
	$reader_redis->connect('localhost', 6380);
	$key = rand ( intval($minId) , intval($maxId ));
	$out = $reader_redis->get($key);
        $response->getBody()->write($out);
        return $response->withStatus(200);
    }

    /**
     * PATCH userMinIdMaxIdPatch
     * Summary: Update user between min and max id to simulate user updation for benchmark
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws Exception to force implementation class to override this method
     */
    public function userMinIdMaxIdPatch(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
    }

    /**
     * POST userPost
     * Summary: Creates a user with random details to simulate user creation for benchmark
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws Exception to force implementation class to override this method
     */
    public function userPost(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {	
	$db = getConnection();
	$sql = 'insert into users (name, data1, data2) values ( UUID(),  UUID() ,UUID())';
	$stmt = $db->prepare($sql);
	$ret = $stmt->execute(); 
        $response->getBody()->write(json_encode($ret));
        return $response->withStatus(200);
	/**$minId = $args['minId'];
        $maxId = $args['maxId'];

	$writer_redis = new \Redis();
	$writer_redis->connect('localhost', 6379);
	$key = rand ( intval($minId) , intval($maxId );
	$user = [
	  "name" => "string",
	  "age" => 0,
	  "data1" => "string",
	  "data2" => "string"
	];
	$writer_redis->set($key, json_encode($user));
        $message = "User created";
        $response->getBody()->write($message);
        return $response->withStatus(200);
	 */
    }


}
