<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
            {{ __('Meu Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Sair da Conta Card -->
            <div class="p-4 sm:p-8 bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem]">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-bold text-gray-900">Sair da Conta</h2>
                            <p class="mt-1 text-sm text-gray-600">Encerre sua sessão de forma segura.</p>
                        </header>
                        <form method="POST" action="{{ route('logout') }}" class="mt-6">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-full font-bold text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none transition ease-in-out duration-150">
                                Sair agora
                            </button>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
