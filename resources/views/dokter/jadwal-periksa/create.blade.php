<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Tambah Jadwal Periksa') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Silakan isi form di bawah ini untuk menambahkan jadwal periksa baru.') }}
                            </p>
                        </header>

                        <form class="mt-6" id="formJadwalPeriksa" action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
                            @csrf

                            {{-- ID Dokter (Hidden input karena dokter yang login secara otomatis akan menjadi id_dokter) --}}
                            {{-- Asumsi Auth::user()->id adalah id dokter yang sedang login --}}
                            <input type="hidden" name="id_dokter" value="{{ Auth::user()->id }}">

                            {{-- Hari --}}
                            <div class="mb-3 form-group">
                                <label for="hari">Hari</label>
                                <select
                                    class="rounded form-control"
                                    id="hari"
                                    name="hari"
                                    required>
                                    <option value="">Pilih Hari</option>
                                    <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="minggu" {{ old('hari') == 'minggu' ? 'selected' : '' }}>Minggu</option>
                                </select>
                                @error('hari')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jam Mulai --}}
                            <div class="mb-3 form-group">
                                <label for="jamMulai">Jam Mulai</label>
                                <input
                                    type="time" {{-- Menggunakan type="time" untuk input jam --}}
                                    class="rounded form-control"
                                    id="jamMulai"
                                    name="jam_mulai"
                                    value="{{ old('jam_mulai') }}"
                                    required>
                                @error('jam_mulai')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jam Selesai --}}
                            <div class="mb-3 form-group">
                                <label for="jamSelesai">Jam Selesai</label>
                                <input
                                    type="time" {{-- Menggunakan type="time" untuk input jam --}}
                                    class="rounded form-control"
                                    id="jamSelesai"
                                    name="jam_selesai"
                                    value="{{ old('jam_selesai') }}"
                                    required>
                                @error('jam_selesai')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status (Default '1' untuk Aktif saat membuat) --}}
                            {{-- Anda bisa membiarkan ini hidden atau dibuat dropdown jika ingin bisa memilih status awal --}}
                            <input type="hidden" name="status" value="1">

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center gap-4 mt-4">
                                <a href="{{ route('dokter.jadwal-periksa.index') }}" class="btn btn-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan Jadwal
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>