<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontenTResource\Pages;
use App\Models\KontenT;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\ImageEntry;
use Carbon\Carbon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use stdClass;


class KontenTResource extends Resource
{
    protected static ?string $model = KontenT::class;

    protected static ?string $navigationIcon = 'heroicon-s-camera';

    protected static ?string $navigationLabel = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('client_id')
                    ->relationship('client', 'client_nama', function ($query) {
                        return $query->where('status', true);
                    })
                    ->label('Nama Client')
                    ->required(),
                Forms\Components\TextInput::make('konten_nama')
                    ->label('Nama Konten')
                    ->required(),
                Forms\Components\TextInput::make('konten_type')
                    ->label('Tipe Konten')
                    ->required(),
                Forms\Components\DateTimePicker::make('tglposting')
                    ->label('Tgl Posting')
                    ->required(),
                Forms\Components\RichEditor::make('copywriting')
                    ->label('Copy Writing')->columnSpan(2),
                Forms\Components\RichEditor::make('caption')
                    ->label('Captions')->columnSpan(2),
                Forms\Components\FileUpload::make('cover')
                    ->disk('public')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar1')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar2')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar3')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\FileUpload::make('gambar4')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                        $namaFileBaru = date('Y-m-d') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $namaFileBaru = str_replace('"', '', $namaFileBaru);
                        return $namaFileBaru;
                    }),
                Forms\Components\Textarea::make('konten_video')
                    ->label('Konten Video'),
                Forms\Components\Toggle::make('aktivasi')
                    ->required()
                    ->label('Status Aktif')
                    ->default(true)
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
                Tables\Columns\TextColumn::make('client.client_nama')->label('Nama Client')->searchable(),
                Tables\Columns\TextColumn::make('konten_nama')->label('Nama Konten')->searchable(),
                Tables\Columns\TextColumn::make('konten_type')->label('Tipe Konten')->searchable(),
                Tables\Columns\TextColumn::make('tglposting')
                    ->label('Tgl Posting')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->translatedFormat('d F Y H:i')),
                Tables\Columns\IconColumn::make('aktivasi')->boolean(),
                Tables\Columns\ImageColumn::make('cover')
                    ->disk('public')
                    ->url(fn($record) => asset('storage/' . $record->cover))->openUrlInNewTab()
                    ->label('Cover'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('client_id')
                    ->relationship('client', 'client_nama')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListKontenTS::route('/'),
            'create' => Pages\CreateKontenT::route('/create'),
            'edit' => Pages\EditKontenT::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ImageEntry::make('cover')->label('')->columnSpan(1)->url(fn($record) => asset('storage/' . $record->cover))->openUrlInNewTab(),
                ImageEntry::make('gambar1')->label('')->columnSpan(1)->height(100)->url(fn($record) => asset('storage/' . $record->gambar1))->openUrlInNewTab(),
                ImageEntry::make('gambar2')->label('')->columnSpan(1)->height(100)->url(fn($record) => asset('storage/' . $record->gambar2))->openUrlInNewTab(),
                ImageEntry::make('gambar3')->label('')->columnSpan(1)->height(100)->url(fn($record) => asset('storage/' . $record->gambar3))->openUrlInNewTab(),
                ImageEntry::make('gambar4')->label('')->columnSpan(1)->height(100)->url(fn($record) => asset('storage/' . $record->gambar4))->openUrlInNewTab(),
                TextEntry::make(''),
                TextEntry::make('copywriting')->html(),
                TextEntry::make('caption')->html(),
        ])->columns(3);
    }
}
