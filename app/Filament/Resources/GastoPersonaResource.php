<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GastoPersonaResource\Pages;
use App\Models\GastoPersona;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

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

                Group::make()
                ->relationship('persona')
                ->schema([
                    Fieldset::make('Detalles de la Persona')
                        ->schema([
                            TextInput::make('nombre')->label('Nombre')->required(),
                        ]),
                ]),

                Group::make()
                ->relationship('gasto')
                ->schema([
                    Fieldset::make('Detalles del Gasto')
                        ->schema([
                            TextInput::make('concepto')->label('Concepto')->required(),
                            TextInput::make('cantidad')->label('Cantidad')->numeric()->required(),
                            DatePicker::make('fecha')->label('Fecha')->required(),
                        ]),
                ]),
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
