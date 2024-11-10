<?php

namespace App\Filament\Resources\ClientOnboardingResource\Pages;

use App\Filament\Resources\ClientOnboardingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientOnboardings extends ListRecords
{
    protected static string $resource = ClientOnboardingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
