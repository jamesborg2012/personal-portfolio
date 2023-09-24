<div class="pt-10 mt-10 shadow-2xl skills-carousel skills-carousel-block rounded-2xl" id='skills_carousel'>
    <h2 class="text-4xl leading-relaxed text-center text-white">{{ $block->input('title') }}</h2>
    <skill-carousel skillsid="{{ serialize($block->browserIds('skills-carousel')) }}"></skill-carousel>
</div>
