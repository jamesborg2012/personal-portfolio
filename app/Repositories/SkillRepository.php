<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Skill;

class SkillRepository extends ModuleRepository
{
    use HandleBlocks, HandleMedias;

    public function __construct(Skill $model)
    {
        $this->model = $model;
    }
}
