@php
    $brandLogos = [
        '1.webp', '2.webp', '3.webp', '4.webp', '5.webp',
        '6.webp', '7.webp', '8.webp', '9.webp', '10.webp',
        '11.webp', '12.webp', '13.webp', '14.webp', '15.webp',
        '16.jpg',
    ];
    $brands = array_map(fn($file) => [
        'name' => 'Partner',
        'logo' => asset('images/brand/' . $file),
    ], $brandLogos);
    // Duplicate multiple times so the strip can scroll and every logo appears
    $duplicatedBrands = array_merge($brands, $brands, $brands);
@endphp
<section class="py-10 md:py-16 overflow-hidden bg-white">
    <div class="relative">
        {{-- Gradient Overlays for Fade Effect --}}
        <div class="absolute inset-y-0 left-0 w-20 md:w-40 z-10 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
        <div class="absolute inset-y-0 right-0 w-20 md:w-40 z-10 bg-gradient-to-l from-white via-white/80 to-transparent"></div>

        <div class="trust-band-marquee flex items-center gap-6 md:gap-10 whitespace-nowrap">
            @foreach($duplicatedBrands as $brand)
                <div class="group flex-shrink-0 w-[160px] md:w-[240px] aspect-square flex items-center justify-center bg-[#f7f4eb]/40 border border-[#6d5a2c]/5 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:bg-white p-6 md:p-8">
                    <img src="{{ $brand['logo'] }}" alt="{{ $brand['name'] }}" class="max-w-full max-h-full object-contain contrast-125 transition-transform duration-500 group-hover:scale-110 scale-[1.35]">
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    @keyframes trust-band-marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    .trust-band-marquee {
        animation: trust-band-marquee 40s linear infinite;
        will-change: transform;
    }

    @media (max-width: 768px) {
        .trust-band-marquee {
            animation-duration: 25s;
        }
    }
</style>
