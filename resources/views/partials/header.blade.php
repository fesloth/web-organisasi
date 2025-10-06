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
    <div class="flex items-center gap-4">
        <!-- Avatar -->
        <div class="w-10 h-10 bg-gray-300 rounded-xl flex items-center justify-center text-gray-600">
            <i class="fas fa-user text-lg"></i>
        </div>

        <!-- Logout -->
        <a href="{{ route('logout') }}" title="Logout"
            class="flex items-center justify-center w-10 h-10 bg-red-100 hover:bg-red-200 text-red-600 rounded-xl transition duration-200 cursor-pointer">
            <i class="fas fa-sign-out-alt text-lg"></i>
        </a>
    </div>
</div>
