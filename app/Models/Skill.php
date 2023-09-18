<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Skill extends Model implements Sortable
{
    use HasBlocks, HasMedias, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
    ];
    
}
