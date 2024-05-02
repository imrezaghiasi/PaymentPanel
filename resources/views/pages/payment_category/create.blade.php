<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-between mb-6">
        <a
            class="px-6 py-2 text-white bg-blue-900 rounded-md focus:outline-none"
            href="{{route("payment_category.index")}}"
        >
        برگشت
        </a>
    </div>

    <form  class="dark:text-gray-300" action="{{route('payment_category.store')}}" method="POST">
        @method("POST")
        @csrf
        <div class="flex flex-col">
            <div class="mb-4">
                <label for="name">عنوان شغل</label>
                <input
                    type="text"
                    name="name"
                    class="w-full mt-5 px-4 py-2 rounded dark:bg-gray-700 dark:border-gray-800"
                />
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
