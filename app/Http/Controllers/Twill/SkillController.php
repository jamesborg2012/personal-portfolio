<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Commands\RefreshCrops;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Media;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\MediaLibrary\Imgix;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use A17\Twill\Services\MediaLibrary\local;
use Illuminate\Config\Repository as Config;

class SkillController extends BaseModuleController
{
    protected $moduleName = 'skills';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableReorder();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Medias::make()->name('cover')->label('Cover Image')
        );

        $form->add(
            Input::make()->name('description')->label('Description')
        );

        $form->add(
            Input::make()->name('experience')->label('Experience')
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }

    public function getSkillsById(array $skill_ids)
    {
        $skills = Skill::find($skill_ids);

        if (empty($skills)) {
            return [];
        }

        $skills_return = [];

        foreach ($skills as $skill) {

            /** @var Collection $mediaCollection */
            $mediaCollection = $skill->medias;
            $mediaModel = $mediaCollection->first();

            if (env('MEDIA_LIBRARY_ENDPOINT_TYPE') == 'local') {
                $mediaUrl = env('APP_URL') . '/storage/uploads/' . $mediaModel->uuid;
            } elseif (env('MEDIA_LIBRARY_ENDPOINT_TYPE') == 's3' && env('MEDIA_LIBRARY_IMAGE_SERVICE') == 'A17\Twill\Services\MediaLibrary\Imgix') {
                $config = new Config();
                $imgix = new Imgix($config);
                $mediaUrl = $imgix->getRawUrl($mediaModel->id);
            }

            $skills_return[] = ['title' => $skill->title, 'experience' => $skill->experience, 'image' => $mediaUrl];
        }

        return $skills_return;
    }
}
