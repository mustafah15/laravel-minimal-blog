<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/22/17
 * Time: 12:13 AM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    protected $statusCode ;

    /**
     * @param mixed $statusCode
     * @return ApiController
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $message
     * @return response
     */
    public function respondWithError($message)
    {
        return response()->json([
            'error'=>[
                'message'=> $message,
                'status_code'=>$this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function respond($data)
    {
        return response()->json($data,$this->getStatusCode());
    }
}