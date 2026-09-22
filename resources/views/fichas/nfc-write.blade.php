<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
            {{ __('Configurar Tag NFC') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem] p-8 text-center shadow-sm">
                
                <div class="w-20 h-20 bg-blue-50 text-nfcblue rounded-full flex items-center justify-center mx-auto mb-6 border border-blue-100">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-2">Gravar na Pulseira/Tag</h3>
                <p class="text-gray-500 mb-8 leading-relaxed">
                    Você está configurando a ficha de <strong>{{ $ficha->nome_paciente }}</strong>. Clique no botão abaixo e aproxime o seu celular da Tag NFC para gravar a URL pública de emergência.
                </p>

                <div id="nfc-status" class="hidden mb-6 p-4 rounded-xl text-sm font-bold border">
                    <!-- Mensagens de status via JS -->
                </div>

                <button id="write-nfc-btn" class="w-full bg-nfcblue hover:bg-blue-800 text-white font-bold py-4 rounded-full transition-all active:scale-95 shadow-lg flex justify-center items-center">
                    <svg class="w-6 h-6 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Iniciar Gravação NFC
                </button>

                <div class="mt-8 pt-6 border-t border-gray-100 text-left">
                    <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-2">URL que será gravada:</p>
                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 break-all text-sm text-gray-600">
                        {{ route('fichas.public', $ficha->uuid) }}
                    </div>
                    <p class="mt-3 text-xs text-gray-400">
                        Nota: A gravação nativa pelo navegador funciona em dispositivos Android através do Google Chrome.
                    </p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-800 font-bold text-sm">Voltar ao Início</a>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('write-nfc-btn');
            const statusDiv = document.getElementById('nfc-status');
            const urlToWrite = "{{ route('fichas.public', $ficha->uuid) }}";

            function showStatus(message, isError = false) {
                statusDiv.classList.remove('hidden', 'bg-red-50', 'text-red-700', 'border-red-200', 'bg-green-50', 'text-green-700', 'border-green-200', 'bg-blue-50', 'text-blue-700', 'border-blue-200');
                
                if (isError) {
                    statusDiv.classList.add('bg-red-50', 'text-red-700', 'border-red-200');
                } else if (message.includes('Sucesso')) {
                    statusDiv.classList.add('bg-green-50', 'text-green-700', 'border-green-200');
                } else {
                    statusDiv.classList.add('bg-blue-50', 'text-blue-700', 'border-blue-200');
                }
                
                statusDiv.innerText = message;
            }

            btn.addEventListener('click', async () => {
                if (!('NDEFReader' in window)) {
                    showStatus("Seu navegador não suporta Web NFC nativamente. Grave o link abaixo usando um app como o 'NFC Tools'.", true);
                    return;
                }

                try {
                    const ndef = new NDEFReader();
                    
                    showStatus("Pronto! Encoste o celular na Tag NFC agora...");
                    btn.classList.add('opacity-50', 'cursor-not-allowed');
                    btn.disabled = true;

                    await ndef.write({
                        records: [{ recordType: "url", data: urlToWrite }]
                    });

                    showStatus("Sucesso! URL gravada na Tag NFC. Pode testar!");
                } catch (error) {
                    console.error("Erro NFC:", error);
                    showStatus("Erro ao gravar: " + error.message, true);
                } finally {
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    btn.disabled = false;
                }
            });
        });
    </script>
</x-app-layout>
