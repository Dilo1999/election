<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSeoResource\Pages;
use App\Models\PageSeo;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class PageSeoResource extends Resource
{
    protected static ?string $model = PageSeo::class;

    protected static ?string $navigationIcon = 'heroicon-o-search-circle';

    protected static ?string $navigationLabel = 'Page SEO';

    protected static ?string $modelLabel = 'Page SEO';

    protected static ?string $pluralModelLabel = 'Page SEO';

    protected static ?string $recordTitleAttribute = 'page_label';

    protected static ?string $slug = 'page-seo';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Page identification')
                    ->description('This page\'s SEO settings. Changes affect how search engines and social media display this page.')
                    ->schema([
                        TextInput::make('page_label')
                            ->label('Page')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Privacy Policy')
                            ->helperText('Display name for this page in the admin.')
                            ->disabledOn('edit'),
                        TextInput::make('route_name')
                            ->label('Route name')
                            ->required()
                            ->maxLength(64)
                            ->placeholder('e.g. privacy-policy')
                            ->helperText('Must match the route name in web.php. Use lowercase with hyphens.')
                            ->disabledOn('edit')
                            ->unique(\App\Models\PageSeo::class, 'route_name', ignoreRecord: true),
                    ])
                    ->columns(2)
                    ->collapsed(false),

                Forms\Components\Section::make('Meta tags (Search engines)')
                    ->description('Primary SEO fields. Title shows in search results; description appears below the title.')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta title')
                            ->maxLength(70)
                            ->placeholder('e.g. About Us – Al Zaha General Trading')
                            ->helperText('Recommended: 50–60 characters. Appears in Google search results.'),
                        Textarea::make('meta_description')
                            ->label('Meta description')
                            ->rows(3)
                            ->maxLength(160)
                            ->placeholder('Brief summary of the page content...')
                            ->helperText('Recommended: 150–160 characters. Summarize the page for searchers.'),
                        TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->placeholder('Leave empty to use the page URL automatically')
                            ->helperText('Override the canonical URL if needed. Usually leave empty.'),
                        TextInput::make('robots')
                            ->label('Robots directive')
                            ->placeholder('e.g. index, follow or noindex, nofollow')
                            ->helperText('Control indexing. Leave empty for default (index, follow).'),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Open Graph (Facebook, LinkedIn, etc.)')
                    ->description('How the page appears when shared on social networks.')
                    ->schema([
                        TextInput::make('og_title')
                            ->label('OG title')
                            ->maxLength(95)
                            ->helperText('Title when shared. Defaults to meta title if empty.'),
                        Textarea::make('og_description')
                            ->label('OG description')
                            ->rows(2)
                            ->helperText('Description when shared. Defaults to meta description if empty.'),
                        FileUpload::make('og_image')
                            ->label('OG image')
                            ->image()
                            ->disk('public')
                            ->directory('seo')
                            ->maxSize(1024)
                            ->helperText('Recommended: 1200×630 px. Shown when the page is shared.'),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Twitter Card')
                    ->description('How the page appears when shared on Twitter/X.')
                    ->schema([
                        TextInput::make('twitter_title')
                            ->label('Twitter title')
                            ->maxLength(70)
                            ->helperText('Defaults to OG title if empty.'),
                        Textarea::make('twitter_description')
                            ->label('Twitter description')
                            ->rows(2)
                            ->helperText('Defaults to OG description if empty.'),
                        FileUpload::make('twitter_image')
                            ->label('Twitter image')
                            ->image()
                            ->disk('public')
                            ->directory('seo')
                            ->maxSize(1024)
                            ->helperText('Optional. Falls back to OG image if empty.'),
                    ])
                    ->columns(1)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_label')
                    ->label('Page')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('meta_title')
                    ->label('Meta title')
                    ->limit(50)
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('meta_description')
                    ->label('Meta description')
                    ->limit(40)
                    ->placeholder('—'),
                TextColumn::make('updated_at')
                    ->label('Last updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('page_label')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSeos::route('/'),
            'create' => Pages\CreatePageSeo::route('/create'),
            'edit' => Pages\EditPageSeo::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
