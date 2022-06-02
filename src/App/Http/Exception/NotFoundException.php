<?php
/**
 * Description of NotFoundException.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\Http\Exception;


class NotFoundException extends HttpClientException
{
    protected array $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
        parent::__construct('Not found');
    }
}