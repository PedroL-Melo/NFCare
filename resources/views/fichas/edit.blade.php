<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
            {{ __('Editar Ficha Médica: ') }} {{ $ficha->nome_paciente }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-premium-card backdrop-blur-xl border border-premium-border rounded-[2rem] p-6 sm:p-10">
                
                <form action="{{ route('fichas.update', $ficha->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Dados Pessoais -->
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Dados Pessoais</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <x-input-label for="nome_paciente" value="Nome Completo *" />
                            <x-text-input id="nome_paciente" name="nome_paciente" type="text" class="mt-1 block w-full" value="{{ old('nome_paciente', $ficha->nome_paciente) }}" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="tipo_sanguineo" value="Tipo Sanguíneo *" />
                            <select id="tipo_sanguineo" name="tipo_sanguineo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="A+" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'A+') ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'A-') ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'B+') ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'B-') ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'AB+') ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'AB-') ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'O+') ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ (old('tipo_sanguineo', $ficha->tipo_sanguineo) == 'O-') ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>
                    </div>

                    <!-- Informações Médicas -->
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informações Médicas</h3>
                    <div class="grid grid-cols-1 gap-4 mb-6">
                        <div>
                            <x-input-label for="alergias_graves" value="Alergias Graves (Ex: Penicilina, Amendoim)" />
                            <textarea id="alergias_graves" name="alergias_graves" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="2">{{ old('alergias_graves', $ficha->alergias_graves) }}</textarea>
                        </div>
                        <div>
                            <x-input-label for="remedios_uso_continuo" value="Medicamentos de Uso Contínuo" />
                            <textarea id="remedios_uso_continuo" name="remedios_uso_continuo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="2">{{ old('remedios_uso_continuo', $ficha->remedios_uso_continuo) }}</textarea>
                        </div>
                    </div>

                    <!-- Contatos de Emergência -->
                    <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Contatos de Emergência</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <x-input-label for="nome_contato_emergencia_1" value="Nome do Contato 1 *" />
                            <x-text-input id="nome_contato_emergencia_1" name="nome_contato_emergencia_1" type="text" class="mt-1 block w-full" value="{{ old('nome_contato_emergencia_1', $ficha->nome_contato_emergencia_1) }}" required />
                        </div>
                        <div>
                            <x-input-label for="telefone_contato_emergencia_1" value="Telefone do Contato 1 *" />
                            <x-text-input id="telefone_contato_emergencia_1" name="telefone_contato_emergencia_1" type="text" class="mt-1 block w-full" value="{{ old('telefone_contato_emergencia_1', $ficha->telefone_contato_emergencia_1) }}" required />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <x-input-label for="nome_contato_emergencia_2" value="Nome do Contato 2 (Opcional)" />
                            <x-text-input id="nome_contato_emergencia_2" name="nome_contato_emergencia_2" type="text" class="mt-1 block w-full" value="{{ old('nome_contato_emergencia_2', $ficha->nome_contato_emergencia_2) }}" />
                        </div>
                        <div>
                            <x-input-label for="telefone_contato_emergencia_2" value="Telefone do Contato 2 (Opcional)" />
                            <x-text-input id="telefone_contato_emergencia_2" name="telefone_contato_emergencia_2" type="text" class="mt-1 block w-full" value="{{ old('telefone_contato_emergencia_2', $ficha->telefone_contato_emergencia_2) }}" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4 pt-4 border-t">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-nfctext uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3">
                            Cancelar
                        </a>
                        <x-primary-button class="bg-nfcblue hover:bg-blue-800 text-white border-nfcblue">
                            {{ __('Atualizar Ficha') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
