<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Commands\RefreshCrops;
use A17\Twill\Models\Media;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\MediaLibrary\local;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\MediaLibrary\Imgix;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Config\Repository as Config;
use App\Traits\LogTrait;

class SkillController extends BaseModuleController
{
    use LogTrait;

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

        $form->add(
            Input::make()->name('icon')->label('Font Awsome Icon Class')
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

    /**
     * Returns Skills posts using the provided IDs
     */
    public function getSkillsById(array $skill_ids)
    {
        $skills = Skill::find($skill_ids)->sortBy('position');

        if (empty($skills)) {
            return [];
        }

        $skills_return = [];

        foreach ($skills as $skill) {
            $mediaUrl = '';

            /** @var Collection $mediaCollection */
            $mediaCollection = $skill->medias;

            //Get images if set
            if ($mediaCollection->isNotEmpty()) {
                $mediaModel = $mediaCollection->first();

                if (env('MEDIA_LIBRARY_ENDPOINT_TYPE') == 'local') {
                    $mediaUrl = env('APP_URL') . '/storage/uploads/' . $mediaModel->uuid;
                } elseif (env('MEDIA_LIBRARY_ENDPOINT_TYPE') == 's3' && env('MEDIA_LIBRARY_IMAGE_SERVICE') == 'A17\Twill\Services\MediaLibrary\Imgix') {
                    $config = new Config();
                    $imgix = new Imgix($config);
                    $mediaUrl = $imgix->getRawUrl($mediaModel->id);
                }
            }

            $skills_return[] = ['title' => $skill->title, 'experience' => $skill->experience, 'icon' => $skill->icon, 'image' => $mediaUrl];
        }

        return $skills_return;
    }

    /**
     * Returns the data of the Skills ID when received in a serialised format
     */
    public function getSkillsByIdSerialized(string $skill_id_serialised)
    {
        $skill_ids = unserialize($skill_id_serialised);

        if (empty($skill_ids)) {
            return response()->json([
                'data' => [],
            ]);
        }

        $skills_data = $this->getSkillsById($skill_ids);

        if (empty($skills_data)) {
            return response()->json([
                'data' => [],
            ]);
        }

        return response()->json([
            'data' => $skills_data,
        ]);
    }
}
