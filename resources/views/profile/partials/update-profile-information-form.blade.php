<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            Dados da Conta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Atualize o nome e o email vinculados a esta conta.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nome Completo" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-nfcblue focus:ring focus:ring-blue-200" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email de Acesso" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-nfcblue focus:ring focus:ring-blue-200" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        O seu endereço de e-mail não foi verificado.

                        <button form="send-verification" class="underline text-sm text-nfcblue hover:text-blue-800 rounded-md focus:outline-none">
                            Clique aqui para reenviar o e-mail de verificação.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-bold text-sm text-green-600">
                            Um novo link foi enviado para o seu e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-nfcblue hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-full transition-all active:scale-95 shadow-sm">
                Salvar Alterações
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-green-600"
                >Salvo com sucesso!</p>
            @endif
        </div>
    </form>
</section>
