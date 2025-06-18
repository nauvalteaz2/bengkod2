<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Jadwal Periksa') }}
                        </h2>
                        <div class="flex-col items-center justify-center text-center">
                            <a href="{{ route('dokter.jadwal-periksa.create') }}" class="btn btn-primary">Tambah Jadwal</a>

                            @if (session('status') === 'jadwal-periksa-created')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600">
                                {{ __('Created.') }}
                            </p>
                            @elseif (session('status') === 'jadwal-periksa-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600">
                                {{ __('Status updated.') }}
                            </p>
                            @endif
                        </div>
                    </header>

                    <table class="table mt-6 overflow-hidden rounded table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Selesai</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwal_periksas as $jadwal)
                            <tr>
                                <th scope="row" class="align-middle text-start">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="align-middle text-start">
                                    {{ $jadwal->dokter->name ?? 'Dokter Tidak Ditemukan' }}
                                </td>
                                <td class="align-middle text-start">
                                    {{ $jadwal->hari }}
                                </td>
                                <td class="align-middle text-start">
                                    {{ $jadwal->jam_mulai }}
                                </td>
                                <td class="align-middle text-start">
                                    {{ $jadwal->jam_selesai }}
                                </td>
                                <td class="align-middle text-start">
                                    {{ $jadwal->status == '1' ? 'Aktif' : 'Nonaktif' }} {{-- Menampilkan 'Aktif'/'Nonaktif' --}}
                                </td>
                                <td class="align-middle text-start">
                                    {{-- Form untuk mengubah status --}}
                                    <form action="{{ route('dokter.jadwal-periksa.update', $jadwal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        @if ($jadwal->status == '1') {{-- Jika status saat ini '1' (Aktif) --}}
                                        <input type="hidden" name="status" value="0"> {{-- Kirim '0' untuk menonaktifkan --}}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menonaktifkan jadwal ini?')">
                                            Nonaktifkan
                                        </button>
                                        @else {{-- Jika status saat ini '0' (Nonaktif) atau lainnya --}}
                                        <input type="hidden" name="status" value="1"> {{-- Kirim '1' untuk mengaktifkan --}}
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan jadwal ini?')">
                                            Aktifkan
                                        </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Tidak ada data jadwal periksa.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>