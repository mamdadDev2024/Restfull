<?php

namespace App\Contracts;

class ApiResponse
{
    private $response;
    private $message;
    private $code = 200;
    private $data;
    private $appends; 

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
    public function Data(mixed $data): ApiResponse
    {
        $this->data = $data;
        return $this;
    }

    public function appends(array $appends): ApiResponse
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
        if (!is_null($this->appends))
            $this->response = $this->response + $this->appends;

        return response()->json($this->response , $this->code);
    }
}