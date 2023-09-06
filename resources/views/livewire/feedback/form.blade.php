<div>

    <x-authentication-card>
        <x-slot name="logo">
            Feedback form for {{ config('app.name') }}
        </x-slot>

        <x-validation-errors class="mb-4" />

        {{-- @if (session('status')) --}}
        {{-- <div x-data="{ message : '' }"
                x-on:status="{ message : $event.details.message }"
                class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                <span x-text="message"></span>
            </div> --}}
        {{-- @endif --}}

        @push('styles')
            {{-- <link href="{{ url('css/toastr.css') }}" rel="stylesheet" /> --}}
        @endpush

        @push('scripts')
            {{-- <script src="{{ url('js/toastr.js') }}"></script> --}}
            <script>
                document.addEventListener('livewire:initialized', () => {
                    @this.on('status', (event) => {
                        alert(event.message);
                        // console.log(event)
                        // new Toast({
                        //     message: event.message,
                        //     type: event.type
                        // });
                    });
                });
            </script>
        @endpush

        <form wire:submit="save">

            <div class="my-2">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.name" />
            </div>

            <div class="my-2">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input class="block mt-1 w-full" type="email" wire:model="state.email" />
            </div>

            <div class="my-2">
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.title" />
            </div>

            <div class="my-2">
                <x-label for="content" value="{{ __('Feedback') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.content" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</div>
