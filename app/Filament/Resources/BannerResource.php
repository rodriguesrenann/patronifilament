<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use App\Tables\Columns\ColorView;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('texto')
                    ->maxLength(255),
                ColorPicker::make('cor_texto'),
                Forms\Components\TextInput::make('texto_botao')
                    ->maxLength(255),
                ColorPicker::make('cor_fundo_botao'),
                Forms\Components\TextInput::make('link_botao')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ordem')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->inline(false),
                FileUpload::make('imagem_fundo')
                    ->required()
                    ->maxSize(1024),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imagem_fundo'),
                Tables\Columns\TextColumn::make('texto'),
                ColorView::make('cor_texto'),
                Tables\Columns\TextColumn::make('texto_botao'),
                Tables\Columns\TextColumn::make('link_botao'),
                ColorView::make('cor_fundo_botao'),
                Tables\Columns\BooleanColumn::make('status'),
                Tables\Columns\TextColumn::make('ordem'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
