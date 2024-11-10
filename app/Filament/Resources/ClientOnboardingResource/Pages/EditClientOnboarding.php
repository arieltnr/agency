<?php

namespace App\Filament\Resources\ClientOnboardingResource\Pages;

use App\Filament\Resources\ClientOnboardingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientOnboarding extends EditRecord
{
    protected static string $resource = ClientOnboardingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
