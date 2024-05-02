<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('درخواست پرداخت ها') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-between mb-6">
        <a
            class="px-6 py-2 text-white bg-blue-900 rounded-md focus:outline-none"
            href="{{route("payment_request.index")}}"
        >
            برگشت
        </a>
    </div>

    <form class="dark:text-gray-300" action="{{route('payment_request.store')}}" method="POST" enctype="multipart/form-data">
        @method("POST")
        @csrf
        <div class="flex flex-row justify-center gap-5 mb-5">
            <div class="mb-4 w-1/2">
                <label for="national_code">کد ملی</label>
                <input
                    name="national_code"
                    type="text"
                    maxlength="10"
                    value="{{old('national_code')}}"
                    class="w-full rounded shadow-sm dark:shadow-gray-900 px-4 py-2 dark:bg-gray-700 dark:border-gray-800"
                />
                @error('national_code')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 w-1/2">
                <label for="category_id">دسته بندی</label>
                <select class="text-center w-full px-4 py-2 dark:bg-gray-600" name="category_id">
                    <option value="">یک دسته بندی را انتخاب کنید</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 w-1/2">
                <label for="amount">مبلغ</label>
                <input
                    name="amount"
                    type="number"
                    value="{{old('amount')}}"
                    class="w-full rounded shadow-sm dark:shadow-gray-900 px-4 py-2 dark:bg-gray-700 dark:border-gray-800"
                />
                @error('amount')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="flex flex-row justify-center gap-5 mb-5">

            <div class="mb-4 w-1/2">
                <label for="shaba_number">شماره شبا</label>
                <input
                    name="shaba_number"
                    type="text"
                    value="{{old('shaba_number')}}"
                    maxlength="24"
                    class="w-full rounded shadow-sm dark:shadow-gray-900 px-4 py-2 dark:bg-gray-700 dark:border-gray-800"
                />
                @error('shaba_number')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 w-1/2">
                <label for="file_path">فایل</label>
                <input
                    placeholder="فایل خود را آپلود کنید..."
                    name="file_path"
                    type="file"
                    class="w-full rounded shadow-sm dark:shadow-gray-900 px-4 py-2 dark:bg-gray-700 dark:border-gray-800"
                />
                @error('file_path')
                <div class="text-red-600 mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="flex flex-row mb-5">
            <div class="mb-4 w-1/2">
                <label for="request_description">توضیحات</label>
                <textarea name="request_description" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="توضیحات درخواست خود را بنویسید ..."></textarea>
                @error('request_description')
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
