@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */
@endphp

<section class="w-full py-24 relative overflow-hidden" style="background-color:#045b52">
    {{-- Background rings --}}
    <div
        class="absolute -top-40 -left-40 w-[520px] h-[520px] rounded-full opacity-10 pointer-events-none"
        style="border:80px solid #21b5a3"
    ></div>
    <div
        class="absolute -bottom-32 -right-32 w-[400px] h-[400px] rounded-full opacity-10 pointer-events-none"
        style="border:60px solid #21b5a3"
    ></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section header --}}
        <div class="text-center mb-16 space-y-4">
            <p
                class="text-sm uppercase tracking-[0.25em]"
                style="color:#21b5a3;font-family:{{ $fontBody }}"
            >
                {{ $isDv ? 'ގުޅުއްވާ' : 'Get In Touch' }}
            </p>
            <h2
                class="text-4xl sm:text-5xl text-white"
                style="font-family:{{ $fontHeading }}"
            >
                {{ $isDv ? 'ގުޅުން ބަދަހިކުރުން' : 'Contact Us' }}
            </h2>
            <div class="flex justify-center pt-2">
                <div
                    class="h-1 w-16 rounded-full"
                    style="background:linear-gradient(90deg,#21b5a3,transparent)"
                ></div>
            </div>
        </div>

        {{-- Two-column layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Left: contact info + socials --}}
            <div class="flex flex-col gap-5">
                @php
                    $contactItems = [
                        [
                            'icon'      => 'mail',
                            'label_en'  => 'Email Us',
                            'label_dv'  => 'އީމެއިލް ކުރައްވާ',
                            'value_en'  => 'hello@thegreateraddu.mv',
                            'value_dv'  => 'hello@thegreateraddu.mv',
                        ],
                        [
                            'icon'      => 'phone',
                            'label_en'  => 'Call Us',
                            'label_dv'  => 'ގުޅުއްވާ',
                            'value_en'  => '+960 689 0000',
                            'value_dv'  => '+960 689 0000',
                        ],
                        [
                            'icon'      => 'map',
                            'label_en'  => 'Find Us',
                            'label_dv'  => 'ތަން',
                            'value_en'  => 'Hithadhoo, Addu City, Maldives',
                            'value_dv'  => 'ހިތަދޫ، އައްޑޫ ސިޓީ، ދިވެހިރާއްޖެ',
                        ],
                    ];
                @endphp

                @foreach ($contactItems as $item)
                    <div
                        class="flex items-center gap-5 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-0.5"
                        style="background-color:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12)"
                    >
                        <div
                            class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0"
                            style="background-color:rgba(33,181,163,0.2);color:#21b5a3"
                        >
                            @switch($item['icon'])
                                @case('phone')
                                    <span class="text-lg">📞</span>
                                    @break
                                @case('map')
                                    <span class="text-lg">📍</span>
                                    @break
                                @default
                                    <span class="text-lg">✉️</span>
                            @endswitch
                        </div>
                        <div>
                            <p
                                class="text-xs uppercase tracking-widest mb-1"
                                style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                            >
                                {{ $isDv ? $item['label_dv'] : $item['label_en'] }}
                            </p>
                            <p
                                class="text-white text-sm"
                                style="font-family:{{ $fontBody }}"
                            >
                                {{ $isDv ? $item['value_dv'] : $item['value_en'] }}
                            </p>
                        </div>
                    </div>
                @endforeach

                {{-- Social links --}}
                <div
                    class="rounded-2xl p-6 flex flex-col gap-4"
                    style="background-color:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12)"
                >
                    <p
                        class="text-xs uppercase tracking-widest"
                        style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                    >
                        {{ $isDv ? 'ސޯޝަލް މީޑިއާ' : 'Follow Us' }}
                    </p>
                    <div class="flex gap-3">
                        @foreach (['F','X','IG'] as $label)
                            <a
                                href="#"
                                class="w-10 h-10 rounded-xl flex items-center justify-center text-xs transition-all duration-200"
                                style="background-color:rgba(33,181,163,0.2);color:#21b5a3;font-family:{{ $fontBody }}"
                            >
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right: contact form --}}
            <div
                class="rounded-2xl p-8"
                style="background-color:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12)"
            >
                <form class="flex flex-col gap-5">
                    <div class="flex flex-col gap-2">
                        <label
                            class="text-xs uppercase tracking-widest"
                            style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? 'ނަން' : 'Your Name' }}
                        </label>
                        <input
                            type="text"
                            class="w-full rounded-xl px-4 py-3 text-sm text-white placeholder-white/30 outline-none focus:ring-2"
                            placeholder="{{ $isDv ? 'ފުރިހަމަ ނަން' : 'Full name' }}"
                            style="background-color:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);font-family:{{ $fontBody }}"
                        >
                    </div>

                    <div class="flex flex-col gap-2">
                        <label
                            class="text-xs uppercase tracking-widest"
                            style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? 'އީމެއިލް' : 'Email Address' }}
                        </label>
                        <input
                            type="email"
                            class="w-full rounded-xl px-4 py-3 text-sm text-white placeholder-white/30 outline-none"
                            placeholder="you@example.com"
                            style="background-color:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);font-family:{{ $fontBody }}"
                        >
                    </div>

                    <div class="flex flex-col gap-2">
                        <label
                            class="text-xs uppercase tracking-widest"
                            style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? 'މެސެޖް' : 'Message' }}
                        </label>
                        <textarea
                            rows="5"
                            class="w-full rounded-xl px-4 py-3 text-sm text-white placeholder-white/30 outline-none resize-none"
                            placeholder="{{ $isDv ? 'ލިޔުއްވާ...' : 'Write your message here...' }}"
                            style="background-color:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);font-family:{{ $fontBody }}"
                        ></textarea>
                    </div>

                    <button
                        type="button"
                        class="w-full flex items-center justify-center gap-2 rounded-xl py-3.5 text-sm text-white"
                        style="background:linear-gradient(135deg,#21b5a3,#045b52);box-shadow:0 4px 20px rgba(33,181,163,0.3);font-family:{{ $fontBody }}"
                    >
                        ✈
                        {{ $isDv ? 'ފޮނުއްވާ' : 'Send Message' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

