<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" dir="rtl">
        {{ __('هذه منطقة آمنة من التطبيق. يرجى تأكيد كلمة المرور قبل المتابعة.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" dir="rtl">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('كلمة المرور')" />
            <x-text-input id="password" class="block mt-1 w-full text-right"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                {{ __('تأكيد') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
