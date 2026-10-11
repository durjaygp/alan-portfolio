<?php

namespace App\Filament\Resources\Homepage2SettingResource\Pages;

use App\Filament\Resources\Homepage2SettingResource;
use Filament\Resources\Pages\ListRecords;

class ListHomepage2Settings extends ListRecords
{
    protected static string $resource = Homepage2SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
