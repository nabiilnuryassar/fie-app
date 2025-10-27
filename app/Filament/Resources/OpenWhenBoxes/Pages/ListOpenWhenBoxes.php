<?php

namespace App\Filament\Resources\OpenWhenBoxes\Pages;

use App\Filament\Resources\OpenWhenBoxes\OpenWhenBoxResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOpenWhenBoxes extends ListRecords
{
    protected static string $resource = OpenWhenBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
