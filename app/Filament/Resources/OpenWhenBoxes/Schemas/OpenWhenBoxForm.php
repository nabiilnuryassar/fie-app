<?php

namespace App\Filament\Resources\OpenWhenBoxes\Schemas;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class OpenWhenBoxForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state !== null) {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->readOnly(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('content')
                    ->label('Short Content')
                    ->helperText('A short one-line summary or headline (max 255 chars).')
                    ->maxLength(255)
                    ->nullable(),
                FileUpload::make('content_file')
                    ->label('Content Files')
                    ->disk('public')
                    ->directory('open-when-boxes')
                    ->multiple()
                    ->maxFiles(10)
                    ->required(false),
            ]);
    }
}
