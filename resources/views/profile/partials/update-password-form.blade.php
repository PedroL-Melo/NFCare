<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            Atualizar Senha
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Garanta que a sua conta esteja usando uma senha longa e segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Senha Atual" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-nfcblue focus:ring focus:ring-blue-200" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Nova Senha" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-nfcblue focus:ring focus:ring-blue-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Confirmar Nova Senha" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-nfcblue focus:ring focus:ring-blue-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-nfcblue hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-full transition-all active:scale-95 shadow-sm">
                Salvar Nova Senha
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-green-600"
                >Senha atualizada!</p>
            @endif
        </div>
    </form>
</section>
