<?php

namespace App\Filament\Resources\Playlists\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PlaylistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('playlists')
                    ->visibility('public')
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Mirror uploaded path to 'thumbnail' column
                        $set('thumbnail', $state);
                    }),
                TextInput::make('thumbnail')
                    ->hidden()
                    ->dehydrated(),
            ]);
    }
}
