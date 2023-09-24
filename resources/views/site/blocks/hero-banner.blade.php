<div class="mb-10 hero-banner-block">
    <div class="relative h-full bg-center bg-no-repeat bg-cover hero-banner-container"
        style='background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ $block->image('banner', 'desktop') }})'>
        <div class="absolute text-center text-white hero-banner-text top-2/4 left-2/4">
            <h1 class='mb-10 text-6xl'>{{ $block->input('title') }}</h1>
            <h2 class='text-3xl'>{{ $block->input('subtitle') }}</class>
        </div>
    </div>
</div>
