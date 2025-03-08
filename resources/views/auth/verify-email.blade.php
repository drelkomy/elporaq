<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" dir="rtl">
        {{ __('شكرًا لتسجيلك! قبل البدء، يرجى تأكيد عنوان بريدك الإلكتروني من خلال النقر على الرابط الذي أرسلناه لك. إذا لم تتلق البريد الإلكتروني، سنرسل لك رابطًا آخر بكل سرور.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400" dir="rtl">
            {{ __('تم إرسال رابط التحقق الجديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between" dir="rtl">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('إعادة إرسال رابط التحقق') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('تسجيل الخروج') }}
            </button>
        </form>
    </div>
</x-guest-layout>
