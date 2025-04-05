<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-show="show"
    x-transition
    @keydown.escape.window="show = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm"
    style="display: none;"
>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">¿Está seguro?</h2>
        <p class="text-gray-600 dark:text-gray-300 mb-6">Esta acción eliminará permanentemente el material seleccionado. ¿Desea continuar?</p>

        <div class="flex justify-end gap-4">
            <x-ui.button color="secondary" @click="show = false">Cancelar</x-ui.button>
            <x-ui.button color="danger" wire:click="delete">Eliminar</x-ui.button>
        </div>
    </div>
</div>
