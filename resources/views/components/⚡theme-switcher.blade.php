<?php

use Livewire\Component;

new class extends Component
{
    public function updateTheme($theme): void
    {
        if (! in_array($theme, ['light', 'dark', 'system'])) return;

        $this->js("
            localStorage.setItem('theme', '{$theme}');
            window.updateTheme();
        ");
    }
};
?>

<div class="absolute top-2 right-2">
    <flux:radio.group
        variant="segmented"
        x-data="{ theme: localStorage.getItem('theme') || 'system' }"
        x-model="theme"
        x-on:change="$wire.updateTheme(theme)"
    >
        <flux:radio value="light" icon="sun" />
        <flux:radio value="dark" icon="moon" />
        <flux:radio value="system" icon="computer-desktop" />
    </flux:radio.group>
</div>
