<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('gantiEmergencyPassword') }}">
        @csrf

        <!-- emergency_password -->
        <p class="mt-1 text-sm/6 text-gray-600 text-center">emergency_password : {{ $data->emergency_password }}</p>

        <!-- ganti emergency_password baru -->
        <div class="mt-4">
            <x-text-input id="new_password" class="block mt-1 w-full" type="text" name="new_password" required placeholder="new emergency_password"/>
            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Ganti Sandi emergency') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
