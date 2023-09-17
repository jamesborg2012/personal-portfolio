<div class="text-and-image-block">
    <h2 class="mb-10 text-4xl leading-relaxed text-center">{{ $block->input('title') }}</h2>
    <div class="grid grid-cols-2 gap-10 text-and-image-content">
        @if ($block->input('image-position') == 'left')
            <div class="items-center px-10 py-8 mx-auto border-r-2 image-left">
                <img src="{{ $block->image('highlight', 'mobile') }}" />
            </div>
            <div class="py-8 mx-auto content-text">
                {!! $block->input('text') !!}
            </div>
        @else
            <div class="px-10 py-8 mx-auto border-r-2 content-text">
                {!! $block->input('text') !!}
            </div>
            <div class="items-center max-w-2xl py-8 mx-auto image-right">
                <img src="{{ $block->image('highlight', 'mobile') }}" />
            </div>
        @endif
    </div>
</div>
