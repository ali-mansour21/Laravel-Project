@auth
            <x-panel>
                <form method="POST" action="/posts/{{ $post->slug }}/comments">
                    @csrf
                    <header class="flex items-center">
                    <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-xl">
                        <h2 class="ml-3">Want to participate</h2>
                    </header>
                    <div class="mt-6">
                        <textarea name="body"
                        rows="5" class="w-full text-sm focus:outline-none focus:ring"
                        placeholder="Quick, think about something to say !!" required></textarea>
                        @error('body')
                        <span class="text-xs text-red-500">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="flex justify-between mt-6 pt-6 border-t border-gray-200 ">
                        <x-form.button class="bg-blue-500 hover:bg-blue-600">Post</x-form.button>
                    </div>
                </form>
            </x-panel>
            @else
                <p>
                    <a class="hover:underline" href="/register">Register!</a> or <a class="hover:underline" href="/login">Login</a> to leave a comment.
                </p>
            @endauth
