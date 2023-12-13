<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    
    
    <x-slot name="script">
        <script>
            var datatable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: {
          url: '{!! url()->current() !!}',
        },
        language: {
          url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
        },
        columns: [{
            data: 'id',
            name: 'id',
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'type.name',
            data: 'type.name'
          },
          {
            data: 'brand.name',
            data: 'brand.name'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '15%'
          },
        ],
      });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('admin.items.create') }}"
                class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
               + Tambah Data
             </a>
            </div>

            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th style="max-width: 1%">ID</th>
                                <th>Nama</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th style="max-width: 1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
