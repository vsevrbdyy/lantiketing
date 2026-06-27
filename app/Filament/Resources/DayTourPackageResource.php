<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DayTourPackageResource\Pages;
use App\Models\DayTourPackage;
use App\Models\DestinationTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DayTourPackageResource extends Resource
{
    protected static ?string $model = DayTourPackage::class;

   protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Day Tour Packages'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->rows(5),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('tickets')
                    ->nullable(),
                Forms\Components\Repeater::make('tags')
                    ->schema([
                        Forms\Components\TextInput::make('tag')->required(),
                    ])
                    ->defaultItems(0)
                    ->nullable()
                    ->label('Tags'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->square()->size(50),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('location')->searchable(),
                Tables\Columns\TextColumn::make('price')->money('IDR'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDayTourPackages::route('/'),
            'create' => Pages\CreateDayTourPackage::route('/create'),
            'edit' => Pages\EditDayTourPackage::route('/{record}/edit'),
        ];
    }
}