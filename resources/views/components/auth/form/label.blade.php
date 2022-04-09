@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-neutral-600']) }}>
    {{ $value ?? $slot }}
</label>
