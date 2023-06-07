
<x-layout>
<main class="max-w-lg mx-auto mt-10">
<x-panel>
    <h1 class="text-center font-bold text-xl ">Register!</h1>
    <form action="/register" method="post" class="mt-10">
        @csrf
        <x-panel>
        <x-form.input name="name" />
        <x-form.input name="username" />
        <x-form.input name="email" type="email"/>
        <x-form.input name="password" type="password"/>
        <x-form.button class="bg-blue-500 hover:bg-blue-600">Submit</x-form.button>
        </x-panel>
    </form>
    </x-panel>
</main>
</x-layout>
