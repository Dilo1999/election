@php
    /** @var bool $isDv */
    /** @var string $fontHeading */
    /** @var string $fontBody */
    /** @var \Illuminate\Support\Collection|\App\Models\GreaterAdduPerson[] $people */
@endphp

<section class="w-full py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 space-y-4">
            <h2
                class="text-3xl sm:text-4xl"
                style="color:#045b52;font-family:{{ $fontHeading }}"
            >
                {{ $isDv ? 'ވިޝަންގެ ފަހަތުގައި ތިބި މީހުން' : 'The People Behind The Vision' }}
            </h2>
            <p
                class="text-lg text-gray-500 max-w-2xl mx-auto"
                style="font-family:{{ $fontBody }}"
            >
                {{ $isDv
                    ? 'އައްޑޫގެ މުސްތަގްބަލް ބިނާކުރުމަށް ޚިދުމަތްކުރާ ވިސްނުންތެރިން، ބިނާކުރާ ފަރާތްތައް، އަދި ތާއިދުކުރާ ފަރާތްތަކުގެ ގުޅިލާމެހިފައިވާ ޓީމެއް.'
                    : 'A collective of thinkers, builders, and advocates dedicated to shaping the future of Addu.' }}
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($people as $person)
                <a
                    href="{{ route('people.show', ['slug' => $person->slug, 'lang' => $isDv ? 'dv' : 'en']) }}"
                    class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col"
                >
                    <div class="w-full aspect-square overflow-hidden bg-slate-100">
                        @if ($person->photo)
                            <img
                                src="{{ asset('storage/' . ltrim($person->photo, '/')) }}"
                                alt="{{ $isDv ? ($person->name_dv ?? $person->name_en) : $person->name_en }}"
                                class="w-full h-full object-cover object-top"
                            >
                        @endif
                    </div>

                    <div class="p-4 flex flex-col items-center text-center flex-1">
                        <p
                            class="font-semibold text-base"
                            style="color:#045b52;font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? ($person->name_dv ?? $person->name_en) : $person->name_en }}
                        </p>
                        <p
                            class="text-sm mt-1"
                            style="color:#21b5a3;font-family:{{ $fontBody }}"
                        >
                            {{ $isDv ? ($person->role_dv ?? $person->role_en) : $person->role_en }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

