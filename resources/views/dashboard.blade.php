<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Minhas Fichas Médicas') }}
            </h2>
            <a href="{{ route('fichas.create') }}" class="bg-nfcblue hover:bg-blue-800 text-white font-bold py-2 px-5 rounded-full transition-all active:scale-95">
                + Nova Ficha
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem] p-6 sm:p-10">
                
                @if($fichas->isEmpty())
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                            <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Nenhuma ficha cadastrada</h3>
                        <p class="mt-2 text-sm text-gray-500 max-w-md mx-auto">Comece criando uma ficha de emergência para você ou sua família. É rápido e pode salvar vidas.</p>
                        <a href="{{ route('fichas.create') }}" class="mt-6 inline-block bg-nfcblue hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-full transition-all active:scale-95">
                            Criar Primeira Ficha
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($fichas as $ficha)
                            <div class="border border-premium-border bg-white/60 backdrop-blur-md rounded-[2rem] p-6 hover:bg-white transition-colors">
                                <div class="flex items-center mb-6">
                                    <div class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center text-red-600 font-extrabold text-xl mr-4 border border-red-100">
                                        {{ substr($ficha->nome_paciente, 0, 1) }}
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $ficha->nome_paciente }}</h3>
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mt-1">Sangue: <span class="font-bold text-red-600">{{ $ficha->tipo_sanguineo }}</span></p>
                                    </div>
                                </div>
                                <div class="mt-4 flex flex-col space-y-3">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('fichas.public', $ficha->uuid) }}" target="_blank" class="flex-1 text-center bg-gray-50 hover:bg-gray-100 border border-gray-200 text-gray-800 py-2.5 rounded-xl text-sm font-bold transition">
                                            Página NFC
                                        </a>
                                        <a href="{{ route('fichas.edit', $ficha->id) }}" class="flex-1 text-center bg-blue-50 hover:bg-blue-100 border border-blue-100 text-blue-700 py-2.5 rounded-xl text-sm font-bold transition">
                                            Editar
                                        </a>
                                    </div>
                                    <form action="{{ route('fichas.destroy', $ficha->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta ficha permanentemente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-center bg-red-50 hover:bg-red-100 border border-red-100 text-red-600 py-2.5 rounded-xl text-sm font-bold transition">
                                            Excluir Ficha
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
