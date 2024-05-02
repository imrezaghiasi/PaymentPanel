<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ایجاد بانک') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-between mb-6">
        <a
            class="px-6 py-2 text-white bg-blue-900 rounded-md focus:outline-none"
            href="{{route("bank.index")}}"
        >
        برگشت
        </a>
    </div>

    <form  class="dark:text-gray-300" action="{{route('bank.store')}}" method="POST">
        @method("POST")
        @csrf
        <div class="flex flex-row justify-center gap-5 mb-5">
            <div class="mb-4 w-1/2">
                <label for="national_code">عنوان بانک</label>
                <input
                    name="name"
                    type="text"
                    value="{{old('name')}}"
                    class="w-full rounded shadow-sm dark:shadow-gray-900 px-4 py-2 dark:bg-gray-700 dark:border-gray-800"
                />
                @error('name')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 w-1/2">
                <label for="shaba_identifier">شناسه شبا</label>
                <input
                    name="shaba_identifier"
                    type="number"
                    maxlength="2"
                    value="{{old('shaba_identifier')}}"
                    class="w-full rounded shadow-sm dark:shadow-gray-900 px-4 py-2 dark:bg-gray-700 dark:border-gray-800"
                />
                @error('shaba_identifier')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <button
                type="submit"
                class="px-6 py-2 font-bold text-white bg-green-500 rounded"
            >
                ایجاد
            </button>
        </div>
    </form>

</x-app-layout>
