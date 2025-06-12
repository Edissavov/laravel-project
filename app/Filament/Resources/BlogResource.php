<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Split::make([
                Section::make([
                    TextInput::make('title')
                    ->required()
                    ->label('The Title of the Blog')
                        ->live()
                        ->afterStateUpdated(function (Set $set, $state) {
                            $slug = strtolower(preg_replace('/\s+/', '-', trim($state)));
                            $set('slug', $slug);
                        }),
                    TextInput::make('slug')->unique(ignoreRecord: true),
                    TiptapEditor::make('description')
                        ->columnSpanFull()
                ])->columns(2)
                    ->grow(true),
                Section::make([
                    Toggle::make('is_published'),
                    Select::make('category_id')->relationship('category', 'title'),
                    Select::make('user_id')->relationship('author', 'email'),
                    Select::make('tags')->relationship(titleAttribute: 'title')
                        ->multiple()
                        ->searchable()
                        ->preload(),
                    FileUpload::make('thumbnail')
                        ->disk('public')
                        ->directory('images')
                        ->visibility('public')
                        ->columnSpanFull()

                ])->grow(false),
            ])->columnSpanFull()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(name: 'title'),
                TextColumn::make('author.name'),
                TextColumn::make('category.title'),
                TextColumn::make('is_published')->badge()
                    ->color(fn(bool $state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn(bool $state) => $state ? 'true' : 'false'),
                TextColumn::make('tags.title')->badge(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
