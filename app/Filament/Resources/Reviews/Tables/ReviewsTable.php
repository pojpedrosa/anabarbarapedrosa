<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('critic')->searchable()->sortable()->label('Crítico'),
                TextColumn::make('source')->label('Fonte')->searchable()->placeholder('—'),
                TextColumn::make('book.title')->label('Livro')->searchable()->toggleable(),
                IconColumn::make('is_active')->boolean()->label('Activo'),
                TextColumn::make('sort_order')->numeric()->sortable()->label('Ordem'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
