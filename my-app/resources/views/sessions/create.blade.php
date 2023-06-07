<x-layout>
<main class="max-w-lg mx-auto mt-10">
    <x-panel>
    <h1 class="text-center font-bold text-xl ">Login!</h1>
    <form action="/sessions" method="post" class="mt-10">
        @csrf
        <x-form.input name="email" type="email" autocomplete="username"/>
        <x-form.input name="password" type="password" autocomplete="current-password"/>
        <x-form.button class="bg-blue-500 hover:bg-blue-600">Log In</x-fprm.button>
    </form>
    </x-panel>
</main>
</x-layout>
