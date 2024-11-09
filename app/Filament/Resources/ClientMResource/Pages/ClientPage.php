<?php

namespace App\Filament\Resources\ClientMResource\Pages;

use App\Filament\Resources\ClientMResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms; // Pastikan Forms diimpor
use Filament\Forms\Components\Wizard; // Impor Wizard
use Filament\Forms\Components\Wizard\Step; // Impor Step


class ClientPage extends CreateRecord
{
    protected static string $resource = ClientMResource::class;

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('OnBoarding')
                        ->schema([
                            // Tambahkan komponen form di sini
                        ]),
                    Step::make('Voice')
                        ->schema([
                            // Tambahkan komponen form di sini
                        ]),
                ]),
            ]);
    }
}
