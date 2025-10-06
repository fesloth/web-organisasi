<div x-data="{ openProfile: false }" class="relative">
    <div class="flex justify-between items-center">
        <!-- Kiri: Salam -->
        <div>
            <h1 class="text-xl font-bold">
                Halo, {{ Auth::user()->name }}
            </h1>
            <p class="text-sm text-gray-600">Apa rencana kamu hari ini?</p>
        </div>

        <!-- Tengah: Search Bar -->
        <div class="flex-1 flex justify-center px-8">
            <div class="relative w-full max-w-md">
                <input 
                    type="text" 
                    placeholder="Cari sesuatu..." 
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-[#933636] focus:outline-none text-sm"
                >
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>

        <!-- Kanan: Avatar & Logout -->
        <div class="flex items-center gap-4 relative">
            <!-- Avatar (toggle dropdown) -->
            <div 
                @click="openProfile = !openProfile"
                class="w-10 h-10 bg-gray-300 rounded-xl flex items-center justify-center text-gray-600 cursor-pointer hover:bg-gray-400 transition"
                title="Profil"
            >
                <i class="fas fa-user text-lg"></i>
            </div>

            <!-- Dropdown Profile -->
            <div 
                x-show="openProfile" 
                @click.away="openProfile = false"
                x-transition
                class="absolute right-14 top-12 bg-white shadow-lg rounded-xl w-56 p-4 border border-gray-100 z-50"
            >
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <hr class="my-2 border-gray-200">
                <a href="{{ route('logout') }}"
                    class="flex items-center gap-2 text-sm text-red-600 hover:bg-red-50 px-3 py-2 rounded-lg transition w-full">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>
