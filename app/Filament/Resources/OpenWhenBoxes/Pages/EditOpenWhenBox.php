<?php

namespace App\Filament\Resources\OpenWhenBoxes\Pages;

use App\Filament\Resources\OpenWhenBoxes\OpenWhenBoxResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOpenWhenBox extends EditRecord
{
    protected static string $resource = OpenWhenBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
