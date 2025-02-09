<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use App\Models\Player;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('pronouns')->required(),
                Select::make('position1_id')
                    ->relationship(
                        name: 'position1',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn(Builder $query): Builder => $query->orderBy('id')
                    ),
                Select::make('position2_id')
                    ->relationship(
                        name: 'position2',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn(Builder $query): Builder => $query->orderBy('id')
                    ),
                Select::make('position3_id')
                    ->relationship(
                        name: 'position3',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn(Builder $query): Builder => $query->orderBy('id')
                    )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('pronouns'),
                TextColumn::make('position1.name'),
                TextColumn::make('position2.name'),
                TextColumn::make('position3.name'),
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
