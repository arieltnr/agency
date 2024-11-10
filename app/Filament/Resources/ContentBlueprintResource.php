<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentBlueprintResource\Pages;
use App\Filament\Resources\ContentBlueprintResource\RelationManagers;
use App\Models\ContentBlueprint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContentBlueprintResource extends Resource
{
    protected static ?string $model = ContentBlueprint::class;

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
            'index' => Pages\ListContentBlueprints::route('/'),
            'create' => Pages\CreateContentBlueprint::route('/create'),
            'edit' => Pages\EditContentBlueprint::route('/{record}/edit'),
        ];
    }
}
