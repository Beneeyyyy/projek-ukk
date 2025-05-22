<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PKLResource\Pages;
use App\Models\PKL;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PKLResource extends Resource
{
    protected static ?string $model = PKL::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data PKL';
    protected static ?string $modelLabel = 'PKL';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Select::make('siswa_id')
                        ->label('Siswa')
                        ->relationship('siswa', 'nama')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('industri_id')
                        ->label('Industri')
                        ->relationship('industri', 'nama')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('guru_id')
                        ->label('Guru Pembimbing')
                        ->relationship('guru', 'name')
                        ->searchable()
                        ->required(),

                    Forms\Components\DatePicker::make('mulai')
                        ->label('Mulai PKL')
                        ->required(),

                    Forms\Components\DatePicker::make('selesai')
                        ->label('Selesai PKL')
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')->label('Siswa')->searchable(),
                Tables\Columns\TextColumn::make('industri.nama')->label('Industri'),
                Tables\Columns\TextColumn::make('guru.name')->label('Guru Pembimbing'),
                Tables\Columns\TextColumn::make('mulai')->label('Mulai')->date('d M Y'),
                Tables\Columns\TextColumn::make('selesai')->label('Selesai')->date('d M Y'),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPKLS::route('/'),
            'create' => Pages\CreatePKL::route('/create'),
            'edit' => Pages\EditPKL::route('/{record}/edit'),
        ];
    }
}
