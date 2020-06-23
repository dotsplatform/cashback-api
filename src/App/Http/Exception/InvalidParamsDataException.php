<?php
/**
 * Description of InvalidParamsDataException.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\Http\Exception;


class InvalidParamsDataException extends HttpClientException
{
    protected array $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
        return parent::__construct('Invalid Params');
    }
}