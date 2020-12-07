@props(['status'])

@if ($status)
    <div class="mx-auto mb-5 p-4 bg-green-400 rounded-md shadow-md opacity-80">
        <h2 class="font-bold text-center text-white opacity-100">{{ $status }}</h2>
    </div>
@endif
