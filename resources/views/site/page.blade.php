<!doctype html>
<html lang="en">

<head>
    <title>{{ $item->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class='main-container'>
        <div class="px-16 pt-10 mx-auto">
            {!! $item->renderBlocks() !!}
        </div>
        <footer class="grid grid-cols-2 px-16 py-8 mx-auto mt-10 border-t-2">
            <x-left-footer />
            <x-right-footer />
        </div>
    </div>
</body>

</html>
