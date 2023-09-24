@twillBlockTitle('Right Footer')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    name="follow"
    label="Follow Text"
    :translated="false"
/>

<x-twill::browser
    label="Select Links"
    module-name="personalLinks"
    name="personalLink"
    :max=3
/>
