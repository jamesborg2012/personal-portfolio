<div class='text-right right-footer'>
    <ul>
        @if (!empty($link_data))
            @foreach ($link_data as $single_link)
                <li class='inline mr-5 text-white'>
                    <a href='{{ $single_link['url'] }}' title='{{ $single_link['title'] }}' target='_blank'>
                        <i class="text-4xl {{ $single_link['icon'] }}"></i>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
