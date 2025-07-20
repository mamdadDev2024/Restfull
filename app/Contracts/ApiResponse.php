<?php

namespace App\Contracts;

class ApiResponse
{
    private $response;
    private $message;
    private $code;
    private $data;
    private $appends;

    public function __construct()
    {

    }  

    public function Message(string $message): ApiResponse
    {
        $this->message = $message;
        return $this;
    }
    public function Code(int $status): ApiResponse
    {
        $this->code = $status;
        return $this;
    }
    public function Data(mixed $data): void
    {
        $this->data = $data;
    }

    public function appends(mixed $appends): ApiResponse
    {
        $this->appends = $appends;
        return $this;
    }

    public function response()
    {
        if (!is_null($this->message))
            $this->response['message'] = $this->message;
        if (is_null($this->code))
            $this->response['code'] = 200;
        if (!is_null($this->data))
            $this->response['data'] = $this->data;
        $this->response = $this->response + $this->appends;

        return response()->json($this->response , $this->code);
    }
}