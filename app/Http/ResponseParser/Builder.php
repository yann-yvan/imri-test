<?php


namespace App\Http\ResponseParser;


use Illuminate\Support\Str;

class Builder
{
    /*
       * Class properties
       */
    private $message = null;
    private $status = false;
    private $code = 0;
    private $data = null;
    private $token = null;

    /**
     * Code constructor.
     *
     * @param      $code
     * @param null $message
     *
     * @throws \Exception
     */
    public function __construct($code, $message = null)
    {
        if ($this->isNotDocCode($code)) {
            throw new \Exception('Response code not found please refer to documentation');
        }
        $this->status = $code > 0;
        $this->code = abs($code);
        $this->message = $this->defaultMessage($code, $message);
    }

    /**
     * Check if send code exist in doc code
     *
     * @param  $code
     *
     * @return bool
     */
    private function isNotDocCode($code)
    {
        $codes = array();
        foreach (config('code') as $item => $value) {
            $codes = array_merge($codes, array_values($value));
        }
        return !in_array($code, $codes);
    }

    private function defaultMessage($code, $message)
    {
        if (empty($message)) {
            foreach (config('code') as $item => $value) {
                foreach ($value as $key => $val)
                    if ($val == $code) {
                        return Str::upper($item) . ' ' . $key;
                    }
            }
        }

        return $message;
    }

    /**
     * @param null $data
     */
    public function setData($data)
    {
        try {
            $errors = json_decode($data, true);
            if ($this->code == abs(config("code.request.VALIDATION_ERROR")) and is_array($errors)) {
                foreach ($errors as $error) {
                    $this->message = $error[0];
                    break;
                }
            }
        } catch (\Exception | \Throwable $e) {
        }
        $this->data = $data;
    }

    /**
     * @param null $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return array
     */
    public function reply()
    {
        $data = [
            'status' => $this->status,
            'message' => $this->message,
            'code' => $this->code,
            'data' => $this->data,
        ];
        if ($this->token != null) {
            $data['token'] = $this->token;
        }

        return $data;
    }
}
