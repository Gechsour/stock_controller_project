<?php

namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\ProductResource\Pages;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('product_code')
                ->required()
                ->maxLength(255),

            TextInput::make('brand')
                ->maxLength(255),

            // Category dropdown
            Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name')
                ->searchable()
                ->preload()
                ->required(),

            // Supplier dropdown
            Select::make('supplier_id')
                ->label('Supplier')
                ->relationship('supplier', 'name')
                ->searchable()
                ->preload()
                ->required(),

            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),

            TextInput::make('cost_price')
                ->required()
                ->numeric(),

            TextInput::make('quantity')
                ->required()
                ->numeric()
                ->default(0),

            TextInput::make('low_stock_alert')
                ->required()
                ->numeric()
                ->default(5),

            TextInput::make('unit')
                ->maxLength(255),

            FileUpload::make('image')
                    ->label('Product Image')
                    ->image()
                    ->imageEditor()
                    ->directory('') // Leave blank because 'video_pic' is already the root
                    ->disk('public_uploads') // Use your custom disk
                    ->visibility('public')
                    ->getUploadedFileNameForStorageUsing(fn($file) => $file->hashName())
                    ->required(fn($record) => $record === null)
                    ->enableDownload()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048),

            Textarea::make('description')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('name')->searchable(),
        TextColumn::make('product_code')->searchable(),
        TextColumn::make('brand')->searchable(),
        TextColumn::make('category.name')->label('Category'),
        TextColumn::make('supplier.name')->label('Supplier'),
        TextColumn::make('price')->money()->sortable(),
        TextColumn::make('cost_price')->numeric()->sortable(),
        TextColumn::make('quantity')->numeric()->sortable(),
        TextColumn::make('low_stock_alert')->numeric()->sortable(),
        TextColumn::make('unit')->searchable(),

        Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->getStateUsing(fn($record) => $record->image ? asset('product/' . $record->image) : null),

        TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
    ])
    ->filters([
        //
    ])
    ->actions([
        EditAction::make(),
    ])
    ->bulkActions([
        BulkActionGroup::make([
            DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
