<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            {{ __('You posts') }}
                        </div>
                        <div class="flex justify-end">
                           <button class="bg-blue-400 text-white px-3 py-1 font-bold">
                              <a href="{{ route('blog-create') }}">
                                  <i class="fab fa-telegram-plane"></i> New Post
                              </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    @if (session('status'))
                    <div class="p-3 text-white bg-green-500 font-bold">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="p-5">
                    @if (count($blog) > 0)
                      @foreach ($blog as $b)
                        <div class="p-3">
                            <div class="font-bold text-2xl text-gray-600 py-3 border-b-2">{{ $b->title }}</div>
                            <div class="py-2"></div>
                            <div class="bg-gray-200">
                                <img class="object-none h-48 w-full" src="{{ $b->image_path }}">
                            </div>
                            <div class="py-2"></div>
                            <div class="py-3 text-l text-gray-600">{{ $b->body }}</div>
                            <div class="py-2">
                                <div class="flex flex-row gap-4">
                                    <div class="pt-2">
                                        <a class="px-4 py-2 rounded text-white bg-green-400 font-bold" href="/blog/view/{{$b->id}}" target="__blank">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </div>
                                    <div>
                                      <form action="/blog/delete/{{ $b->id }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="px-4 py-2 rounded text-white bg-red-400 font-bold" type="submit">
                                              <i class="fas fa-trash"></i> Delete 
                                          </button>
                                      </form>
                                    </div>
                                </div>
                              </div>
                        </div>
                      @endforeach
                    @else
                      <div class="p-6 font-bold text-xl bg-gray-100 text-center text-gray-500">
                          {{ __('No post yet') }}
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
