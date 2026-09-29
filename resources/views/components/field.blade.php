@props([
    'name',
    'label',
    'type' => 'text',
    'required' => false,
    'hint' => null,
    'options' => [],
    'rows' => 4,
])

@php
    $id = 'field-'.$name;
    $control = 'mt-2 block w-full rounded-[8px] border bg-white px-4 py-3 text-sm text-[#1f1b16] outline-none transition placeholder:text-[#a0968a] focus:border-[#8a6a2e] focus:ring-2 focus:ring-[#d7b46a]/35 '
        .($errors->has($name) ? 'border-[#b54a3a]' : 'border-[#d9cdb8]');
    $value = old($name, $attributes->get('value'));
    $extra = $attributes->except(['class', 'value']);
@endphp

<div {{ $attributes->only('class') }}>
    <label for="{{ $id }}" class="text-sm font-semibold text-[#3d352c]">
        {{ $label }}
        @unless ($required)
            <span class="font-normal text-[#8b8175]">(opsional)</span>
        @endunless
    </label>

    @if ($type === 'textarea')
        <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" class="{{ $control }}" @required($required) {{ $extra }}>{{ $value }}</textarea>
    @elseif ($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" class="{{ $control }}" @required($required) {{ $extra }}>
            <option value="">Pilih salah satu</option>
            @foreach ($options as $option)
                <option value="{{ $option }}" @selected($value === $option)>{{ $option }}</option>
            @endforeach
        </select>
    @else
        <input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" value="{{ $value }}" class="{{ $control }}" @required($required) {{ $extra }}>
    @endif

    @if ($hint)
        <p class="mt-1.5 text-xs leading-5 text-[#8b8175]">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="mt-1.5 text-xs font-medium text-[#b54a3a]">{{ $message }}</p>
    @enderror
</div>
