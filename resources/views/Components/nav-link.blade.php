@props(['active' => false])

<a class="{{ $active ? 'bg-gray-900 text-white font-bold': 'text-gray-300 hover:bg-gray-700 hover:text-white font-bold'}} rounded-md px-3 py-2 text-sm font-bold"
   aria-current="{{ $active ? 'page': 'false' }}"
   {{ $attributes }}
>{{ $slot }}</a>
