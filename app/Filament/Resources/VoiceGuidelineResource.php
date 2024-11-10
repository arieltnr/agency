<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoiceGuidelineResource\Pages;
use App\Filament\Resources\VoiceGuidelineResource\RelationManagers;
use App\Models\VoiceGuideline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VoiceGuidelineResource extends Resource
{
    protected static ?string $model = VoiceGuideline::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
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
            'index' => Pages\ListVoiceGuidelines::route('/'),
            'create' => Pages\CreateVoiceGuideline::route('/create'),
            'edit' => Pages\EditVoiceGuideline::route('/{record}/edit'),
        ];
    }
}
