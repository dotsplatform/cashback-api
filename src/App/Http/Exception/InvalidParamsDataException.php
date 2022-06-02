<?php
/**
 * Description of InvalidParamsDataException.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\Http\Exception;


class InvalidParamsDataException extends HttpClientException
{
    protected array $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
        parent::__construct('Invalid Params');
    }
}