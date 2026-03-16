<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GreaterAdduPersonResource\Pages;
use App\Models\GreaterAdduPerson;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GreaterAdduPersonResource extends Resource
{
    protected static ?string $model = GreaterAdduPerson::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'People';

    protected static ?string $modelLabel = 'Person';

    protected static ?string $pluralModelLabel = 'People';

    protected static ?string $recordTitleAttribute = 'name_en';

    protected static ?string $slug = 'greater-addu-people';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 15;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identity')
                    ->schema([
                        TextInput::make('name_en')
                            ->label('Name (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('name_dv')
                            ->label('Name (Dhivehi)')
                            ->maxLength(255),
                        TextInput::make('gender')
                            ->label('Gender')
                            ->maxLength(10)
                            ->helperText('Optional. Used for default avatar if no photo is uploaded.'),
                        FileUpload::make('photo')
                            ->label('Profile photo')
                            ->image()
                            ->disk('public')
                            ->directory('greater-addu/people')
                            ->maxSize(2048)
                            ->preserveFilenames()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Role')
                    ->schema([
                        TextInput::make('role_en')
                            ->label('Role (English)')
                            ->maxLength(255),
                        TextInput::make('role_dv')
                            ->label('Role (Dhivehi)')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Bio (English)')
                    ->schema([
                        Textarea::make('bio1_en')
                            ->label('Bio paragraph 1')
                            ->rows(3),
                        Textarea::make('bio2_en')
                            ->label('Bio paragraph 2')
                            ->rows(3),
                    ])
                    ->columns(1),

                Section::make('Bio (Dhivehi)')
                    ->schema([
                        Textarea::make('bio1_dv')
                            ->label('Bio paragraph 1')
                            ->rows(3),
                        Textarea::make('bio2_dv')
                            ->label('Bio paragraph 2')
                            ->rows(3),
                    ])
                    ->columns(1),

                Section::make('Social links')
                    ->schema([
                        TextInput::make('social.twitter')
                            ->label('Twitter / X URL')
                            ->url()
                            ->nullable(),
                        TextInput::make('social.facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->nullable(),
                        TextInput::make('social.instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->nullable(),
                        TextInput::make('social.linkedin')
                            ->label('LinkedIn URL')
                            ->url()
                            ->nullable(),
                        TextInput::make('social.website')
                            ->label('Website URL')
                            ->url()
                            ->nullable(),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('')
                    ->disk('public')
                    ->square()
                    ->size(40),
                TextColumn::make('name_en')
                    ->label('Name (EN)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name_dv')
                    ->label('Name (DV)')
                    ->limit(20),
                TextColumn::make('role_en')
                    ->label('Role (EN)')
                    ->limit(30),
                TextColumn::make('role_dv')
                    ->label('Role (DV)')
                    ->limit(30),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable(),
            ])
            ->defaultSort('id')
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
            'index' => Pages\ListGreaterAdduPeople::route('/'),
            'create' => Pages\CreateGreaterAdduPerson::route('/create'),
            'edit' => Pages\EditGreaterAdduPerson::route('/{record}/edit'),
        ];
    }
}

