<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
    <div class="max-w-lg">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
            @csrf

            <div class="grid grid-cols-3 gap-4 mb-4 items-end">
                <div>
                    <x-input-label for="label_name" :value="__('Label Name')" />
                    <x-text-input id="label_name" name="name" type="text" wire:model="name" class="mt-1 block w-full" required />
                    <x-task-input-error class="mt-2" :messages="$errors->get('name')"/>
                </div>
                <div>
                    <x-input-label for="label_color" :value="__('Label Color')" />
                    <input id="label_color" name="color" type="color" value="#ffffff" wire:model="color" class="w-full h-[46px]" required />
                    <x-task-input-error class="mt-2" :messages="$errors->get('color')"/>
                </div>
                <div>
                    <x-primary-button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                        {{ $isEdit ? 'Update' : 'Create' }}
                    </x-primary-button>
                </div>
            </div>

        </form>
    </div>

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Color') }}
                </th>
                <th scope="col" class="px-6 py-3 text-right">
                    {{ __('Actions') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($labels as $label)
                <tr>
                    <td class="px-6 py-4 text-center">{{ $label->name }}</td>
                    <td class="px-6 py-4 text-center">{{ $label->color }}</td>
                    <td class="px-6 py-4 text-right">
                        <x-task-button wire:click="edit({{ $label->id }})" class="">{{ __('Edit') }}</x-task-button>
                        <x-task-button wire:click="delete({{ $label->id }})" class="bg-red-700 hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 focus:ring-red-300 dark:focus:ring-red-900">{{ __('Delete') }}</x-task-button>
                        <a href="{{ route('label', ['label' => $label->id]) }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{ __('Show Tasks') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
