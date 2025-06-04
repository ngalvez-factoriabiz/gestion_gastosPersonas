<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GastoResource\Pages;
use App\Models\Gasto;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GastoResource extends Resource
{
    protected static ?string $model = Gasto::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('concepto')->required(),
                TextInput::make('cantidad')->numeric()->required(),
                DatePicker::make('fecha')->required(),
                CheckboxList::make('personas')
                    ->relationship('personas', 'nombre')
                    ->columns(2),
                
                Select::make('personas')
                    ->relationship('personas', 'nombre')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Personas'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('concepto'),
                TextColumn::make('cantidad')->money('EUR'),
                TextColumn::make('fecha')->date(),
                TextColumn::make('personas.nombre')
                    ->label('Personas')
                    ->badge()
                    ->separator(', '),
            ])
            ->filters([])
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
            'index' => Pages\ListGastos::route('/'),
            'create' => Pages\CreateGasto::route('/create'),
            'edit' => Pages\EditGasto::route('/{record}/edit'),
        ];
    }
}
