<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\ClientM;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\ValidationException;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use stdClass;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                ->options([
                    1 => 'Admin',
                    3 => 'Client',
                ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('client_id', null)),
                    Forms\Components\Select::make('client_id')
                    ->relationship('client', 'client_nama', function ($query) {
                        return $query->where('status', true);
                    })
                    ->label('Nama Client')
                    ->required()
                    ->visible(fn ($get) => $get('type') == 3) // Tampilkan jika type adalah Client
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('name', $state ? ClientM::find($state)->client_nama : null)),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password()
                    ->revealable(),
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
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('type')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            1 => 'Admin',
                            3 => 'Client',
                            default => $state,
                        };
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    protected function beforeCreate(array $data): array
    {
        if ($data['password'] !== $data['password_confirmation']) {
            throw ValidationException::withMessages([
                'password_confirmation' => 'Password dan Konfirmasi Password tidak sama.',
            ]);
        }

        // Hash password jika valid
        $data['password'] = bcrypt($data['password']);
        
        // Hapus konfirmasi password dari data sebelum disimpan
        unset($data['password_confirmation']);
        
        return $data;
    }
}
