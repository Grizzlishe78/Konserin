<form wire:submit.prevent="register" class="space-y-4 text-left">
    <!-- Nama -->
    <div class="form-control">
        <label class="label">
            <span class="label-text text-white">Nama</span>
        </label>
        <input
            type="text"
            wire:model.defer="name"
            placeholder="Masukkan Nama kamu di sini"
            class="input input-bordered w-full"
            style="background-color: #780000; color: white; placeholder-color: rgba(255,255,255,0.6);"
        />
        @error('name') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Email -->
    <div class="form-control">
        <label class="label">
            <span class="label-text text-white">Email</span>
        </label>
        <input
            type="email"
            wire:model.defer="email"
            placeholder="Masukkan Email kamu di sini"
            class="input input-bordered w-full"
            style="background-color: #780000; color: white; placeholder-color: rgba(255,255,255,0.6);"
        />
        @error('email') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Password -->
    <div class="form-control">
        <label class="label">
            <span class="label-text text-white">Password</span>
        </label>
        <input
            type="password"
            wire:model.defer="password"
            placeholder="Masukkan Password kamu di sini"
            class="input input-bordered w-full"
            style="background-color: #780000; color: #FDF0D5; placeholder-color: rgba(255,255,255,0.6);"
        />
        @error('password') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Konfirmasi Password -->
    <div class="form-control">
        <label class="label">
            <span class="label-text text-white">Konfirmasi Password</span>
        </label>
        <input
            type="password"
            wire:model.defer="password_confirmation"
            placeholder="Ulangi Password kamu"
            class="input input-bordered w-full"
            style="background-color: #780000; color: #FDF0D5; placeholder-color: rgba(255,255,255,0.6);"
        />
        @error('password_confirmation') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Tombol Register -->
    <div class="flex justify-center">
        <button
            type="submit"
            class="btn font-semibold hover:opacity-90 w-40"
            style="background-color: #FDF0D5; color: #780000;"
        >
            Register
            <span wire:loading wire:target="register" class="loading loading-spinner ml-2"></span>
        </button>
    </div>
</form>
