@php
    /** @var string $language */
    /** @var \App\Models\BlogPost $blog */
    $isDv        = $language === 'dv';
    $fontHeading = $isDv ? "'MV Roanu', sans-serif" : "'Playfair Display', serif";
    $fontBody    = $isDv ? "'MV Roanu', sans-serif" : "'Poppins', sans-serif";

    $categoryColors = [
        'Vision'        => '#21b5a3',
        'People'        => '#6366f1',
        'Tourism'       => '#f59e0b',
        'Connectivity'  => '#3b82f6',
        'Heritage'      => '#ec4899',
        'Culture'       => '#10b981',
        'Infrastructure'=> '#8b5cf6',
        'Education'     => '#f43f5e',
        'Economy'       => '#eab308',
        'ވިޝަން'         => '#21b5a3',
        'މީހުން'         => '#6366f1',
        'ޓޫރިޒަމް'       => '#f59e0b',
        'ގުޅުން'         => '#3b82f6',
        'ތަރިކަ'         => '#ec4899',
        'ސަޤާފަތް'       => '#10b981',
    ];

    $categoryLabel = $isDv ? ($blog->category_dv ?? $blog->category) : $blog->category;
    $categoryColor = $categoryColors[$categoryLabel] ?? '#21b5a3';
@endphp

<!DOCTYPE html>
<html lang="{{ $language === 'dv' ? 'dv' : 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $isDv ? ($blog->title_dv ?? $blog->title) : $blog->title }} – {{ $isDv ? 'ބޮޑު އައްޑޫ' : 'The Greater Addu' }}
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { margin: 0; }
    </style>
</head>
<body class="antialiased min-h-screen bg-gray-50">
    {{-- Navbar --}}
    @include('sections.greater-addu-navbar', ['isDv' => $isDv, 'fontHeading' => $fontHeading, 'fontBody' => $fontBody])

    <main class="w-full">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            {{-- Category tag --}}
            <div class="mb-4">
                <span
                    class="inline-block text-xs px-3 py-1.5 rounded-full text-white"
                    style="background-color:{{ $categoryColor }};font-family:{{ $fontBody }}"
                >
                    {{ $categoryLabel }}
                </span>
            </div>

            {{-- Title --}}
            <h1
                class="text-3xl sm:text-4xl lg:text-5xl mb-8"
                style="color:#045b52;font-family:{{ $fontHeading }}"
            >
                {{ $isDv ? $blog['title_dv'] : $blog['title_en'] }}
            </h1>

            {{-- Featured image --}}
            <div class="relative w-full h-64 sm:h-80 lg:h-96 rounded-2xl overflow-hidden mb-12">
                <img
                    src="{{ $blog->image_url }}"
                    alt="{{ $isDv ? ($blog->title_dv ?? $blog->title) : $blog->title }}"
                    class="w-full h-full object-cover"
                >
            </div>

            {{-- Content --}}
            <div class="space-y-6">
                @php
                    $intro = $isDv ? ($blog->intro_dv ?? $blog->intro) : $blog->intro;
                    $conclusion = $isDv ? ($blog->conclusion_dv ?? $blog->conclusion) : $blog->conclusion;
                    $contentBlocks = $blog->content;
                @endphp

                @if ($intro)
                    <p
                        class="text-base leading-relaxed text-gray-700"
                        style="font-family:{{ $fontBody }}"
                    >
                        {{ $intro }}
                    </p>
                @endif

                @foreach ($contentBlocks as $block)
                    @if (($block['type'] ?? null) === 'h2' && !empty($block['text']))
                        <h2
                            class="text-xl sm:text-2xl mt-8"
                            style="color:#045b52;font-family:{{ $fontHeading }}"
                        >
                            {{ $block['text'] }}
                        </h2>
                    @elseif (($block['type'] ?? null) === 'p' && !empty($block['text']))
                        <p
                            class="text-base leading-relaxed text-gray-700"
                            style="font-family:{{ $fontBody }}"
                        >
                            {{ $block['text'] }}
                        </p>
                    @elseif (($block['type'] ?? null) === 'blockquote' && !empty($block['text']))
                        <blockquote
                            class="border-l-4 pl-4 italic text-gray-600"
                            style="font-family:{{ $fontBody }}"
                        >
                            {{ $block['text'] }}
                        </blockquote>
                    @elseif (($block['type'] ?? null) === 'image' && !empty($block['src']))
                        <div class="my-6 rounded-2xl overflow-hidden">
                            <img
                                src="{{ \App\Models\BlogPost::resolveImageUrl($block['src']) }}"
                                alt=""
                                class="w-full h-auto object-cover"
                            >
                        </div>
                    @endif
                @endforeach

                @if ($conclusion)
                    <p
                        class="text-base leading-relaxed text-gray-700 mt-6"
                        style="font-family:{{ $fontBody }}"
                    >
                        {{ $conclusion }}
                    </p>
                @endif
            </div>

            {{-- Share section --}}
            @php
                $shareUrl   = request()->fullUrl();
                $shareTitle = $isDv ? ($blog->title_dv ?? $blog->title) : $blog->title;
                $encodedUrl = urlencode($shareUrl);
                $encodedTitle = urlencode($shareTitle);
            @endphp

            <div class="mt-16 pt-8 border-t border-gray-200">
                <h3
                    class="text-lg mb-6"
                    style="color:#045b52;font-family:{{ $fontHeading }}"
                >
                    {{ $isDv ? 'ހިއްސާ ކުރައްވާ' : 'Share this article' }}
                </h3>
                <div class="flex flex-wrap gap-3">
                    <a
                        href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full transition-all duration-300 hover:scale-105"
                        style="background-color:#1877f2;color:white;font-family:{{ $fontBody }}"
                    >
                        <span class="text-sm">Facebook</span>
                    </a>

                    <a
                        href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}&text={{ $encodedTitle }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full transition-all duration-300 hover:scale-105"
                        style="background-color:#1da1f2;color:white;font-family:{{ $fontBody }}"
                    >
                        <span class="text-sm">Twitter</span>
                    </a>

                    <a
                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ $encodedUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full transition-all duration-300 hover:scale-105"
                        style="background-color:#0a66c2;color:white;font-family:{{ $fontBody }}"
                    >
                        <span class="text-sm">LinkedIn</span>
                    </a>

                    <a
                        href="mailto:?subject={{ $encodedTitle }}&body={{ $encodedUrl }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full transition-all duration-300 hover:scale-105"
                        style="background-color:#ea4335;color:white;font-family:{{ $fontBody }}"
                    >
                        <span class="text-sm">{{ $isDv ? 'އީމެއިލް' : 'Email' }}</span>
                    </a>

                    <button
                        type="button"
                        onclick="navigator.clipboard && navigator.clipboard.writeText('{{ $shareUrl }}')"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full transition-all duration-300 hover:scale-105"
                        style="background-color:#21b5a3;color:white;font-family:{{ $fontBody }}"
                    >
                        <span class="text-sm">{{ $isDv ? 'ލިންކް ކޮޕީ' : 'Copy Link' }}</span>
                    </button>
                </div>
            </div>

            {{-- Back link --}}
            <div class="mt-12">
                <a
                    href="{{ route('home', ['lang' => $isDv ? 'dv' : 'en']) }}#blogs"
                    class="inline-flex items-center gap-2 text-sm"
                    style="color:#21b5a3;font-family:{{ $fontBody }}"
                >
                    {{ $isDv ? 'ލިއުންތަކަށް އައުން ދަނީ' : 'Back to blogs' }}
                    <span>→</span>
                </a>
            </div>
        </div>
    </main>
</body>
</html>

