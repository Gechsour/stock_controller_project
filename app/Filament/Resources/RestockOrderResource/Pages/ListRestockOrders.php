<?php

namespace App\Filament\Resources\RestockOrderResource\Pages;

use App\Filament\Resources\RestockOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestockOrders extends ListRecords
{
    protected static string $resource = RestockOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
