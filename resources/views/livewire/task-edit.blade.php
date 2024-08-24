<x-modal name="task-edit-modal">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form class="p-4 md:p-5" wire:submit.prevent="editTask">
        @csrf
        aaa
    </form>
</x-modal>
