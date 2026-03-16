<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Blog Posts';

    protected static ?string $modelLabel = 'Blog Post';

    protected static ?string $pluralModelLabel = 'Blog Posts';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $slug = 'blog-posts';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post details (English)')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('author')
                            ->maxLength(255)
                            ->nullable(),
                        DatePicker::make('published_at')
                            ->nullable()
                            ->helperText('Set to show on the public blog; leave empty for draft.'),
                        TextInput::make('read_time')
                            ->label('Read time (English)')
                            ->maxLength(255)
                            ->placeholder('e.g. 5 min read')
                            ->nullable(),
                        FileUpload::make('image')
                            ->label('Hero image')
                            ->image()
                            ->disk('public')
                            ->directory('blog')
                            ->maxSize(2048)
                            ->preserveFilenames()
                            ->nullable()
                            ->columnSpanFull(),
                        Textarea::make('intro')
                            ->label('Intro (English)')
                            ->rows(3)
                            ->nullable()
                            ->columnSpanFull(),
                        Textarea::make('conclusion')
                            ->label('Conclusion (English)')
                            ->rows(3)
                            ->nullable()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Dhivehi content')
                    ->schema([
                        TextInput::make('title_dv')
                            ->label('Title (Dhivehi)')
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        TextInput::make('read_time_dv')
                            ->label('Read time (Dhivehi)')
                            ->maxLength(255)
                            ->placeholder('e.g. 5 ދަޤީޤާ')
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('intro_dv')
                            ->label('Intro (Dhivehi)')
                            ->rows(3)
                            ->nullable()
                            ->columnSpanFull()
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('conclusion_dv')
                            ->label('Conclusion (Dhivehi)')
                            ->rows(3)
                            ->nullable()
                            ->columnSpanFull()
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Article content blocks')
                    ->description('Add headings, paragraphs, images, and blockquotes in order.')
                    ->schema([
                        Repeater::make('content')
                            ->schema([
                                Select::make('type')
                                    ->options([
                                        'h2' => 'Heading 2',
                                        'p' => 'Paragraph',
                                        'image' => 'Image',
                                        'blockquote' => 'Blockquote',
                                    ])
                                    ->required()
                                    ->reactive(),
                                Textarea::make('text')
                                    ->label('Text content')
                                    ->rows(3)
                                    ->visible(fn ($get) => in_array($get('type'), ['h2', 'p', 'blockquote'], true)),
                                FileUpload::make('src')
                                    ->label('Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blog/content')
                                    ->maxSize(2048)
                                    ->preserveFilenames()
                                    ->visible(fn ($get) => $get('type') === 'image'),
                            ])
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category')->sortable(),
                TextColumn::make('author'),
                TextColumn::make('published_at')->date()->sortable()->placeholder('Draft'),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('published')
                    ->query(fn (Builder $q) => $q->whereNotNull('published_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }
}
