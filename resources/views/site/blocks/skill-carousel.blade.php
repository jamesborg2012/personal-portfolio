<div class="skills-carousel">
    @php
        $skillController = app('\App\Http\Controllers\Twill\SkillController');
        $skills = $skillController->getSkillsById($block->browserIds('skills-carousel'));
    @endphp

    @foreach ($skills as $skill)
        <p>{{ $skill['title'] }}</p>
        <p>{{ $skill['experience'] }}</p>
        <img src="{{ $skill['image'] }}" alt="{{ $skill['title'] }}" />
    @endforeach
</div>
