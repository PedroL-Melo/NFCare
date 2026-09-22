<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            Excluir Conta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Aviso: Ao excluir sua conta, todos os seus dados e Fichas Médicas cadastradas serão apagados permanentemente do sistema.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 font-bold py-2 px-6 rounded-full transition-all active:scale-95 shadow-sm"
    >
        Excluir Minha Conta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-900">
                Tem certeza que deseja excluir sua conta?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Esta ação é irreversível. Por favor, digite sua senha para confirmar a exclusão.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Senha" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full sm:w-3/4 rounded-xl border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200"
                    placeholder="Sua senha atual"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-6 rounded-full transition-all">
                    Cancelar
                </button>

                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full transition-all shadow-sm">
                    Confirmar Exclusão
                </button>
            </div>
        </form>
    </x-modal>
</section>
