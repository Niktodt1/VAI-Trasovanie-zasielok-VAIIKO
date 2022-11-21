<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\Package;

use Exception;

class HomeController extends \App\Core\AControllerBase
{



    /**
     * @inheritDoc
     * @return ViewResponse
     * @throws Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Package::getAll()
        ]);
    }
}