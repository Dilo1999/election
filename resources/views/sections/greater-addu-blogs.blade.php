@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */

    $blogs = \App\Models\BlogPost::published()
        ->orderBy('published_at', 'desc')
        ->orderBy('id', 'desc')
        ->take(6)
        ->get();

    if ($blogs->isEmpty()) {
        return;
    }

    $featuredBlog = $blogs->first();
    $restBlogs    = $blogs->slice(1);

    $categoryColors = [
        'Vision'      => '#21b5a3',
        'People'      => '#6366f1',
        'Tourism'     => '#f59e0b',
        'Connectivity'=> '#3b82f6',
        'Heritage'    => '#ec4899',
        'Culture'     => '#10b981',
        'ވިޝަން'       => '#21b5a3',
        'މީހުން'       => '#6366f1',
        'ޓޫރިޒަމް'     => '#f59e0b',
        'ގުޅުން'       => '#3b82f6',
        'ތަރިކަ'       => '#ec4899',
        'ސަޤާފަތް'     => '#10b981',
    ];
@endphp

<section class="w-full py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section header --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14">
            <div class="space-y-3">
                <p
                    class="text-sm uppercase tracking-[0.25em]"
                    style="color:#21b5a3;font-family:{{ $fontBody }}"
                >
                    {{ $isDv ? 'ލިއުންތައް' : 'From The Blog' }}
                </p>
                <h2
                    class="text-4xl sm:text-5xl"
                    style="color:#045b52;font-family:{{ $fontHeading }}"
                >
                    {{ $isDv ? 'ލިއުންތައް' : 'Blogs' }}
                </h2>
            </div>
            <a
                href="#blogs"
                class="group inline-flex items-center gap-2 text-sm transition-colors self-start sm:self-auto pb-1"
                style="color:#21b5a3;font-family:{{ $fontBody }};border-bottom:1px solid #21b5a3"
            >
                {{ $isDv ? 'ހުރިހާ ލިއުންތައް' : 'View all posts' }}
                <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
            </a>
        </div>

        {{-- Featured post --}}
        <a
            id="blogs"
            href="{{ route('blogs.show', ['slug' => $featuredBlog->slug, 'lang' => $isDv ? 'dv' : 'en']) }}"
            class="group block relative rounded-3xl overflow-hidden bg-white shadow-lg border border-gray-100 mb-8 cursor-pointer hover:shadow-xl transition-shadow duration-300"
        >
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative h-72 lg:h-auto overflow-hidden">
                    <img
                        src="{{ $featuredBlog->image_url }}"
                        alt="{{ $isDv ? ($featuredBlog->title_dv ?? $featuredBlog->title) : $featuredBlog->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
                </div>

                <div class="flex flex-col justify-center p-8 lg:p-12">
                    <div class="flex items-center gap-4 mb-5">
                        @php
                            $catLabelF = $isDv ? ($featuredBlog->category_dv ?? $featuredBlog->category) : $featuredBlog->category;
                            $catColorF = $categoryColors[$catLabelF] ?? '#21b5a3';
                        @endphp
                        <span
                            class="inline-flex items-center gap-1.5 text-xs px-3 py-1 rounded-full text-white"
                            style="background-color:{{ $catColorF }};font-family:{{ $fontBody }}"
                        >
                            {{ $catLabelF }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 text-xs text-gray-400"
                            style="font-family:{{ $fontBody }}"
                        >
                            ⏱
                            {{ $isDv ? ($featuredBlog->read_time_dv ?? $featuredBlog->read_time) : $featuredBlog->read_time }}
                        </span>
                    </div>

                    <h3
                        class="text-2xl sm:text-3xl mb-4 leading-snug"
                        style="color:#045b52;font-family:{{ $fontHeading }}"
                    >
                        {{ $isDv ? ($featuredBlog->title_dv ?? $featuredBlog->title) : $featuredBlog->title }}
                    </h3>

                    <p
                        class="text-sm leading-relaxed text-gray-500 mb-8"
                        style="font-family:{{ $fontBody }}"
                    >
                        {{ $isDv ? ($featuredBlog->intro_dv ?? $featuredBlog->intro) : $featuredBlog->intro }}
                    </p>

                    <button
                        class="group/btn inline-flex items-center gap-2 text-sm font-medium transition-colors self-start"
                        style="color:#21b5a3;font-family:{{ $fontBody }}"
                    >
                        {{ $isDv ? 'ތަފްސީލު ބަލާ' : 'Read more' }}
                        <span class="inline-block transition-transform group-hover/btn:translate-x-1">→</span>
                    </button>
                </div>
            </div>
        </a>

        {{-- Remaining posts grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach ($restBlogs as $blog)
                @php
                    $catLabel = $isDv ? ($blog->category_dv ?? $blog->category) : $blog->category;
                    $catColor = $categoryColors[$catLabel] ?? '#21b5a3';
                @endphp
                <a
                    href="{{ route('blogs.show', ['slug' => $blog->slug, 'lang' => $isDv ? 'dv' : 'en']) }}"
                    class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 flex flex-col cursor-pointer hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                >
                    <div class="relative h-44 overflow-hidden">
                        <img
                            src="{{ $blog->image_url }}"
                            alt="{{ $isDv ? ($blog->title_dv ?? $blog->title) : $blog->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <span
                            class="absolute bottom-3 left-3 text-xs px-2.5 py-1 rounded-full text-white"
                            style="background-color:{{ $catColor }};font-family:{{ $fontBody }}"
                        >
                            {{ $catLabel }}
                        </span>
                    </div>

                    <div class="flex flex-col flex-1 p-5 gap-3">
                        <span
                            class="inline-flex items-center gap-1.5 text-xs text-gray-400"
                            style="font-family:{{ $fontBody }}"
                        >
                            <span aria-hidden="true">⏱</span>
                            {{ $isDv ? ($blog->read_time_dv ?? $blog->read_time) : $blog->read_time }}
                        </span>

                        <h4
                            class="text-base leading-snug"
                            style="color:#045b52;font-family:{{ $fontHeading }}"
                        >
                            {{ $isDv ? ($blog->title_dv ?? $blog->title) : $blog->title }}
                        </h4>

                        <p
                            class="text-xs leading-relaxed text-gray-400 flex-1 line-clamp-3"
                            style="font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? ($blog->intro_dv ?? $blog->intro) : $blog->intro }}
                        </p>

                        <span
                            class="group/btn inline-flex items-center gap-1.5 text-xs mt-1 transition-colors self-start"
                            style="color:#21b5a3;font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? 'ތަފްސީލު' : 'Read more' }}
                            <span class="inline-block transition-transform group-hover/btn:translate-x-0.5">→</span>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

