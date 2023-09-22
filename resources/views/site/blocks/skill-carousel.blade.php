<div class="mt-10 mb-10 skills-carousel" id='skills_carousel'>
    <h2 class="text-4xl leading-relaxed text-center">{{ $block->input('title') }}</h2>
    <skill-carousel skillsid="{{ serialize($block->browserIds('skills-carousel')) }}"></skill-carousel>
</div>
