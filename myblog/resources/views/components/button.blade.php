@props(['type', 'class', 'text', 'onclick' => null])

<div>
    <button type="{{ $type }}" class="{{ $class }}" 
            @if($onclick) onclick="{{ $onclick }}" @endif>
        {{ $text }}
    </button>
</div>