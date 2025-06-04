<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GastoPersonaResource\Pages;
use App\Models\GastoPersona;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GastoPersonaResource extends Resource
{
    protected static ?string $model = GastoPersona::class;

    protected static ?string $navigationLabel = 'Gastos de Personas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('persona_id')
                    ->relationship('persona', 'nombre')
                    ->required(),
                Select::make('gasto_id')
                    ->relationship('gasto', 'concepto')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('persona.nombre')->label('Persona'),
                TextColumn::make('gasto.concepto')->label('Gasto'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGastoPersonas::route('/'),
            'create' => Pages\CreateGastoPersona::route('/create'),
            'edit' => Pages\EditGastoPersona::route('/{record}/edit'),
        ];
    }
}
