<?php

namespace App\Filament\Resources\OpenWhenBoxes;

use App\Filament\Resources\OpenWhenBoxes\Pages\CreateOpenWhenBox;
use App\Filament\Resources\OpenWhenBoxes\Pages\EditOpenWhenBox;
use App\Filament\Resources\OpenWhenBoxes\Pages\ListOpenWhenBoxes;
use App\Filament\Resources\OpenWhenBoxes\Pages\ViewOpenWhenBox;
use App\Filament\Resources\OpenWhenBoxes\Schemas\OpenWhenBoxForm;
use App\Filament\Resources\OpenWhenBoxes\Schemas\OpenWhenBoxInfolist;
use App\Filament\Resources\OpenWhenBoxes\Tables\OpenWhenBoxesTable;
use App\Models\OpenWhenBox;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OpenWhenBoxResource extends Resource
{
    protected static ?string $model = OpenWhenBox::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OpenWhenBoxForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OpenWhenBoxInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OpenWhenBoxesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOpenWhenBoxes::route('/'),
            'create' => CreateOpenWhenBox::route('/create'),
            'view' => ViewOpenWhenBox::route('/{record}'),
            'edit' => EditOpenWhenBox::route('/{record}/edit'),
        ];
    }
}
