@twillBlockTitle('Skill Details')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::medias
    name="highlight"
    label="Image"
/>

<x-twill::wysiwyg
    name="content"
    label="Content"
    placeholder="Skill Experience..."
    :toolbar-options="[
        'bold',
        'italic',
        ['list' => 'bullet'],
        ['list' => 'ordered'],
        [ 'script' => 'super' ],
        [ 'script' => 'sub' ],
        'link',
        'clean'
    ]"
    :translated="false"
/>

<x-twill::input
    name="experience"
    label="Experience"
    :translated="false"
/>
