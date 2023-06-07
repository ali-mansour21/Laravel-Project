@props(['heading'])

<section class="py-8 mx-auto max-w-4xl">
        <h1 class="text-lg font-bold border-b mb-8 pb-2">{{$heading}}</h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
               </li>
                <li><a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a></li>
                <li><a href="/admin/categories/create" class="{{request()->is('admin/categories/create') ? 'text-blue-500' : '' }}">New Categorie</a></li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>
