@if(session()->has('success'))
    <!-- using the alpine js to set a time for showing the message -->
    <div class="fixed bg-blue-500 text-white rounded-xl px-4 py-2 bottom-3 right-3 text-sm"
    x-data="{show:true}"
    x-init="setTimeout(()=>show=false,2000)"
    x-show="show">
        <p>{{session('success')}}</p>
    </div>
    @endif
