<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('type')->label('Tipo')->badge()
                    ->color(fn ($state) => $state === 'article' ? 'info' : 'success')
                    ->formatStateUsing(fn ($state) => $state === 'article' ? 'Artigo' : 'Texto'),
                TextColumn::make('source_name')->label('Publicação')->placeholder('—'),
                TextColumn::make('published_at')->date()->sortable()->label('Data'),
                IconColumn::make('is_active')->boolean()->label('Activo'),
            ])
            ->defaultSort('published_at', 'desc')
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
