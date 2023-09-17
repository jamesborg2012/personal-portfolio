<!doctype html>
<html lang="en">
<head>
    <title>{{ $item->title }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-menu/>
<div>
   <div class="max-w-2xl mx-auto">
    {!! $item->renderBlocks() !!}
   </div>
</div>
</body>
</html>
