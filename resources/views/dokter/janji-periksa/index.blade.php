<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Janji Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Janji Periksa') }}
                        </h2>
                        {{-- Contoh tombol tambah janji (jika ada route-nya) --}}
                        {{--
                        <div class="flex items-center justify-center text-center">
                            <a href="{{ route('dokter.janji-periksa.create') }}" class="btn btn-primary">Tambah Janji</a>
            </div>
            --}}
            </header>

            <table class="table mt-6 overflow-hidden rounded table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">No Antrian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($janji as $item)
                    <tr>
                        <th scope="row" class="align-middle text-start">{{ $loop->iteration }}</th>
                        <td class="align-middle text-start">{{ $item->pasien->nama ?? '-' }}</td>
                        <td class="align-middle text-start">{{ $item->keluhan }}</td>
                        <td class="align-middle text-start">{{ $item->no_antrian }}</td>
                        <td class="align-middle text-start">
                            {{-- Tambahkan tombol aksi jika perlu --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Tidak ada janji periksa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </section>
        </div>
    </div>
    </div>
</x-app-layout>