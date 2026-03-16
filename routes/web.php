<?php

use App\Models\GreaterAdduPerson;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

// Public homepage
Route::get('/', function () {
    $language = request('lang', 'en') === 'dv' ? 'dv' : 'en';
    $people   = GreaterAdduPerson::query()->orderBy('id')->get();

    return view('pages.greater-addu-home', compact('language', 'people'));
})->name('home');

// Individual person profile page
Route::get('/people/{slug}', function (string $slug) {
    $language = request('lang', 'en') === 'dv' ? 'dv' : 'en';
    $person   = GreaterAdduPerson::where('slug', $slug)->first();

    abort_unless($person, 404);

    return view('pages.greater-addu-person', compact('language', 'person'));
})->name('people.show');

// Filament admin panel routes remain registered via Filament's service provider
