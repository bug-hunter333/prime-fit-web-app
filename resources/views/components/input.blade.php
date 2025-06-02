@props(['disabled' => false])

<input {{ $attributes->merge([
    'class' => 'bg-black text-green-400 border border-green-600 rounded-md shadow-sm focus:border-green-400 focus:ring focus:ring-green-500 focus:ring-opacity-50 px-3 py-2'
]) }} :disabled="$disabled" />
