@twillBlockTitle('Text And Image')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input name="title" label="Title" :translated="false" />

<x-twill::wysiwyg name="text" label="Text" placeholder="Text" :toolbar-options="[
    'bold',
    'italic',
    ['list' => 'bullet'],
    ['list' => 'ordered'],
    ['script' => 'super'],
    ['script' => 'sub'],
    'link',
    'clean',
]" :translated="false" />

<x-twill::medias name="highlight" label="Highlight" />

@php
    $selectOptions = [
        [
            'value' => 'left',
            'label' => 'Left',
        ],
        [
            'value' => 'right',
            'label' => 'Right',
        ],
    ];
@endphp

<x-twill::select name="image-position" label="Image Position" placeholder="Select image position" :options="$selectOptions" />
