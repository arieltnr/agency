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
                        Forms\Components\Select::make('gaya_komunikasi')
                            ->options([
                                'Kasual dan Ramah' => 'Kasual dan Ramah',
                                'Formal dan Profesional' => 'Formal dan Profesional',
                                'Santai dan Humoris' => 'Santai dan Humoris',
                            ]),
                        Forms\Components\Select::make('gaya_visual')
                            ->options([
                                'Warna Lembut dan Hangat' => 'Warna Lembut dan Hangat',
                                'Gaya Minimalis dan Elegan' => 'Gaya Minimalis dan Elegan',
                                'Warna Tegas dan Berani' => 'Warna Tegas dan Berani',
                            ]),
                        Forms\Components\Select::make('nada_bahasa')
                            ->options([
                                'Hangat dan Ramah' => 'Hangat dan Ramah',
                                'Formal dan Sopan' => 'Formal dan Sopan',
                                'Humor dan Santai' => 'Humor dan Santai',
                            ]),
                        Forms\Components\Select::make('perasaan_diinginkan')
                            ->options([
                                'Nyaman' => 'Nyaman',
                                'Terhubung' => 'Terhubung',
                                'Terinspirasi' => 'Terinspirasi',
                                'Dihargai' => 'Dihargai',
                                'Penasaran' => 'Penasaran',
                            ])
                            ->multiple(),
                        Forms\Components\TextInput::make('merek_inspirasi')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Select::make('representasi_visual')
                            ->options([
                                'Sederhana dan Elegan' => 'Sederhana dan Elegan',
                                'Mewah dan Berkelas' => 'Mewah dan Berkelas',
                                'Kasual dan Nyaman' => 'Kasual dan Nyaman',
                            ]),
                        Forms\Components\Textarea::make('variasi_logo')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Select::make('elemen_grafis')
                            ->options([
                                'Tidak Ada' => 'Tidak Ada',
                                'Garis Tipis dan Sederhana' => 'Garis Tipis dan Sederhana',
                                'Pola Geometris' => 'Pola Geometris',
                            ]),
                        Forms\Components\Select::make('filter_visual')
                            ->options([
                                'Filter Nuansa Hangat' => 'Filter Nuansa Hangat',
                                'Filter Cerah dan Tajam' => 'Filter Cerah dan Tajam',
                                'Tanpa Filter' => 'Tanpa Filter',
                            ]),
                        Forms\Components\Select::make('konsistensi_visual')
                            ->options([
                                'Fleksibel Berdasarkan Platform' => 'Fleksibel Berdasarkan Platform',
                                'Bervariasi Sesuai Konten' => 'Bervariasi Sesuai Konten',
                            ]),
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
                    ])->columns(4),

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
                    ])->columns(3),

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
                    ])->columns(3),

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
                    ])->columns(4),

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
                    ])->columns(4),
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
