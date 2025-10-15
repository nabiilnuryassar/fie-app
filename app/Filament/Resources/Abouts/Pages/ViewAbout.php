<?php

namespace App\Filament\Resources\Abouts\Pages;

use App\Filament\Resources\Abouts\AboutResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAbout extends ViewRecord
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
