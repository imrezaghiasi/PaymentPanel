<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('بانک ها') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-between mb-6">
        <a href="{{route('bank.create')}}" class="px-6 py-2 text-white bg-blue-900 rounded-md focus:outline-none">
            ایجاد بانک
        </a>
        <form method="GET" >
            <input type="" class="rounded py-2 px-4" placeholder="" />
            <button type="submit" class="rounded-lg px-6 py-2 focus:outline bg-yellow-300 mr-3 hover:bg-yellow-200 duration-300">جست
                و جو
            </button>
        </form>
    </div>
    <table class="w-full text-right text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ردیف
                </th>
                <th scope="col" class="px-6 py-3">
                    عنوان
                </th>
                <th scope="col" class="px-6 py-3">
                    شناسه شبا
                </th>
                <th scope="col" class="px-6 py-3">
                    عملیات
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($banks as $bank)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$bank->id}}
                </th>
                <td class="px-6 py-4">
                    {{ $bank->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $bank->shaba_identifier }}
                </td>
                <td class="px-6 py-4 flex">
                    <a tabindex="1" href="{{route('bank.edit',$bank->id)}}" class="px-4 py-2 text-sm text-white bg-blue-500 dark:bg-blue-700 rounded">
                        ویرایش
                    </a>
                    <form action="{{route('bank.destroy',$bank)}}" method="POST" tabindex="1" data-confirm-delete="true">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-red-700 rounded">حذف
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        @if(!$bank)
            <tr>
                <td class="px-6 py-4 border-t" colspan="4">
                    هیچ موردی یافت نشد.
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</x-app-layout>
