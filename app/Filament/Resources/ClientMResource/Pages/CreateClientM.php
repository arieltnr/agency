<?php

namespace App\Filament\Resources\ClientMResource\Pages;

use App\Filament\Resources\ClientMResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class CreateClientM extends CreateRecord
{
    protected static string $resource = ClientMResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Client Registered')
            ->body('The client has been created successfully.');
    }

    public function getTitle(): string
    {
        return "Tambah Client";
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        // Simpan data ClientM terlebih dahulu
        $client = parent::handleRecordCreation($data);

        // Simpan data User setelah ClientM berhasil disimpan
        $user = User::create([
            'name' => $data['client_nama'],  // Menggunakan client_nama sebagai nama user
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'client_id' => $client->id, // set client_id dari client yang baru disimpan
            'type' => 3, // set tipe User sebagai Client
        ]);

        if (!$user) {
            throw new \Exception("Gagal menyimpan data User.");
        }

        return $client;
    }
    
}
