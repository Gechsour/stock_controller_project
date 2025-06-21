<?php

namespace App\Filament\Resources\RestockOrderItemResource\Pages;

use App\Filament\Resources\RestockOrderItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestockOrderItems extends ListRecords
{
    protected static string $resource = RestockOrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
