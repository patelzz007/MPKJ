<?php

namespace App\Http\Livewire\Perkhidmatan;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Perkhidmatan;
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
        $this->orderable         = (new Perkhidmatan())->orderable;
    }

    public function render()
    {
        $query = Perkhidmatan::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $perkhidmatans = $query->paginate($this->perPage);

        return view('livewire.configuration.perkhidmatan.index', compact('perkhidmatans', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('perkhidmatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Perkhidmatan::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Perkhidmatan $perkhidmatan)
    {
        abort_if(Gate::denies('perkhidmatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perkhidmatan->delete();
    }
}
