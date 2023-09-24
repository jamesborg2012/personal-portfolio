@twillBlockTitle('Left Footer')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    name="copyright"
    label="Copyright Name"
    :translated="false"
/>

<x-twill::checkbox
    name="copyright_year"
    label="Show the Copyright year?"
    default="true"
/>
