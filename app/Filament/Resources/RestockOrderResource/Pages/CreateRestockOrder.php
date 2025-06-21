<?php

namespace App\Filament\Resources\RestockOrderResource\Pages;

use App\Filament\Resources\RestockOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRestockOrder extends CreateRecord
{
    protected static string $resource = RestockOrderResource::class;
}
