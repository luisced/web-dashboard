<div class="filter-group">
    <label for="{{ $id }}">{{ $label }}:</label>
    <select id="{{ $id }}">
        <option value="">{{ $defaultOption }}</option>
        {{ $slot }}
    </select>
</div>
