<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientMResource\Pages;
use App\Models\ClientM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use stdClass;

class ClientMResource extends Resource
{
    protected static ?string $model = ClientM::class;

    protected static ?string $navigationIcon = 'heroicon-c-users';

    protected static ?string $navigationLabel = 'Client';

    protected static ?string $navigationGroup = 'Client';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('client_nama')
                    ->label('Nama Client')
                    ->required(),
                Forms\Components\TextInput::make('client_toko')
                    ->label('Nama Toko')
                    ->required(),
                Forms\Components\TextInput::make('no_hp')
                    ->label('No. HP')
                    ->required()
                    ->maxLength(15),

                // Tambahkan form field untuk data User
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email(),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->required()
                    ->password()
                    ->revealable(),
                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->revealable()
                    ->required()
                    ->same('password') // Validasi agar sama dengan password
                    ->dehydrated(false), // Tidak menyimpan ke database
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->label('Status Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->state(
                    static function (HasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('client_nama'),
                Tables\Columns\TextColumn::make('client_toko'),
                Tables\Columns\TextColumn::make('no_hp'),
                Tables\Columns\IconColumn::make('status')->boolean()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClientMS::route('/'),
            'create' => Pages\CreateClientM::route('/create'),
            'edit' => Pages\EditClientM::route('/{record}/edit'),
        ];
    }
}
