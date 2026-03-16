@php
    /** @var string $language */
    /** @var \App\Models\GreaterAdduPerson $person */
    $isDv        = $language === 'dv';
    $fontBody    = $isDv ? "'MV Roanu', sans-serif" : "'Poppins', sans-serif";
    $fontHeading = $isDv ? "'MV Roanu', sans-serif" : "'Playfair Display', serif";

    $name  = $isDv ? ($person->name_dv ?? $person->name_en) : $person->name_en;
    $role  = $isDv ? ($person->role_dv ?? $person->role_en) : $person->role_en;
    $bio1  = $isDv ? ($person->bio1_dv ?? $person->bio1_en) : $person->bio1_en;
    $bio2  = $isDv ? ($person->bio2_dv ?? $person->bio2_en) : $person->bio2_en;
    $photo = $person->photo ? asset('storage/' . ltrim($person->photo, '/')) : null;
@endphp

<!DOCTYPE html>
<html lang="{{ $language === 'dv' ? 'dv' : 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $name }} – {{ $isDv ? 'ބޮޑު އައްޑޫ' : 'The Greater Addu' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-50 min-h-screen">
    <nav
        class="w-full sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-slate-200"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-1">
                    <a
                        href="{{ route('home', ['lang' => $language]) }}"
                        class="inline-flex items-center gap-2 text-sm"
                        style="color:#045b52;font-family:{{ $fontBody }}"
                    >
                        ← {{ $isDv ? 'ފަހަތަށް' : 'Back to People' }}
                    </a>
                </div>
                <div class="flex-1 flex justify-center">
                    <span
                        class="text-base font-semibold tracking-wide"
                        style="color:#045b52;font-family:{{ $fontHeading }}"
                    >
                        {{ $isDv ? 'ދަ ގްރޭޓާ އައްޑޫ' : 'The Greater Addu' }}
                    </span>
                </div>
                <div class="flex-1"></div>
            </div>
        </div>
    </nav>

    <div class="h-[calc(100vh-4rem)] bg-gray-50 flex flex-col overflow-hidden">
        <div class="flex-1 flex flex-col max-w-4xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-0">
            <article class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden flex flex-col flex-1 min-h-0">
                <div class="flex flex-col sm:flex-row shrink-0">
                    <div class="sm:w-64 shrink-0 h-56 sm:h-auto bg-slate-100 overflow-hidden">
                        @if ($photo)
                            <img
                                src="{{ $photo }}"
                                alt="{{ $name }}"
                                class="w-full h-full object-cover object-top"
                            >
                        @endif
                    </div>
                    <div class="flex flex-col justify-center p-8 sm:p-10 flex-1">
                        <span
                            class="inline-block px-3 py-1 rounded-full text-xs mb-4 tracking-wide uppercase w-fit"
                            style="background-color:#e0f7f5;color:#045b52;font-family:{{ $fontBody }}"
                        >
                            {{ $role }}
                        </span>

                        <h1
                            class="text-3xl sm:text-4xl leading-tight mb-4"
                            style="color:#045b52;font-family:{{ $fontHeading }}"
                        >
                            {{ $name }}
                        </h1>
                    </div>
                </div>

                <div
                    class="h-px w-full shrink-0"
                    style="background:linear-gradient(90deg,#045b52,#21b5a3,transparent)"
                ></div>

                <div class="px-8 sm:px-10 py-8 flex flex-col justify-center gap-5 flex-1 min-h-0">
                    <p
                        class="text-gray-700 leading-relaxed text-base sm:text-[17px]"
                        style="font-family:{{ $fontBody }}"
                    >
                        {{ $bio1 }}
                    </p>
                    <p
                        class="text-gray-600 leading-relaxed text-base sm:text-[17px]"
                        style="font-family:{{ $fontBody }}"
                    >
                        {{ $bio2 }}
                    </p>
                </div>
            </article>
        </div>
    </div>
</body>
</html>

