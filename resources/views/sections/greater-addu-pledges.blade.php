@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */

    $pledges = [
        [
            'id' => 1,
            'icon' => 'book',
            'title_en' => 'Preserve Identity, Build Knowledge',
            'title_dv' => 'ތަރިކަ ދަމަހައްޓައި، ދިރާސާ ކުރިއެރުވުން',
            'text_en' => "Preserve Addu's identity while building a center for research and knowledge.",
            'text_dv' => 'އައްޑޫގެ ތަރިކަ ދެމެހެއްޓުމާ އެކު، ދިރާސާ ސެންޓަރެއް ބިނާ ކުރުން.',
        ],
        [
            'id' => 2,
            'icon' => 'compass',
            'title_en' => 'A City Worth Exploring',
            'title_dv' => 'ހޯދާ ބެލެވޭ ސިޓީއެއް',
            'text_en' => 'Make Addu a city visitors explore, not just stay in.',
            'text_dv' => 'ހަމައެކަނި ތިބޭ ތަނަކަށް ނޫން، ހޯދާ ބެލެވޭ ތަނަކަށް ހެދުން.',
        ],
        [
            'id' => 3,
            'icon' => 'briefcase',
            'title_en' => 'Professional Tourism Careers',
            'title_dv' => 'ޓޫރިޒަމް ދާއިރާ ތަރައްޤީ ކުރުން',
            'text_en' => 'Bring professional tourism jobs to Addu.',
            'text_dv' => 'ޕްރޮފެޝަނަލް ޓޫރިޒަމް ވަޒީފާތައް އައްޑޫ ސިޓީ އަށް ގެނައުން.',
        ],
        [
            'id' => 4,
            'icon' => 'users',
            'title_en' => 'Reverse Brain Drain',
            'title_dv' => 'ތަޢުލީމީ ފަރާތްތައް ހިދުކޮށްލުން',
            'text_en' => 'Reconnect with Addu people and reverse brain drain.',
            'text_dv' => 'ބޭރަށް ދިޔަ ތަޢުލީމީ ދަރިން ގެ ރައްދުކޮށް، ވިސްނުންތެރިންނާ ގުޅި ހިދުކޮށްލުން.',
        ],
        [
            'id' => 5,
            'icon' => 'bulb',
            'title_en' => 'Open City, Open Minds',
            'title_dv' => 'ހުޅުވާލެވިފައިވާ ސިޓީ',
            'text_en' => 'Open the city to ideas, investors, and youth.',
            'text_dv' => 'ޚިޔާލުތަކާއި، ކެހިތެރި ފަރާތްތަކާއި، ޒުވާނުންނަށް ސިޓީ ހުޅުވައިދިނުން.',
        ],
        [
            'id' => 6,
            'icon' => 'plane',
            'title_en' => 'Indian Ocean Corridor',
            'title_dv' => 'އިންޑިއަން އޯޝަން ކޮރިޑޯ',
            'text_en' => 'Prepare Addu for a future role in an Indian Ocean air and trade corridor.',
            'text_dv' => 'ވައިގެ ދަތުރާ ވިޔަފާރީ ދާއިރާގައި ދުނިޔޭގެ ސަމާލުކަން ހޯދޭ ސިޓީ އަކަށް ތައްޔާރުުކުރުން.',
        ],
    ];
@endphp

<section class="w-full py-24 relative overflow-hidden" style="background-color:#045b52">
    <div
        class="absolute -top-40 -right-40 w-[520px] h-[520px] rounded-full opacity-10 pointer-events-none"
        style="border:80px solid #21b5a3"
    ></div>
    <div
        class="absolute -bottom-32 -left-32 w-[400px] h-[400px] rounded-full opacity-10 pointer-events-none"
        style="border:60px solid #21b5a3"
    ></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 space-y-4">
            <p
                class="text-sm uppercase tracking-[0.25em]"
                style="color:#21b5a3;font-family:{{ $fontBody }}"
            >
                {{ $isDv ? 'ވަޢުދު' : 'Our Commitment' }}
            </p>
            <h2
                class="text-4xl sm:text-5xl text-white"
                style="font-family:{{ $fontHeading }}"
            >
                {{ $isDv ? 'މުހިންމު ވަޢުދުތައް' : 'Key Pledges' }}
            </h2>
            <div class="flex justify-center pt-2">
                <div
                    class="h-1 w-16 rounded-full"
                    style="background:linear-gradient(90deg,#21b5a3,transparent)"
                ></div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($pledges as $index => $pledge)
                <div
                    class="relative rounded-2xl p-7 flex flex-col gap-4 transition-all duration-300 hover:-translate-y-1"
                    style="background-color:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);backdrop-filter:blur(4px)"
                >
                    <div class="flex items-center justify-between">
                        <div
                            class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                            style="background-color:rgba(33,181,163,0.2);color:#21b5a3"
                        >
                            @switch($pledge['icon'])
                                @case('compass')
                                    <span class="text-lg">🧭</span>
                                    @break
                                @case('briefcase')
                                    <span class="text-lg">💼</span>
                                    @break
                                @case('users')
                                    <span class="text-lg">👥</span>
                                    @break
                                @case('bulb')
                                    <span class="text-lg">💡</span>
                                    @break
                                @case('plane')
                                    <span class="text-lg">✈️</span>
                                    @break
                                @default
                                    <span class="text-lg">📖</span>
                            @endswitch
                        </div>
                        <span
                            class="text-5xl select-none"
                            style="color:rgba(255,255,255,0.08);font-family:'Playfair Display',serif;line-height:1"
                        >
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>

                    <h3
                        class="text-white text-lg leading-snug"
                        style="font-family:{{ $fontHeading }}"
                    >
                        {{ $isDv ? $pledge['title_dv'] : $pledge['title_en'] }}
                    </h3>

                    <div
                        class="h-px w-10 rounded-full transition-all duration-300"
                        style="background:linear-gradient(90deg,#21b5a3,transparent)"
                    ></div>

                    <p
                        class="text-sm leading-relaxed"
                        style="color:rgba(255,255,255,0.65);font-family:{{ $fontBody }}"
                    >
                        {{ $isDv ? $pledge['text_dv'] : $pledge['text_en'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

