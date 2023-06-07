<x-layout>
    <x-setting heading="Publish A New Post">
    <form action="/admin/posts" method="post" enctype="multipart/form-data" class="mx-auto mt-10">
        @csrf
        <x-form.input name="title"/>
        <x-form.input name="slug"/>
        <x-form.input name="thumbnail" type="file" />
        <x-form.textarea name="excerpt"/>
        <x-form.textarea name="body"/>

        <x-form.field>
            <x-form.label name="category" />
        <select name="category_id" id="category_id">
            @foreach( \App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
            @endforeach
        </select>
        <x-form.error name="category"/>
        </x-form.field>
        <x-form.button class="bg-blue-500 hover:bg-blue-600">Publish</x-form.button>
    </form>
    </x-setting>
</x-layout>
