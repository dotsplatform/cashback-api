<?php
/**
 * Description of UnprocessableEntityException.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\Http\Exception;


class UnprocessableEntityException extends HttpClientException
{
    protected array $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
        return parent::__construct('Unprocessable Entity');
    }
}