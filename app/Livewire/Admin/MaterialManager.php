<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Material;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class MaterialManager extends Component
{
    public $libraryName;
    public $materials;
    public $showDrawer = false;
    public Material|null $editing = null;

    public $form = [
        'title' => '',
        'authors' => '',
        'section_id' => '',
        'type' => '',
        'isbn' => '',
        'issn' => '',
        'description' => '',
        'reference_code' => '',
        'quantity' => 1,
        'price' => 0.00,
    ];

    public array $sections = [];
    public bool $confirmingDelete = false;
    public ?int $deletingMaterialId = null;

    public function render()
    {
        return view('livewire.admin.material-manager');
    }

    public function mount()
    {
        $this->libraryName = Auth::user()->library->name ?? 'Biblioteca Desconocida';
        $this->loadMaterials();
        $this->sections = Section::where('library_id', Auth::user()->library_id)->pluck('name', 'id')->toArray();
    }

    public function loadMaterials()
    {
        $this->materials = Material::where('library_id', Auth::user()->library_id)->get();
    }


    public function openDrawer()
    {
        $this->resetForm();
        $this->showDrawer = true;
    }

    public function edit(Material $material)
    {
        $this->editing = $material;
        $this->form = [
            'title' => $material->title,
            'authors' => $material->authors,
            'type' => $material->type,
            'isbn' => $material->isbn,
            'issn' => $material->issn,
            'description' => $material->description,
            'reference_code' => $material->reference_code,
            'quantity' => $material->quantity,
            'price' => $material->price,
            'section_id' => $material->section_id,
        ];

        $this->showDrawer = true;
    }

    public function save()
    {

        $this->validate([
            'form.title' => 'required|string|max:255',
            'form.authors' => 'required|string|max:255',
            'form.section_id' => 'required|exists:sections,id',
            'form.type' => 'required|in:libro,revista,articulo',
            'form.isbn' => 'nullable|string|max:20',
            'form.issn' => 'nullable|string|max:20',
            'form.description' => 'nullable|string',
            'form.reference_code' => [
            'required',
            'string',
            'max:50',
            Rule::unique('materials', 'reference_code')->ignore(optional($this->editing)?->id),
        ],
            'form.quantity' => 'required|integer|min:1',
            'form.price' => 'required|numeric|min:0',
        ]);

        if ($this->editing) {
            $this->editing->update(array_merge(
                $this->form,
                ['library_id' => Auth::user()->library_id]
            ));
        } else {
            Material::create(array_merge(
                $this->form,
                ['library_id' => Auth::user()->library_id]
            ));
        }

        $this->resetForm();
        $this->showDrawer = false;
        $this->loadMaterials();
        // session()->flash('success', 'Material guardado correctamente.');
        $this->dispatch('notify', 'Material guardado correctamente.');

    }

    public function confirmDelete(int $id): void
    {
        $this->deletingMaterialId = $id;
        $this->confirmingDelete = true;
    }

    public function delete(): void
    {
        Material::findOrFail($this->deletingMaterialId)->delete();

        $this->confirmingDelete = false;
        $this->deletingMaterialId = null;

        $this->loadMaterials();
        $this->dispatch('notify', 'Material eliminado correctamente.');
    }

    public function resetForm()
    {
        $this->editing = null;
        $this->form = [
            'title' => '',
            'authors' => '',
            'section' => '',
            'isbn' => '',
            'issn' => '',
            'description' => '',
            'reference_code' => '',
            'quantity' => 1,
            'price' => 0.00,
        ];
    }

}
