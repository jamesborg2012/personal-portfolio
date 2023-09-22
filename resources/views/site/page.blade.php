<!doctype html>
<html lang="en">
<head>
    <title>{{ $item->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-menu/>
<div>
   <div class="px-16 mx-auto">
    {!! $item->renderBlocks() !!}
   </div>
</div>
</body>
</html>
