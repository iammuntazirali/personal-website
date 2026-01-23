<x-app-layout :title="'Home | Mamalikidou Anastasia'">
    <x-slot name="header">
        <h1>Mamalikidou Anastasia</h1>
    </x-slot>

    <h2>Welcome to my website!</h2>
    @include('partials.home.hero')
    @include('partials.home.projects')
</x-app-layout>
