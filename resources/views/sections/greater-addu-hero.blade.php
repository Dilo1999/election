@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */

    $hero = $isDv ? [
        'header'    => 'ބޮޑު އައްޑޫ',
        'sub'       => 'ރުވުއްސަތަގެ މުރުކުދަ ޢާއިން މާޒަންރަ ގެ ޑޫ',
        'hashtag'   => '#TheGreaterAddu',
        'intro'     => 'އައްޑޫ އަކީ ކޮންމެވެސް އާދައިގެ ތަނެއް ނޫން.',
        'history'   => 'ފުރަތަމަ އާބާދީއާއި، ކަނޑުދަތުރުފަތުރުގެ ރަހުމަތްތެރިކަމާއި، RAF ޒަމާނާއި، ސުވާދީބު ދައުރާ ހަމައަށް، އައްޑޫއަކީ ތާރީޚެއް، ސިފައެއް، އަދި އިތުބާރެއް ގެންގުޅޭ ތަނެކެވެ.',
        'challenge' => 'އެކަމަކު މިއަދު އައްޑޫއަށް ބަލާއިރު، ކުޑަ ސިޓީއަކަށް، ކުޑަ ޕްލޭންތަކަކަށް ބަލާލެވެއެވެ. ދުވަހުން ދުވަހަށް އިދާރީ މަސައްކަތަށް އިސްކަން ދެވެއެވެ. އެހެންނަމަވެސް މުހިންމު ސުވާލަކަށް ވީހާވެސް ރަނގަޅަށް ބަލާފައެއް ނުވެއެވެ:',
        'question'  => 'އައްޑޫ ވާންވީ ކޮން ސިފައެއްގައި؟',
        'vision'    => 'ބޮޑު އައްޑޫގެ ވިޝަނުން އައްޑޫއަށް ބަލާއިރު، އާދައިގެ ވެރިކަން ހިންގުމަށްވުރެ ބޮޑަށް ފެންނަން ހުންނާނެއެވެ. ޓޫރިޒަމް، ޢިލްމު، މަސައްކަތް، ވެރިކަން ހިންގުމުގެ އިންނޮވޭޝަން އަދި ސަރަހައްދީ ގުޅުން ބަދަހިކުރުމުގައި އައްޑޫއަށް ކުޅެވޭނެ ބޮޑު ދައުރެއް ފެނިގެންދާނެއެވެ.',
    ] : [
        'header'    => 'The Greater Addu',
        'sub'       => "A Vision for Addu's Era of Pride",
        'hashtag'   => '#THEGREATERADDU',
        'intro'     => 'Addu has never been an ordinary place.',
        'history'   => "From ancient settlements and seafaring traditions to the RAF era and the Suvadive period, Addu has always carried a history, character, and confidence that set it apart.",
        'challenge' => 'Yet today, Addu is often treated as a small city with small plans. Daily administration takes priority, while the bigger question is rarely asked:',
        'question'  => 'What should Addu become?',
        'vision'    => 'The Greater Addu looks beyond routine governance and sees Addu for what it truly can be — a city with a larger role in tourism, knowledge, employment, governance innovation, and regional connectivity.',
    ];
@endphp

<section
    class="w-full relative overflow-hidden"
    style="background:linear-gradient(160deg,#e8f9f7 0%,#c2ede8 50%,#a8e6dd 100%)"
>
    <div
        class="absolute -top-36 -right-36 w-[560px] h-[560px] rounded-full pointer-events-none"
        style="border:80px solid #21b5a3;opacity:0.12"
    ></div>
    <div
        class="absolute -bottom-40 -left-40 w-[440px] h-[440px] rounded-full pointer-events-none"
        style="border:64px solid #045b52;opacity:0.10"
    ></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-28 pb-28">
        <p
            class="text-center text-xs uppercase tracking-[0.3em] mb-7"
            style="color:#21b5a3;font-family:{{ $fontBody }}"
        >
            {{ $hero['hashtag'] }}
        </p>

        <h1
            class="text-center text-5xl sm:text-6xl lg:text-8xl mb-5"
            style="color:#045b52;font-family:{{ $fontHeading }};line-height:1.08"
        >
            {{ $hero['header'] }}
        </h1>

        <p
            class="text-center text-lg sm:text-xl lg:text-2xl mb-8"
            style="color:#045b52;opacity:.65;font-family:{{ $fontHeading }}"
        >
            {{ $hero['sub'] }}
        </p>

        <div class="flex justify-center mb-16">
            <div
                class="h-px w-20"
                style="background:linear-gradient(90deg,transparent,#21b5a3,transparent)"
            ></div>
        </div>

        <p
            class="text-center text-2xl sm:text-3xl mb-10"
            style="color:#21b5a3;font-family:{{ $fontHeading }}"
        >
            {{ $hero['intro'] }}
        </p>

        <div class="space-y-5 mb-12">
            <p
                class="text-center text-base sm:text-lg leading-relaxed"
                style="color:#045b52;opacity:.75;font-family:{{ $fontBody }}"
            >
                {{ $hero['history'] }}
            </p>
            <p
                class="text-center text-base sm:text-lg leading-relaxed"
                style="color:#045b52;opacity:.75;font-family:{{ $fontBody }}"
            >
                {{ $hero['challenge'] }}
            </p>
        </div>

        <div
            class="rounded-2xl p-8 sm:p-12 text-center"
            style="background-color:rgba(255,255,255,0.55);border:1px solid rgba(4,91,82,0.15);backdrop-filter:blur(8px)"
        >
            <p
                class="text-2xl sm:text-3xl mb-5"
                style="color:#045b52;font-family:{{ $fontHeading }}"
            >
                {{ $hero['question'] }}
            </p>
            <div
                class="h-px w-14 mx-auto mb-6"
                style="background:linear-gradient(90deg,transparent,#21b5a3,transparent)"
            ></div>
            <p
                class="text-base sm:text-lg leading-relaxed"
                style="color:#045b52;opacity:.8;font-family:{{ $fontBody }}"
            >
                {{ $hero['vision'] }}
            </p>
        </div>
    </div>
</section>

