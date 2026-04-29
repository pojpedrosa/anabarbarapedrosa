<x-filament-panels::page>
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}
        <div class="mt-6">
            <x-filament::button type="submit">
                Guardar
            </x-filament::button>
        </div>
    </x-filament-panels::form>
</x-filament-panels::page>
