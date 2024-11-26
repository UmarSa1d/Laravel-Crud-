<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Nama Customer')
                    ->required(),
                FileUpload::make('picture')
                    ->image()  // Ensures the file is treated as an image
                    ->disk('public')  // Ensure the image is stored on the public disk
                    ->label('Upload Picture'),  // Optional: Custom label
                Forms\Components\Textarea::make('content')
                    ->label('Email Customer')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Customer'),
                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->label('Email Customer'),
                ImageColumn::make('picture')  // Correct usage of ImageColumn
                    ->disk('public')  // Use the public disk where the image is stored
                    ->label('Customer Picture')
                    ->width(100)  // Set the width of the image
                    ->height(100), // Set the height of the image
            ])
            ->filters([
                // Add filters if needed
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
        return [
            // Add relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
 