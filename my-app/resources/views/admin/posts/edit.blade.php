<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
    <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data" class="mx-auto mt-10">
        @csrf
        @method('PATCH')
        <x-form.input name="title" :value="$post->title"/>
        <x-form.input name="slug" :value="$post->slug"/>
        <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>
        <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
        <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>

        <x-form.field>
            <x-form.label name="category" />
        <select name="category_id" id="category_id">
            @foreach( \App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" {{old('category_id',$post->category_id) == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
            @endforeach
        </select>
        <x-form.error name="category"/>
        </x-form.field>
        <x-form.button class="bg-blue-500 hover:bg-blue-600">Update</x-form.button>
    </form>
    </x-setting>
</x-layout>
