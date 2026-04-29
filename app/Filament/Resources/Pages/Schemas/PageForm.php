<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('key')->required()->disabled()->dehydrated()->unique(ignoreRecord: true),
                    TextInput::make('title')->required(),
                    RichEditor::make('body')->label('Conteúdo'),
                ]),
            ]);
    }
}
