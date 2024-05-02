<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('درخواست پرداخت ها') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-between mb-6">
        <a href="{{route('payment_request.create')}}"
           class="px-6 py-2 text-white bg-blue-900 rounded-md focus:outline-none">
            ایجاد درخواست
        </a>
        <form method="GET">
            <input type="" class="rounded py-2 px-4"/>
            <button type="submit"
                    class="rounded-lg px-6 py-2 focus:outline bg-yellow-300 mr-3 hover:bg-yellow-200 duration-300">جست
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
                نام درخواست کننده
            </th>
            <th scope="col" class="px-6 py-3">
                کد ملی
            </th>
            <th scope="col" class="px-6 py-3">
                وضعیت
            </th>
            <th scope="col" class="px-6 py-3">
                دسته بندی
            </th>
            <th scope="col" class="px-6 py-3">
                مبلغ
            </th>
            <th scope="col" class="px-6 py-3">
                فایل
            </th>
            <th scope="col" class="px-6 py-3">
                عملیات
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($payment_requests as $payment_request)
            @php
                $warning = $payment_request->status == 2;
                $confirm = $payment_request->status == 1;
                $reject = $payment_request->status == 0;
            @endphp
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$payment_request->id}}
                </th>
                <td class="px-6 py-4">
                    {{ $payment_request->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment_request->national_code }}
                </td>
                <td @class(['px-6','py-4','text-yellow-500' => $warning, 'text-red-500' => $reject,'text-green-500'=>$confirm])>
                    {{ $payment_request->status }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment_request->payment_category->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment_request->amount }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ asset('/'). $payment_request->file_path }}" class="text-blue-600" target="_blank">دانلود
                        فایل</a>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-row">
                        <a tabindex="1" href="{{route('payment_request.edit',$payment_request)}}"
                           class="px-4 py-2 text-sm text-white bg-blue-500 dark:bg-blue-700 rounded">
                            ویرایش
                        </a>
                        <form action="{{route('payment_request.destroy',$payment_request)}}" method="POST" tabindex="1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-red-700 rounded">حذف
                            </button>
                        </form>
                        @if($payment_request->status == 2)
                            <form action="{{route('payment_request.confirm',$payment_request)}}" method="POST"
                                  tabindex="1">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-green-700 rounded">
                                    تایید
                                </button>
                            </form>
                            <form action="{{route('payment_request.reject',$payment_request)}}" method="POST"
                                  tabindex="1">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-red-700 rounded">
                                    رد
                                </button>
                            </form>
                        @else

                        @endif
                    </div>
                </td>
            </tr>
        @endforeach

        @if(!$payment_requests)
            <tr>
                <td class="px-6 py-4 border-t" colspan="4">
                    هیچ موردی یافت نشد.
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    </div>
</x-app-layout>
