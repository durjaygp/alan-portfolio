<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Inquiries\InquiryResource;
use App\Models\Inquiry;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiriesWidget extends BaseWidget
{
    protected static ?string $heading = 'Recent Consultation Leads';

    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Recent Consultation Leads')
            ->query(
                Inquiry::query()->latest()
            )
            ->columns([
                TextColumn::make('client_name')
                    ->label('Prospect')
                    ->state(fn (Inquiry $record) => trim("{$record->first_name} {$record->last_name}") ?: 'Anonymous')
                    ->description(fn (Inquiry $record) => $record->email)
                    ->searchable(['first_name', 'last_name', 'email']),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->placeholder('N/A'),

                TextColumn::make('business_type')
                    ->label('Business / Role')
                    ->badge()
                    ->color('info')
                    ->placeholder('General'),

                TextColumn::make('interest')
                    ->label('Primary Interest')
                    ->badge()
                    ->color('primary')
                    ->limit(30),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->state(fn (Inquiry $record) => $record->status ?: 'new')
                    ->colors([
                        'warning' => 'new',
                        'info' => 'contacted',
                        'success' => 'converted',
                        'danger' => 'closed',
                    ]),

                TextColumn::make('created_at')
                    ->label('Received')
                    ->since()
                    ->sortable(),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('View Lead')
                    ->icon('heroicon-m-eye')
                    ->url(fn (Inquiry $record) => InquiryResource::getUrl('edit', ['record' => $record])),
            ])
            ->paginated([5, 10]);
    }
}
