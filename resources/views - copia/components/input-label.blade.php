@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm font-semibold']) }}>
    {{ $value ?? $slot }}
</label>
