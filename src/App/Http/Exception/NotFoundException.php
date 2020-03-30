<?php
/**
 * Description of NotFoundException.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\Http\Exception;


class NotFoundException extends HttpClientException
{
    public function __construct($errors)
    {
        $this->errors = $errors;
        return parent::__construct('Not found');
    }
}