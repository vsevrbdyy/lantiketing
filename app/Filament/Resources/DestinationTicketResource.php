<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinationTicketResource\Pages;
use App\Models\DestinationTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Toggle;

class DestinationTicketResource extends Resource
{
    protected static ?string $model = DestinationTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Destination Ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Destinasi'),

                TextInput::make('location')
                    ->required()
                    ->maxLength(255)
                    ->label('Lokasi'),

                Textarea::make('description')
                    ->required()
                    ->rows(5)
                    ->label('Deskripsi'),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Harga (contoh: 250000)')
                    ->inputMode('decimal')
                    ->mutateDehydratedStateUsing(fn ($state) => (int) str_replace(['.', ','], ['', '.'], $state ?? '0')),

                FileUpload::make('image')
                    ->image()
                    ->directory('tickets')
                    ->nullable()
                    ->label('Gambar'),

                TagsInput::make('tags')
                    ->placeholder('Tambahkan tag, tekan Enter')
                    ->separator(',')
                    ->nullable()
                    ->default([])
                    ->label('Tags')
                    ->rules(['array']) // 
                    ->dehydrateStateUsing(fn ($state) => is_array($state) ? $state : []),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(50)
                    ->label('Gambar'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->label('Lokasi'),

                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->label('Harga'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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
            'index' => Pages\ListDestinationTickets::route('/'),
            'create' => Pages\CreateDestinationTicket::route('/create'),
            'edit' => Pages\EditDestinationTicket::route('/{record}/edit'),
        ];
    }
}