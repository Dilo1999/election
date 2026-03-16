<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GreaterAdduContactResource\Pages;
use App\Models\GreaterAdduContact;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class GreaterAdduContactResource extends Resource
{
    protected static ?string $model = GreaterAdduContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Greater Addu Contact';

    protected static ?string $modelLabel = 'Contact Details';

    protected static ?string $pluralModelLabel = 'Contact Details';

    protected static ?string $slug = 'greater-addu-contact';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('English contact')
                    ->schema([
                        TextInput::make('email_en')
                            ->label('Email (English)')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone_en')
                            ->label('Phone (English)')
                            ->maxLength(64),
                        Textarea::make('address_en')
                            ->label('Address (English)')
                            ->rows(2),
                    ])
                    ->columns(1),

                Section::make('Dhivehi contact')
                    ->schema([
                        TextInput::make('email_dv')
                            ->label('Email (Dhivehi)')
                            ->email()
                            ->maxLength(255)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        TextInput::make('phone_dv')
                            ->label('Phone (Dhivehi)')
                            ->maxLength(64)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('address_dv')
                            ->label('Address (Dhivehi)')
                            ->rows(2)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                    ])
                    ->columns(1),

                Section::make('Social links')
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('x_url')
                            ->label('X (Twitter) URL')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email_en')
                    ->label('Email (EN)')
                    ->limit(40),
                TextColumn::make('phone_en')
                    ->label('Phone (EN)')
                    ->limit(24),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime(),
            ])
            ->defaultSort('id', 'desc')
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
            'index' => Pages\ListGreaterAdduContacts::route('/'),
            'create' => Pages\CreateGreaterAdduContact::route('/create'),
            'edit' => Pages\EditGreaterAdduContact::route('/{record}/edit'),
        ];
    }
}

