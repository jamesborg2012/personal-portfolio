<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\PersonalLink;

class PersonalLinkRepository extends ModuleRepository
{
    use HandleBlocks;

    public function __construct(PersonalLink $model)
    {
        $this->model = $model;
    }
}
