<!doctype html>
<html lang="en">

<head>
    <title>{{ $item->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div class="px-16 mx-auto">
            {!! $item->renderBlocks() !!}
        </div>
        <div class="grid grid-cols-2 px-16 py-8 mx-auto footer">
            <x-left-footer />
            <x-right-footer />
        </div>
    </div>
</body>

</html>
