<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.manage-settings';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?string $navigationLabel = 'Definições';
    protected static ?string $title = 'Definições do site';
    protected static ?int $navigationSort = 99;

    public ?array $data = [];

    public function mount(): void
    {
        $keys = ['bio', 'instagram_url', 'facebook_url', 'linkedin_url', 'twitter_url', 'meta_description'];
        $this->form->fill(
            collect($keys)->mapWithKeys(fn ($k) => [$k => SiteSetting::get($k)])->all()
        );
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Textarea::make('bio')->label('Bio / Tagline')->rows(3),
            TextInput::make('meta_description')->label('Meta description'),
            TextInput::make('instagram_url')->url()->label('Instagram'),
            TextInput::make('facebook_url')->url()->label('Facebook'),
            TextInput::make('linkedin_url')->url()->label('LinkedIn'),
            TextInput::make('twitter_url')->url()->label('Twitter / X'),
        ])->statePath('data');
    }

    public function save(): void
    {
        foreach ($this->form->getState() as $key => $value) {
            SiteSetting::set($key, $value);
        }

        Notification::make()->title('Definições guardadas')->success()->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')->label('Guardar')->action('save'),
        ];
    }
}
