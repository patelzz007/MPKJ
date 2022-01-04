<?php

namespace App\Http\Livewire\MasaTemuJanji;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\MasaTemuJanji;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'asc';
        $this->perPage           = 10;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new MasaTemuJanji())->orderable;
    }

    public function render()
    {
        $query = MasaTemuJanji::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $masaTemuJanjis = $query->paginate($this->perPage);

        return view('livewire.configuration.masa-temu-janji.index', compact('masaTemuJanjis', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('masa_temu_janji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        MasaTemuJanji::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(MasaTemuJanji $masaTemuJanji)
    {
        abort_if(Gate::denies('masa_temu_janji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masaTemuJanji->delete();
    }
}
