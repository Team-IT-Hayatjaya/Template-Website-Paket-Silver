@props([
    'currentPage' => 1,
    'totalPages' => 5,
    'baseUrl' => '#',
])

<nav class="flex items-center justify-between border-t border-slate-200 px-4 py-3 sm:px-6 mt-6" aria-label="Navigasi Halaman Data">
    <div class="hidden sm:block">
        <p class="text-sm text-slate-700">
            Menampilkan halaman <span class="font-semibold text-slate-900">{{ $currentPage }}</span> dari <span class="font-semibold text-slate-900">{{ $totalPages }}</span>
        </p>
    </div>
    <div class="flex flex-1 justify-between sm:justify-end gap-2">
        @if($currentPage > 1)
            <a href="{{ $baseUrl }}?page={{ $currentPage - 1 }}" 
               class="relative inline-flex items-center rounded-md border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm font-medium text-slate-700 hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600">
                &larr; Sebelumnya
            </a>
        @else
            <span class="relative inline-flex items-center rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-xs sm:text-sm font-medium text-slate-400 cursor-not-allowed">
                &larr; Sebelumnya
            </span>
        @endif

        <!-- Indikator Halaman Mobile -->
        <div class="sm:hidden flex items-center text-xs font-bold text-slate-700 px-2">
            {{ $currentPage }} / {{ $totalPages }}
        </div>

        <div class="hidden md:flex gap-1">
            @for($i = 1; $i <= $totalPages; $i++)
                @if($i == $currentPage)
                    <span aria-current="page" 
                          class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-white rounded-md shadow-sm"
                          style="background-color: var(--gov-primary, #1e3a8a);">
                        {{ $i }}
                    </span>
                @else
                    <a href="{{ $baseUrl }}?page={{ $i }}" 
                       class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600"
                       aria-label="Pindah ke halaman {{ $i }}">
                        {{ $i }}
                    </a>
                @endif
            @endfor
        </div>

        @if($currentPage < $totalPages)
            <a href="{{ $baseUrl }}?page={{ $currentPage + 1 }}" 
               class="relative inline-flex items-center rounded-md border border-slate-300 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600">
                Berikutnya &rarr;
            </a>
        @else
            <span class="relative inline-flex items-center rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-400 cursor-not-allowed">
                Berikutnya &rarr;
            </span>
        @endif
    </div>
</nav>
