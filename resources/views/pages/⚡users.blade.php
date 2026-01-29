<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\User;

new class extends Component
{
    public $search;

    #[Computed]
    public function users()
    {
        return User::query()
            ->when(filled($this->search), fn ($q) => $q->whereAny(['name', 'email'], 'like', '%'.$this->search.'%'))
            ->get();
    }
};
?>

<div class="max-w-7xl mx-auto py-20 space-y-4">

    <div>
        <flux:input wire:model.live.debounce="search" placeholder="Search users..." />
    </div>

    <div>
        <table class="w-full table-auto">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($this->users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @livewire('users.detail', ['user' => $user])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
