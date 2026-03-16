<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GreaterAdduHeroResource\Pages;
use App\Models\GreaterAdduHero;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class GreaterAdduHeroResource extends Resource
{
    protected static ?string $model = GreaterAdduHero::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Greater Addu Hero';

    protected static ?string $modelLabel = 'Hero Content';

    protected static ?string $pluralModelLabel = 'Hero Content';

    protected static ?string $slug = 'greater-addu-hero';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('English content')
                    ->schema([
                        TextInput::make('hashtag_en')
                            ->label('Hashtag')
                            ->placeholder('#THEGREATERADDU')
                            ->maxLength(64),
                        TextInput::make('header_en')
                            ->label('Main heading')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('sub_en')
                            ->label('Sub heading')
                            ->maxLength(255),
                        TextInput::make('intro_en')
                            ->label('Intro line')
                            ->maxLength(255),
                        Textarea::make('history_en')
                            ->label('History paragraph')
                            ->rows(3),
                        Textarea::make('challenge_en')
                            ->label('Challenge paragraph')
                            ->rows(3),
                        TextInput::make('question_en')
                            ->label('Question heading')
                            ->maxLength(255),
                        Textarea::make('vision_en')
                            ->label('Vision paragraph')
                            ->rows(4),
                    ])
                    ->columns(2),

                Section::make('Dhivehi content')
                    ->schema([
                        TextInput::make('hashtag_dv')
                            ->label('Hashtag (Dhivehi)')
                            ->maxLength(64)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        TextInput::make('header_dv')
                            ->label('Main heading (Dhivehi)')
                            ->maxLength(255)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        TextInput::make('sub_dv')
                            ->label('Sub heading (Dhivehi)')
                            ->maxLength(255)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        TextInput::make('intro_dv')
                            ->label('Intro line (Dhivehi)')
                            ->maxLength(255)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('history_dv')
                            ->label('History paragraph (Dhivehi)')
                            ->rows(3)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('challenge_dv')
                            ->label('Challenge paragraph (Dhivehi)')
                            ->rows(3)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        TextInput::make('question_dv')
                            ->label('Question heading (Dhivehi)')
                            ->maxLength(255)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('vision_dv')
                            ->label('Vision paragraph (Dhivehi)')
                            ->rows(4)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('header_en')
                    ->label('Heading (EN)')
                    ->limit(40),
                TextColumn::make('header_dv')
                    ->label('Heading (DV)')
                    ->limit(40),
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
            'index' => Pages\ListGreaterAdduHeroes::route('/'),
            'create' => Pages\CreateGreaterAdduHero::route('/create'),
            'edit' => Pages\EditGreaterAdduHero::route('/{record}/edit'),
        ];
    }
}

