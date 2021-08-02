<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            {{ __('Create a new post') }}
                        </div> 
                        <div class="flex justify-end">
                            <button class="bg-red-500 text-white px-3 py-1 font-bold">
                              <a href="{{ route('dashboard') }}">
                                Back
                              </a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Blog editor -->
                <div class="p-6">
                    <!-- error message -->
                    @if ($errors->any())
                    <div class="p-3 bg-red-500 text-white font-bold">
                      <ul>
                        @foreach ($errors->all() as $e)
                          <li>{{ $e }}</li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="p-3"></div>
                    @endif

                    <form class="" method="post" action="{{ route('blog-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="py-2">
                            <label class="block">Title</label>
                            <input class="rounded border-gray-300 w-full" type="text" name="title" required>
                        </div>
                        <div class="py-2">
                            <label class="block">Body (post)</label>
                            <textarea class="rounded border-gray-300 w-full" name="body" rows="20"></textarea>
                        </div>
                        <div class="py-2">
                            <label class="block">Upload Image (the image will be used for thumbnail)</label>
                            <input class="rounded border-gray-300" type="file" name="image">
                            @error ('file')
                            <div class="p-3 bg-red-300 text-white font-bold">
                               {{ $message }} 
                            </div>
                            @enderror
                        </div>
                        <div class="py-5"></div>
                        <div class="py-2">
                            <a class="px-5 py-1 text-gray-500 font-bold" href="{{ route('dashboard') }}">Cancel</a> 
                            <input class="px-3 py-1 bg-blue-400 text-white font-bold" type="submit" value="Save">
                        </div> 
                    </form>
                </div> 
                <!-- end of Blog editor -->
            </div>
        </div>
    </div>
</x-app-layout>
