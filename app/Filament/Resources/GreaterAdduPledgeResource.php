<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GreaterAdduPledgeResource\Pages;
use App\Models\GreaterAdduPledge;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class GreaterAdduPledgeResource extends Resource
{
    protected static ?string $model = GreaterAdduPledge::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationLabel = 'Greater Addu Pledges';

    protected static ?string $modelLabel = 'Pledge';

    protected static ?string $pluralModelLabel = 'Pledges';

    protected static ?string $slug = 'greater-addu-pledges';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('English content')
                    ->schema([
                        TextInput::make('title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('text_en')
                            ->label('Text (English)')
                            ->rows(3),
                    ])
                    ->columns(1),

                Section::make('Dhivehi content')
                    ->schema([
                        TextInput::make('title_dv')
                            ->label('Title (Dhivehi)')
                            ->maxLength(255)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                        Textarea::make('text_dv')
                            ->label('Text (Dhivehi)')
                            ->rows(3)
                            ->extraAttributes(['dir' => 'rtl', 'class' => 'text-right']),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('position')
                    ->sortable(),
                TextColumn::make('title_en')
                    ->label('Title (EN)')
                    ->limit(40),
                TextColumn::make('title_dv')
                    ->label('Title (DV)')
                    ->limit(40),
            ])
            ->defaultSort('position')
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
            'index' => Pages\ListGreaterAdduPledges::route('/'),
            'create' => Pages\CreateGreaterAdduPledge::route('/create'),
            'edit' => Pages\EditGreaterAdduPledge::route('/{record}/edit'),
        ];
    }
}

