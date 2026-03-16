@php
    /** @var string $language */
    /** @var array<array<string,mixed>> $people */
    $isDv        = $language === 'dv';
    $fontHeading = $isDv ? "'MV Roanu', sans-serif" : "'Playfair Display', serif";
    $fontBody    = $isDv ? "'MV Roanu', sans-serif" : "'Poppins', sans-serif";
@endphp

<!DOCTYPE html>
<html lang="{{ $language === 'dv' ? 'dv' : 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $isDv ? 'ބޮޑު އައްޑޫ' : 'The Greater Addu' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { margin: 0; }
    </style>
</head>
<body class="antialiased min-h-screen bg-white">
    {{-- Navbar --}}
    @include('sections.greater-addu-navbar')

    {{-- Hero --}}
    @include('sections.greater-addu-hero')

    {{-- Key pledges --}}
    @include('sections.greater-addu-pledges')

    {{-- People section --}}
    @include('sections.greater-addu-people')

    {{-- Blogs section --}}
    @include('sections.greater-addu-blogs')

    {{-- Contact section --}}
    @include('sections.greater-addu-contact')

    {{-- Footer --}}
    <footer style="background-color:#022e2a">
        <div class="h-px w-full" style="background:linear-gradient(90deg,transparent,#21b5a3,transparent)"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex flex-col items-center md:items-start gap-1">
                    <span
                        class="text-white text-lg"
                        style="font-family:{{ $fontHeading }}"
                    >
                        {{ $isDv ? 'ދަ ގްރޭޓާ އައްޑޫ' : 'The Greater Addu' }}
                    </span>
                    <span
                        class="text-xs"
                        style="color:rgba(255,255,255,0.35);font-family:{{ $fontBody }}"
                    >
                        {{ $isDv ? 'ހިތަދޫ، އައްޑޫ ސިޓީ' : 'Hithadhoo, Addu City, Maldives' }}
                    </span>
                </div>

                @php
                    $footerLinks = $isDv
                        ? ['ވިޝަން', 'ވަޢުދުތައް', 'ތަމްސީލުވެރިން', 'ލިއުންތައް', 'ގުޅުން']
                        : ['Vision', 'Key Pledges', 'Representatives', 'Blogs', 'Contact'];
                @endphp

                <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
                    @foreach ($footerLinks as $label)
                        <span
                            class="text-xs"
                            style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                        >
                            {{ $label }}
                        </span>
                    @endforeach
                </nav>

                <div class="flex items-center gap-3">
                    @foreach (['F','T','I'] as $initial)
                        <span
                            class="w-8 h-8 rounded-lg flex items-center justify-center text-xs"
                            style="background-color:rgba(255,255,255,0.07);color:rgba(255,255,255,0.45)"
                        >
                            {{ $initial }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 pt-6 flex flex-col sm:flex-row items-center justify-between gap-2" style="border-top:1px solid rgba(255,255,255,0.07)">
                <p
                    class="text-xs"
                    style="color:rgba(255,255,255,0.25);font-family:{{ $fontBody }}"
                >
                    {{ $isDv
                        ? '© 2026 ދަ ގްރޭޓާ އައްޑޫ. ހުރިހާ ހައްޤެއް ލިބިގެންވެ.'
                        : '© 2026 The Greater Addu. All rights reserved.' }}
                </p>
                <p
                    class="text-xs"
                    style="color:rgba(255,255,255,0.25);font-family:{{ $fontBody }}"
                >
                    {{ $isDv ? 'އައްޑޫ ސިޓީ، ދިވެހިރާއްޖެ' : 'Built with purpose for Addu City' }}
                </p>
            </div>
        </div>
    </footer>
</body>
</html>

