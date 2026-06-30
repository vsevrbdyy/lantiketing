<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketDestinasiResource\Pages;
use App\Models\PaketDestinasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaketDestinasiResource extends Resource
{
    protected static ?string $model = PaketDestinasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Paket Destinasi';
    
    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('destination_ticket_id')
                    ->relationship('destinationTicket', 'title')
                    ->required()
                    ->label('Destinasi'),
                    
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Paket'),
                    
                Forms\Components\RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                    
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Harga')
                    ->inputMode('decimal')
                    ->mutateDehydratedStateUsing(fn ($state) => (int) str_replace(['.', ','], ['', '.'], $state ?? '0')),

                // TAMBAHKAN FIELD GAMBAR DI BAWAH HARGA
                Forms\Components\FileUpload::make('image')
                    ->directory('paket')
                    ->nullable()
                    ->label('Gambar Paket')
                    ->image()
                    ->imageResizeTargetWidth(600)
                    ->imageResizeTargetHeight(400)
                    ->helperText('Upload gambar untuk paket ini (opsional)'),
                    
                Forms\Components\TextInput::make('icon')
                    ->maxLength(255)
                    ->helperText('Nama icon (contoh: heroicon-o-ticket)')
                    ->label('Icon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(40)
                    ->label('Gambar'),
                    
                Tables\Columns\TextColumn::make('destinationTicket.title')
                    ->label('Destinasi'),
                    
                Tables\Columns\TextColumn::make('nama_paket')
                    ->searchable()
                    ->label('Nama Paket'),
                    
                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR')
                    ->label('Harga'),
            ])
            ->filters([])
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
            'index' => Pages\ListPaketDestinasis::route('/'),
            'create' => Pages\CreatePaketDestinasi::route('/create'),
            'edit' => Pages\EditPaketDestinasi::route('/{record}/edit'),
        ];
    }
}