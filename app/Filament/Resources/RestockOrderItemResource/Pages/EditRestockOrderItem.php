<?php

namespace App\Filament\Resources\RestockOrderItemResource\Pages;

use App\Filament\Resources\RestockOrderItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestockOrderItem extends EditRecord
{
    protected static string $resource = RestockOrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
