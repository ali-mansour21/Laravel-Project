@props(['name'])

<x-form.field>
    <x-form.label name="{{$name}}" />
    <input
    class="border border-gray-200 p-2 w-full rounded"
    name="{{ $name }}"
    {{$attributes(['value'=>old($name)])}}
    id="{{ $name }}"
    />
    <x-form.error name="{{$name}}" class="text-xs text-red-500"/>
</x-form.field>
