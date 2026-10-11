<?php

namespace App\Filament\Resources\Homepage2SettingResource\Pages;

use App\Filament\Resources\Homepage2SettingResource;
use Filament\Resources\Pages\EditRecord;

class EditHomepage2Setting extends EditRecord
{
    protected static string $resource = Homepage2SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}
