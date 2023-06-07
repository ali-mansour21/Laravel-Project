<x-layout>
    <x-setting heading="Publish A New Post">
    <form action="/admin/categories/create" method="post" enctype="multipart/form-data" class="mx-auto mt-10">
        @csrf
        <x-form.input name="name"/>
        <x-form.input name="slug"/>
        <x-form.button class="bg-blue-500 hover:bg-blue-600">Create</x-form.button>
    </form>
    </x-setting>
</x-layout>
