<?php

namespace App\Filament\Resources\PersonaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GastosRelationManager extends RelationManager
{
    protected static string $relationship = 'gastos';
    protected static ?string $recordTitleAttribute = 'concepto';

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('concepto')->required(),
            TextInput::make('cantidad')->numeric()->required(),
            DatePicker::make('fecha')->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('concepto'),
            TextColumn::make('cantidad')->money('EUR'),
            TextColumn::make('fecha')->date(),
        ])->headerActions([
            Tables\Actions\CreateAction::make(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }
}
