@props([
    'title',
    'date' => null,
    'category' => 'Berita',
    'excerpt' => '',
    'image' => null,
    'url' => '#',
])

<article class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col h-full">
    @if($image)
        <div class="aspect-video w-full overflow-hidden bg-slate-100 relative">
            <img src="{{ $image }}" 
                 alt="Dokumentasi: {{ $title }}" 
                 loading="lazy" 
                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 px-2.5 py-1 text-xs font-semibold rounded-md text-white shadow-sm"
                  style="background-color: var(--gov-primary, #1e3a8a);">
                {{ $category }}
            </span>
        </div>
    @else
        <div class="p-4 pb-0 flex items-center justify-between">
            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-md text-white"
                  style="background-color: var(--gov-primary, #1e3a8a);">
                {{ $category }}
            </span>
        </div>
    @endif

    <div class="p-5 flex-1 flex flex-col">
        @if($date)
            <time class="text-xs text-slate-500 mb-2 flex items-center gap-1.5 font-medium">
                <span aria-hidden="true">📅</span> {{ $date }}
            </time>
        @endif

        <h3 class="text-base font-bold text-slate-900 mb-2.5 line-clamp-2 hover:text-blue-900 leading-snug">
            <a href="{{ $url }}" class="focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 rounded">
                {{ $title }}
            </a>
        </h3>

        <p class="text-sm text-slate-600 line-clamp-3 mb-4 flex-1">
            {{ $excerpt }}
        </p>

        <div class="pt-3 border-t border-slate-100 mt-auto">
            <a href="{{ $url }}" 
               class="inline-flex items-center text-sm font-semibold text-blue-800 hover:text-blue-950 gap-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 rounded"
               aria-label="Baca selengkapnya mengenai {{ $title }}">
                Baca Selengkapnya <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</article>
