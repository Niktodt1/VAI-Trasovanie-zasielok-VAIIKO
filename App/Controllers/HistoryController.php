<?php

namespace App\Controllers;

use App\Core\Responses\Response;

class HistoryController extends \App\Core\AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->html();
    }
}