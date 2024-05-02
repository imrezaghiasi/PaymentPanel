@php use Illuminate\Support\Facades\Storage; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('درخواست پرداخت ها') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('payment_request.create') }}"
           class="px-6 py-2 text-white bg-blue-900 rounded-md focus:outline-none">
            ایجاد درخواست
        </a>
        @role('admin')
        <form method="POST" action="{{ route('payment_request.pay_amount') }}">
            @csrf
            <button type="submit"
                    class="rounded-lg px-6 py-2 focus:outline bg-blue-300 mr-3 hover:bg-blue-200 duration-300">
                پرداخت دستی
            </button>
        </form>
        @endrole
        <form method="GET">
            <input type="text" class="rounded py-2 px-4"/>
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
                    {{ $payment_request->status_title }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment_request->payment_category->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment_request->amount }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ Storage::url($payment_request->file_path) }}" class="text-blue-600" target="_blank">دانلود
                        فایل</a>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-row">
                        <a tabindex="1" href="{{ route('payment_request.edit', $payment_request) }}"
                           class="px-4 py-2 text-sm text-white bg-blue-500 dark:bg-blue-700 rounded">
                            ویرایش
                        </a>
                        <form action="{{ route('payment_request.destroy', $payment_request) }}" method="POST"
                              tabindex="1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-red-700 rounded">حذف
                            </button>
                        </form>
                        @if($payment_request->status == 2 && auth()->user()->hasRole('admin'))
                            <form action="{{route('payment_request.confirm',$payment_request)}}" method="POST"
                                  tabindex="1">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-green-700 rounded">
                                    تایید
                                </button>
                            </form>
                            <button onclick="showRejectModal('{{ $payment_request->id }}')"
                                    class="px-4 py-2 mr-2 text-sm text-white bg-red-500 dark:bg-red-700 rounded">رد
                            </button>
                            <div id="rejectModal_{{ $payment_request->id }}"
                                 class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-40">
                                <div class="flex items-center justify-center min-h-screen p-4">
                                    <div
                                        class="modal-dialog bg-white w-1/2 rounded shadow-2xl dark:bg-gray-800 transform transition-opacity duration-300">
                                        <button
                                            class="absolute top-0 right-0 m-4 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-500"
                                            onclick="hideRejectModal('{{ $payment_request->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                        <div class="modal-content p-4">
                                            <h1 class="text-lg font-bold mb-4 mr-10">توضیحات رد درخواست</h1>
                                            <form id="rejectForm_{{ $payment_request->id }}"
                                                  action="{{ route('payment_request.reject', $payment_request->id) }}"
                                                  method="post">
                                                @csrf
                                                @method('PUT')
                                                <textarea name="reject_description"
                                                          class="w-full h-32 border-gray-300 dark:border-gray-950 bg-gray-900 rounded-md mb-4"
                                                          placeholder="توضیحات خود را بنویسید..."></textarea>
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                                                    رد درخواست
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
</x-app-layout>

<!-- JavaScript to handle modal visibility and form submission -->
<script>
    // Function to show the modal when the "Reject" button is clicked
    function showRejectModal(paymentRequestId) {
        document.getElementById('rejectModal_' + paymentRequestId).classList.remove('hidden');
    }

    // Function to hide the modal after submission
    function hideRejectModal(paymentRequestId) {
        document.getElementById('rejectModal_' + paymentRequestId).classList.add('hidden');
    }
</script>

