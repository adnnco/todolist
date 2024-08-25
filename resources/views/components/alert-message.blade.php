<div {{ $attributes->merge(['role' =>'alert', 'class' => 'p-4 m-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400']) }}>
    {{ $slot }}
</div>
