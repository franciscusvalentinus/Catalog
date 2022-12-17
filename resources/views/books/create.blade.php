<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Book
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('books.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('title', '') }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Author</label>
                            <input type="text" name="author" id="author" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('author', '') }}" />
                            @error('author')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="publication_year" class="block font-medium text-sm text-gray-700">Publication Year</label>
                            <input type="text" name="publication_year" id="publication_year" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('publication_year', '') }}" />
                            @error('publication_year')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="book_page" class="block font-medium text-sm text-gray-700">Book Page</label>
                            <input type="text" name="book_page" id="book_page" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('book_page', '') }}" />
                            @error('book_page')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="publisher" class="block font-medium text-sm text-gray-700">Publisher</label>
                            <input type="text" name="publisher" id="publisher" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('publisher', '') }}" />
                            @error('publisher')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="isbn" class="block font-medium text-sm text-gray-700">ISBN</label>
                            <input type="text" name="isbn" id="isbn" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('isbn', '') }}" />
                            @error('isbn')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <input type="hidden" name="status" id="status" type="hidden" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value=0 />
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
