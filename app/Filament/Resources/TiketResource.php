<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiketResource\Pages;
use App\Models\Tiket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    
    protected static ?string $navigationLabel = 'Tiket';
    
    protected static ?string $pluralLabel = 'Tiket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('User'),
                Forms\Components\Select::make('destinasi_id')
                    ->relationship('destinasi', 'nama_destinasi')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Destinasi'),
                Forms\Components\DatePicker::make('tanggal_pesan')
                    ->required()
                    ->label('Tanggal Pesan'),
                Forms\Components\TextInput::make('jumlah_tiket')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(10)
                    ->label('Jumlah Tiket'),
                Forms\Components\TextInput::make('total_harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Total Harga'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label('User'),
                Tables\Columns\TextColumn::make('destinasi.nama_destinasi')
                    ->searchable()
                    ->sortable()
                    ->label('Destinasi'),
                Tables\Columns\TextColumn::make('tanggal_pesan')
                    ->date()
                    ->sortable()
                    ->label('Tanggal Pesan'),
                Tables\Columns\TextColumn::make('jumlah_tiket')
                    ->label('Jumlah'),
                Tables\Columns\TextColumn::make('total_harga')
                    ->money('IDR')
                    ->label('Total'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ])
                    ->label('Status'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->label('Filter Status'),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}