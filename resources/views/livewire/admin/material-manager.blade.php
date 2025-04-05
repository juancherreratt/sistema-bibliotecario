<div>
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-8">
            {{ $libraryName }}
        </h1>

    <!-- Botón para abrir el drawer -->
    <div class="mb-6 text-left">
        <x-ui.button wire:click="openDrawer">
            Agregar material
        </x-ui.button>
    </div>

    <!-- Cards de materiales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($materials as $material)
            <x-ui.card
            :title="$material->title"
            :description="$material->description"
            image="https://upload.wikimedia.org/wikipedia/commons/d/db/Logotipo_de_la_Corporaci%C3%B3n_Universitaria_Minuto_de_Dios.svg"
            >
            <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-200">
                <div>
                    <p><strong>Autores:</strong> {{ $material->authors }}</p>
                    <p><strong>ISBN:</strong> {{ $material->isbn }}</p>
                    <p><strong>ISSN:</strong> {{ $material->issn }}</p>
                    <p><strong>Código único:</strong> {{ $material->reference_code }}</p>
                </div>
                <div>
                    <p><strong>Ubicación:</strong> {{ $material->section->name }}</p>
                    <p><strong>Cantidad:</strong> {{ $material->quantity }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($material->price, 0, ',', '.') }}</p>
                    <p><strong>Valor Total:</strong> ${{ number_format($material->quantity * $material->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <x-ui.button color="primary" wire:click="edit({{ $material->id }})">Editar</x-ui.button>
                <x-ui.button color="danger" wire:click="confirmDelete({{ $material->id }})">Eliminar</x-ui.button>

            </div>
            </x-ui.card>
        @endforeach
    </div>

    <!-- Drawer -->
    <x-ui.drawer wire:model="showDrawer" :title="$editing ? 'Editar Material' : 'Registrar Material'">
        <form wire:submit.prevent="save" class="space-y-4 p-4">
            <x-input label="Título" wire:model.defer="form.title" required />
            <x-input label="Autores" wire:model.defer="form.authors" required />

            <x-select label="Tipo de Material" wire:model.defer="form.type">
                <option value="">Seleccione una sección</option>
                <option value="libro">Libro</option>
                <option value="revista">Revista</option>
                <option value="articulo">Artículo</option>
            </x-select>

            <div class="grid grid-cols-2 gap-4">
                <x-input label="ISBN" wire:model.defer="form.isbn" />
                <x-input label="ISSN" wire:model.defer="form.issn" />
            </div>

            <x-textarea label="Descripción" wire:model.defer="form.description" rows="3" />

            <div class="grid grid-cols-2 gap-4">
                <x-input label="Código Único de Referencia" wire:model.defer="form.reference_code" required />
                <x-select label="Sección (ubicación interna)" wire:model.defer="form.section_id" required>
                    <option value="">Seleccione una sección</option>
                    @foreach($sections as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-input label="Cantidad Disponible" type="number" min="1" wire:model.defer="form.quantity" required />
                <x-input label="Valor de Reposición" type="number" step="0.01" min="0" wire:model.defer="form.price" required />
            </div>


            <x-ui.button type="submit">Guardar Material</x-ui.button>
        </form>
    </x-ui.drawer>

    {{-- Modal de confirmación --}}
    <x-ui.confirm-delete wire:model="confirmingDelete" />

</div>

