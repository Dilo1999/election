@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */
    $contact = \App\Models\GreaterAdduContact::current();
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

        {{-- Contact layout --}}
        <div class="flex justify-center">
            {{-- Contact info + socials --}}
            <div class="flex flex-col gap-5 w-full max-w-xl">
                @php
                    $contactItems = $contact
                        ? [
                            [
                                'icon'      => 'mail',
                                'label_en'  => 'Email Us',
                                'label_dv'  => 'އީމެއިލް ކުރައްވާ',
                                'value_en'  => $contact->email_en,
                                'value_dv'  => $contact->email_dv ?? $contact->email_en,
                            ],
                            [
                                'icon'      => 'phone',
                                'label_en'  => 'Call Us',
                                'label_dv'  => 'ގުޅުއްވާ',
                                'value_en'  => $contact->phone_en,
                                'value_dv'  => $contact->phone_dv ?? $contact->phone_en,
                            ],
                            [
                                'icon'      => 'map',
                                'label_en'  => 'Find Us',
                                'label_dv'  => 'ތަން',
                                'value_en'  => $contact->address_en,
                                'value_dv'  => $contact->address_dv,
                            ],
                        ]
                        : [];
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
                    <style>
                        .ga-social {
                            width: 2rem;
                            height: 2rem;
                            border-radius: 0.5rem;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background-color: rgba(255, 255, 255, 0.07);
                            color: rgba(255, 255, 255, 0.45);
                            transition: all 200ms ease;
                        }

                        .ga-social:hover {
                            background-color: rgba(33, 181, 163, 0.2);
                            color: #21b5a3;
                        }

                        .ga-social svg {
                            width: 0.875rem;
                            height: 0.875rem;
                        }
                    </style>
                    <p
                        class="text-xs uppercase tracking-widest"
                        style="color:rgba(255,255,255,0.45);font-family:{{ $fontBody }}"
                    >
                        {{ $isDv ? 'ސޯޝަލް މީޑިއާ' : 'Follow Us' }}
                    </p>
                    @php
                        $socialLinks = [
                            ['type' => 'facebook', 'url' => $contact?->facebook_url],
                            ['type' => 'twitter', 'url' => $contact?->x_url],
                            ['type' => 'instagram', 'url' => $contact?->instagram_url],
                        ];
                    @endphp
                    <div class="flex gap-3">
                        @foreach ($socialLinks as $social)
                            @if ($social['url'])
                                <a
                                    href="{{ $social['url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ga-social"
                                    aria-label="{{ ucfirst($social['type']) }}"
                                >
                                    @switch($social['type'])
                                        @case('facebook')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                            @break
                                        @case('instagram')
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>
                                            @break
                                        @default
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2-5-1.5-5-8 0-9-1.1-1.1-1.8-2.6-2-4 2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                                            </svg>
                                    @endswitch
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

