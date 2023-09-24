@twillBlockTitle('Skill Carousel')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    name="title"
    label="Title"
    :translated="false"
/>

<x-twill::browser
    module-name="skills"
    name="skills-carousel"
    label="Skills Carousel"
    :max="10"
/>
