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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;

class ClientOnboardingResource extends Resource
{
    protected static ?string $model = ClientOnboarding::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Client';


    public static function form(Form $form): Form    {
        return $form
            ->schema([
                Wizard::make([
                    // Step 1: Client Information
                    Step::make('Client Information')
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('email')
                                ->email()
                                ->required(),
                            TextInput::make('phone')
                                ->tel()
                                ->required(),
                            TextInput::make('address')
                                ->required(),
                            Select::make('status')
                                ->options([
                                    'active' => 'Active',
                                    'inactive' => 'Inactive',
                                ])
                                ->required(),
                        ]),

                    // Step 2: ClientM Information
                    Step::make('Client Management')
                        ->schema([
                            Select::make('client_type')
                                ->options([
                                    'individual' => 'Individual',
                                    'company' => 'Company',
                                ])
                                ->required(),
                            DatePicker::make('contract_start_date')
                                ->required(),
                            DatePicker::make('contract_end_date')
                                ->required(),
                            TextInput::make('project_value')
                                ->numeric()
                                ->prefix('Rp')
                                ->required(),
                            Textarea::make('notes')
                                ->maxLength(1000),
                        ]),

                    // Step 3: Content Blueprint
                    Step::make('Content Blueprint')
                        ->schema([
                            TextInput::make('project_name')
                                ->required()
                                ->maxLength(255),
                            Select::make('content_type')
                                ->options([
                                    'article' => 'Article',
                                    'video' => 'Video',
                                    'social_media' => 'Social Media',
                                    'website' => 'Website',
                                ])
                                ->required(),
                            DatePicker::make('delivery_date')
                                ->required(),
                            Textarea::make('content_description')
                                ->required()
                                ->maxLength(2000),
                            Select::make('content_status')
                                ->options([
                                    'draft' => 'Draft',
                                    'in_review' => 'In Review',
                                    'approved' => 'Approved',
                                    'published' => 'Published',
                                ])
                                ->required(),
                            TextInput::make('target_audience')
                                ->required()
                                ->maxLength(255),
                        ]),
                ])
                ->skippable()
                ->persistStepInQueryString()
                ->columnSpanFull() // Membuat wizard mengambil lebar penuh
                ->extraAttributes([
                    'class' => 'w-full max-w-full' // Menambahkan class untuk lebar penuh
                ])
            ])
            ->columns(1) ;
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
