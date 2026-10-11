<?php

namespace App\Filament\Resources\PageViews\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageViewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page & Route Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('page_title')
                                ->label('Page Title')
                                ->disabled(),

                            TextInput::make('route_name')
                                ->label('Route Name')
                                ->disabled(),

                            TextInput::make('path')
                                ->label('Path')
                                ->disabled(),

                            TextInput::make('url')
                                ->label('Full URL')
                                ->disabled(),
                        ]),
                    ]),

                Section::make('Visitor Device & Environment')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('device_type')
                                ->label('Device Type')
                                ->disabled(),

                            TextInput::make('browser')
                                ->label('Browser')
                                ->disabled(),

                            TextInput::make('platform')
                                ->label('Operating System')
                                ->disabled(),

                            TextInput::make('ip_address')
                                ->label('IP Address')
                                ->disabled(),

                            TextInput::make('session_id')
                                ->label('Session ID')
                                ->disabled(),

                            DateTimePicker::make('viewed_at')
                                ->label('Viewed At')
                                ->disabled(),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('referer_host')
                                ->label('Referrer Domain')
                                ->disabled(),

                            TextInput::make('referer')
                                ->label('Full Referrer URL')
                                ->disabled(),
                        ]),

                        Textarea::make('user_agent')
                            ->label('Raw User Agent')
                            ->rows(3)
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
