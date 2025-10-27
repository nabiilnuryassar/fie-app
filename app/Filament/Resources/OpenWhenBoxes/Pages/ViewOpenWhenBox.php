<?php

namespace App\Filament\Resources\OpenWhenBoxes\Pages;

use App\Filament\Resources\OpenWhenBoxes\OpenWhenBoxResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOpenWhenBox extends ViewRecord
{
    protected static string $resource = OpenWhenBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
