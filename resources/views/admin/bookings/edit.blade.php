<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-white">
        <a href="#!" onclick="window.history.go(-1); return false;">
          ←
        </a>
        Booking {{ $booking->name }}
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

          <form class="w-full" action="{{ route('admin.bookings.update', $booking->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                  Nama*
                </label>
                <input value="{{ old('name') ?? $booking->name }}" name="name"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-last-name" type="text" placeholder="Nama" required>
                <div class="mt-2 text-sm text-gray-500">              

                  {{-- Nama brands. Contoh: Brand 1, Brand 2, Brand 3, dsb. Wajib diisi. Maksimal 255 karakter. --}}
                    Masukan Nama | Maksimal 255 karakter | Contoh : Zura 
                </div>
              </div>
            </div>

            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                  Alamat*
                </label>
                <input value="{{ old('address') ?? $booking->address }}" name="address"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-last-name" type="text" placeholder="Nama" required>
                <div class="mt-2 text-sm text-gray-500">              

                    Masukan Alamat | Maksimal 255 karakter | Contoh : JL Berdua
                </div>
              </div>
            </div>

            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                  Kota*
                </label>
                <input value="{{ old('city') ?? $booking->city }}" name="city"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-last-name" type="text" placeholder="Nama" required>
                <div class="mt-2 text-sm text-gray-500">              

                  {{-- Nama brands. Contoh: Brand 1, Brand 2, Brand 3, dsb. Wajib diisi. Maksimal 255 karakter. --}}
                    Masukan Kota | Maksimal 255 karakter | Contoh : Malang
                </div>
              </div>
            </div>

            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
              <div class="w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                  Kode POS*
                </label>
                <input value="{{ old('zip') ?? $booking->zip }}" name="zip"
                       class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-last-name" type="text" placeholder="Nama" required>
                <div class="mt-2 text-sm text-gray-500">              

                  {{-- Nama brands. Contoh: Brand 1, Brand 2, Brand 3, dsb. Wajib diisi. Maksimal 255 karakter. --}}
                    Masukan Kota | Maksimal 255 karakter | Contoh : Malang
                </div>
              </div>
            </div>

            <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
                <div class="w-full">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                    Status Booking*
                  </label>
                  <select name="status"
                         class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                         id="grid-last-name">
                  <option value="pending" {{$booking->status =='pending' ? 'selected' : ''}}>Pending</option>
                  <option value="confirmed" {{$booking->status =='confirmed' ? 'selected' : ''}}>confirmed</option>
                  <option value="done" {{$booking->status =='done' ? 'selected' : ''}}>Done</option>
                  </select>

                      <div class="mt-2 text-sm text-gray-500">
                        Status Booking | Contoh : Done
                      </div>
                  </div>
                </div>

                <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
                    <div class="w-full">
                      <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                        Status Pembayaran*
                      </label>
                      <select name="payment_status"
                             class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                             id="grid-last-name">
                      <option value="pending" {{$booking->payment_status =='pending' ? 'selected' : ''}}>Pending</option>
                      <option value="success" {{$booking->payment_status =='success' ? 'selected' : ''}}>Success</option>
                      <option value="failed" {{$booking->payment_status =='failed' ? 'selected' : ''}}>Failed</option>
                      <option value="expired" {{$booking->payment_status =='expired' ? 'selected' : ''}}>Expired</option>
                      </select>
    
                          <div class="mt-2 text-sm text-gray-500">
                            Status Booking | Contoh : Done
                          </div>
                      </div>
                    </div>



            </div> 
            </div> 

             
  
            <div class="flex flex-wrap mb-6 -mx-3">
              <div class="w-full px-3 text-right">
                <button type="submit"
                        class="focus:outline-none text-gray bg-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                  Simpan Data
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-app-layout>