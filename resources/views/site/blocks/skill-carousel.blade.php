<div class="mt-10 mb-10 skills-carousel">
    <h2 class="text-4xl leading-relaxed text-center">{{ $block->input('title') }}</h2>

    @php
        $skillController = app('\App\Http\Controllers\Twill\SkillController');
        $skills = $skillController->getSkillsById($block->browserIds('skills-carousel'));
    @endphp

    @if (!empty($skills))
        <div class="grid grid-cols-4 mt-10 gap-x-4 gap-y-16">
            @foreach ($skills as $skill)
                <div class="text-center single-skill">
                    <i class="text-7xl {{ $skill['icon'] }}"></i>
                </div>
            @endforeach
        </div>
    @endif
</div>
