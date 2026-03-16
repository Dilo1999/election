@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */
@endphp

<nav
    class="w-full sticky top-0 z-50 transition-all duration-300 bg-white/90 backdrop-blur border-b border-slate-200"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex-1"></div>

            <div class="flex-1 flex justify-center">
                <span
                    class="text-xl font-semibold tracking-wide"
                    style="color:#045b52;font-family:{{ $fontHeading }}"
                >
                    {{ $isDv ? 'ދަ ގްރޭޓާ އައްޑޫ' : 'The Greater Addu' }}
                </span>
            </div>

            <div class="flex-1 flex justify-end">
                @php
                    $toggleLang = $isDv ? 'en' : 'dv';
                @endphp
                <a
                    href="{{ route('home', ['lang' => $toggleLang]) }}"
                    class="flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg transition-colors"
                    style="color:#045b52;font-family:{{ $fontBody }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 3a9 9 0 100 18 9 9 0 000-18z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M2.25 12h19.5M12 2.25s3.75 3.75 3.75 9.75S12 21.75 12 21.75M12 2.25S8.25 6 8.25 12 12 21.75 12 21.75" />
                    </svg>
                    <span>{{ $isDv ? 'English' : 'ދިވެހި' }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>

