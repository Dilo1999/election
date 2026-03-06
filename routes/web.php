<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;
use App\Models\BlogPost;
use App\Services\SeoService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

$seo = app(SeoService::class);

// Serve storage files when symlink doesn't work (e.g. shared hosting / cPanel)
Route::match(['get', 'head'], 'storage/{path}', function () {
    $requestPath = ltrim(request()->path(), '/');
    if (!str_starts_with($requestPath, 'storage/')) {
        abort(404);
    }
    $path = substr($requestPath, 8); // strip 'storage/'
    if (empty($path) || str_contains($path, '..')) {
        abort(404);
    }

    $fullPath = storage_path('app/public/' . $path);
    $realPath = realpath($fullPath);
    $storageRoot = realpath(storage_path('app/public'));

    if (!$realPath || !is_file($realPath)) {
        abort(404);
    }
    if ($storageRoot && !Str::startsWith($realPath, $storageRoot)) {
        abort(404);
    }

    return response()->file($realPath);
})->where('path', '.*')->name('storage.serve');

Route::get('/', function () use ($seo) {
    $seo->applyForPage('home', [
        'meta_title' => 'Premium Sourcing & Supply Chain Solutions',
        'meta_description' => 'Dubai-based sourcing and supply chain solutions. End-to-end logistics, consulting, and procurement for resorts, construction, retail, and industrial sectors.',
        'og_title' => 'Al Zaha General Trading – Premium Sourcing & Supply Chain',
    ]);

    return view('pages.home');
})->name('home');

Route::get('/solutions', function () use ($seo) {
    $seo->applyForPage('solutions', [
        'meta_title' => 'Solutions – Sourcing, Supply Chain & Logistics',
        'meta_description' => 'Explore our supply chain solutions: sourcing, logistics, consulting, and procurement. Structured control for your business.',
    ]);

    return view('pages.solutions.index');
})->name('solutions');

Route::get('/solutions/sourcing', function () use ($seo) {
    $seo->applyForPage('solutions.sourcing', [
        'meta_title' => 'Sourcing – Global Procurement Solutions',
        'meta_description' => 'Premium global sourcing and procurement. Direct manufacturer relationships, quality assurance, and consolidated shipments from Dubai.',
    ]);

    return view('pages.solutions.sourcing');
})->name('solutions.sourcing');

Route::get('/solutions/supply-chain', function () use ($seo) {
    $seo->applyForPage('solutions.supply-chain', [
        'meta_title' => 'Supply Chain – Integrated Logistics',
        'meta_description' => 'Structured supply chain management. End-to-end coordination, documentation, and delivery for complex procurement projects.',
    ]);

    return view('pages.solutions.supply-chain');
})->name('solutions.supply-chain');

Route::get('/solutions/logistics', function () use ($seo) {
    $seo->applyForPage('solutions.logistics', [
        'meta_title' => 'Logistics – Freight & Distribution',
        'meta_description' => 'Freight forwarding and logistics from Dubai. Air, sea, and land freight. Consolidated shipments and last-mile distribution.',
    ]);

    return view('pages.solutions.logistics');
})->name('solutions.logistics');

Route::get('/solutions/consulting', function () use ($seo) {
    $seo->applyForPage('solutions.consulting', [
        'meta_title' => 'Consulting – Supply Chain Advisory',
        'meta_description' => 'Supply chain and procurement consulting. Strategic advisory for sourcing, vendor selection, and process optimization.',
    ]);

    return view('pages.solutions.consulting');
})->name('solutions.consulting');

Route::get('/industries', function () use ($seo) {
    $seo->applyForPage('industries', [
        'meta_title' => 'Industries We Serve',
        'meta_description' => 'Supply chain solutions for resorts, construction, retail, and industrial sectors. Tailored sourcing and logistics for your industry.',
    ]);

    return view('pages.industries');
})->name('industries');

Route::get('/how-it-works', function () use ($seo) {
    $seo->applyForPage('how-it-works', [
        'meta_title' => 'How It Works',
        'meta_description' => 'Discover how Al Zaha delivers premium sourcing and supply chain solutions. From initial consultation to final delivery.',
    ]);

    return view('pages.how-it-works');
})->name('how-it-works');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/quote', [QuoteController::class, 'show'])->name('quote');
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', function () use ($seo) {
    $seo->applyForPage('about', [
        'meta_title' => 'About Al Zaha',
        'meta_description' => 'Built on coordination. Learn how Al Zaha delivers premium sourcing and supply chain solutions from Dubai for global clients.',
    ]);

    return view('pages.about');
})->name('about');
