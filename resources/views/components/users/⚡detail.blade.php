<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
    public User $user;
};
?>

<div>
    <flux:modal.trigger name="user-detail-{{ $user->id }}">
        <flux:button icon="eye" variant="subtle"></flux:button>
    </flux:modal.trigger>

    <flux:modal name="user-detail-{{ $user->id }}" class="md:w-96">
        <div class="space-y-6 text-zinc-800  dark:text-zinc-200">

            <div>{{ $user->id }}</div>

            <div>{{ $user->name }}</div>

            <div>{{ $user->email }}</div>
        </div>
    </flux:modal>
</div>
