<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        <a href="#!" onclick="window.history.go(-1); return false;">
          ←
        </a>
        {!! __('Type &raquo; Sunting &raquo; #') . $type->id . ' &middot; ' . $type->name !!}
      </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          @if ($errors->any())
            <div class="mb-5" role="alert">
              <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                Ada kesalahan!
              </div>
              <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                <p>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                </p>
              </div>
            </div>
          @endif
          <form class="w-full" action="{{ route('admin.type.update', $type->id) }}" method="post"
                enctype="multipart/form-data">
            @csrf
            @method('put')
  
  
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                  Nama
                </label>
                <input value="{{ old('name') ?? $type->name }}" name="name"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-last-name" type="text" placeholder="Nama">
                <div class="mt-2 text-sm text-gray-500">
                  Masukan data yang baru 
                </div>
              </div>
            </div>
  
            <div class="flex flex-wrap mb-6 -mx-3">
              <div class="w-full px-3 text-right">
                <button type="submit"
                        class="px-4 py-2 font-bold text-gray bg-white rounded shadow-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                  Simpan Data
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-app-layout>