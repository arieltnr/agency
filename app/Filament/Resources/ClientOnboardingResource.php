<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientOnboardingResource\Pages;
use App\Filament\Resources\ClientOnboardingResource\RelationManagers;
use App\Models\ClientOnboarding;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\ClienMResource;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Forms\Components\Textarea;

class ClientOnboardingResource extends Resource
{
    protected static ?string $model = ClientOnboarding::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Client';


    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Wizard::make([
                Step::make('Client Onboarding')
                    ->schema([
                        Forms\Components\Textarea::make('slogan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('kategori_produk')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('produk_unggulan')
                            ->required(),
                        Forms\Components\Select::make('tujuan_sosmed')
                            ->options([
                                'Meningkatkan Brand Awareness' => 'Meningkatkan Brand Awareness',
                                'Meningkatkan Penjualan' => 'Meningkatkan Penjualan',
                                'Membangun Komunitas yang Loyal' => 'Membangun Komunitas yang Loyal',
                            ]),
                        Forms\Components\Select::make('target_usia')
                            ->options([
                                'Remaja (15-19)' => 'Remaja (15-19)',
                                'Dewasa Muda (20-30)' => 'Dewasa muda (20-30)',
                                'Dewasa (31-50)' => 'Dewasa (31-50)',
                            ]),
                        Forms\Components\Select::make('target_gender')
                            ->options([
                                'Pria' => 'Pria',
                                'Wanita' => 'Wanita',
                                'Pria & Wanita' => 'Pria & Wanita',
                            ]),
                        Forms\Components\Select::make('target_profesi')
                            ->options([
                                'Karyawan Profesional' => 'Karyawan Profesional',
                                'Wirausahawan Muda' => 'Wirausahawan Muda',
                                'Pekerja Lepas (freelancer)' => 'Pekerja Lepas (freelancer)',
                            ]),
                        Forms\Components\Select::make('target_pendapatan')
                            ->options([
                                'Rp 1-5 Juta' => 'Rp 1-5 Juta',
                                'Rp 5-10 Juta' => 'Rp 5-10 Juta',
                                'Rp 10-20 Juta' => 'Rp 10-20 Juta',
                            ]),
                        Forms\Components\Select::make('platform_prioritas')
                            ->options([
                                'Instagram' => 'Instagram',
                                'TikTok' => 'TikTok',
                                'Facebook' => 'Facebook',
                            ]),
                        Forms\Components\TextInput::make('gaya_komunikasi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('gaya_visual')
                            ->required(),
                        Forms\Components\TextInput::make('nada_bahasa')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('perasaan_diinginkan')
                            ->required(),
                        Forms\Components\Textarea::make('merek_inspirasi')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('representasi_visual')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('variasi_logo')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('elemen_grafis')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('filter_visual')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('konsistensi_visual')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_admin')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_audiens')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('kampanye_sebelumnya')
                            ->required()
                            ->label('Kampanye')
                            ->default(true),
                        Forms\Components\Toggle::make('panduan_warna')
                            ->required()
                            ->label('Warna')
                            ->default(true),
                    ])->columns(3),

                Step::make('Brand Visual Guideline')
                    ->schema([
                        Forms\Components\TextInput::make('file_logo')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('palet_warna')
                            ->required(),
                        Forms\Components\Textarea::make('nada_suasana')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('tipografi')
                            ->required(),
                        Forms\Components\TextInput::make('ikon_elemen')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('preset_filter')
                            ->required(),
                        Forms\Components\TextInput::make('gaya_fotografi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('konsistensi_platform')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('ringkasan')
                            ->required()
                            ->maxLength(1000),
                    ]),

                Step::make('Brand Voice Guideline')
                    ->schema([
                        Forms\Components\Textarea::make('nada_suara')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('gaya_bahasa')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('intonasi_suasana')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('kategori_konten')
                            ->required(),
                        Forms\Components\TextInput::make('persona_merek')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('bahasa_visual')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('panduan_respon')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('kosakata')
                            ->required(),
                        Forms\Components\Textarea::make('kata_terlarang')
                            ->required(),
                        Forms\Components\Textarea::make('adaptasi_platform')
                            ->required(),
                    ]),

                Step::make('Mother Content')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tema')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('tujuan')
                            ->required()
                            ->maxLength(1000),
                        DatePicker::make('waktu_mulai')
                            ->required(),
                        DatePicker::make('waktu_selesai')
                            ->required(),
                        Forms\Components\Textarea::make('pilar_konten')
                            ->required(),
                        Forms\Components\Textarea::make('strategi_platform')
                            ->required(),
                        Forms\Components\Textarea::make('target_kpi')
                            ->required(),
                    ]),

                Step::make('Content Blueprint')
                    ->schema([
                        DatePicker::make('tanggal_post')
                            ->required(),
                        Forms\Components\TextInput::make('platform')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('jenis_konten')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pilar_konten')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('caption')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('tagar')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('kebutuhan_visual')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('kebutuhan_teks')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('status')
                            ->required()
                            ->maxLength(255),
                    ]),
            ])
            ->skippable()
            ->persistStepInQueryString()
            ->columnSpanFull() // Buat wizard mengambil lebar penuh
            ->extraAttributes([
                'class' => 'w-full max-w-full' // Tambahkan class untuk lebar penuh
            ])
        ])
        ->columns(1);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListClientOnboardings::route('/'),
            'create' => Pages\CreateClientOnboarding::route('/create'),
            'edit' => Pages\EditClientOnboarding::route('/{record}/edit'),
        ];
    }
}
