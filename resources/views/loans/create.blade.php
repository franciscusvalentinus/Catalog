<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Loan
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('loans.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="book_id" class="block font-medium text-sm text-gray-700">Book</label>
                            <select name="book_id" id="book_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{$book->title . ' (' . $book->publication_year .')'}}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="user_id" class="block font-medium text-sm text-gray-700">User</label>
                            <select name="user_id" id="user_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{$user->email . ' (' . $user->name .')'}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="loan_date" class="block font-medium text-sm text-gray-700">Loan Date</label>
                            <input type="date" name="loan_date" id="loan_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $loan_date }}" readonly/>
                            @error('loan_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="return_date" class="block font-medium text-sm text-gray-700">Return Date</label>
                            <input type="date" name="return_date" id="return_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $return_date }}" readonly/>
                            @error('return_date')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <input type="hidden" name="status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value=1 />
                            @error('status')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
