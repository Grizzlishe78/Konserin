<form wire:submit.prevent="login" class="space-y-4 text-left">
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

    <!-- Remember me -->
    <label class="label cursor-pointer">
        <input type="checkbox" wire:model="remember" class="checkbox checkbox-sm mr-2" />
        <span class="label-text text-white">Remember Me</span>
    </label>

    <!-- Tombol Login -->
    <div class="flex justify-center">
    <button
        type="submit"
        class="btn  font-semibold hover:opacity-90 w-40"
        style="background-color: #FDF0D5; color: #780000;"
    >
        Login
        <span wire:loading wire:target="login" class="loading loading-spinner ml-2"></span>
    </button>
     </div>
</form>
