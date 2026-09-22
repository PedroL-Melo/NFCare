<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Ficha de Emergência - {{ $fichaMedica->nome_paciente }}</title>
    
    <!-- Plus Jakarta Sans Premium Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        premium: {
                            bg: '#F5F5F7',
                            card: 'rgba(255, 255, 255, 0.75)',
                            border: 'rgba(0, 0, 0, 0.05)',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-premium-bg text-gray-900 font-sans antialiased pb-32 selection:bg-red-100">

    <!-- Background Decoration (Optional for Glassmorphism pop) -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute -top-[20%] -left-[10%] w-[70%] h-[50%] rounded-full bg-red-100/40 blur-3xl"></div>
        <div class="absolute top-[20%] -right-[20%] w-[60%] h-[60%] rounded-full bg-blue-100/40 blur-3xl"></div>
    </div>

    <!-- Header -->
    <header class="pt-8 pb-4 flex justify-center">
        <img src="{{ asset('images/logo.png') }}" class="h-24 w-auto max-w-full object-contain" alt="NFCare Logo">
    </header>

    <!-- Bento Box Grid -->
    <main class="p-4 sm:p-6 max-w-lg mx-auto">
        <div class="grid grid-cols-2 gap-4">

            <!-- Identificação Principal (Spans 2 columns) -->
            <div class="col-span-2 rounded-[2rem] border border-premium-border bg-premium-card backdrop-blur-xl p-8 flex flex-col items-center text-center">
                @if($fichaMedica->foto_paciente)
                    <img src="{{ asset('storage/' . $fichaMedica->foto_paciente) }}" alt="Foto" class="w-28 h-28 rounded-full object-cover mb-5 ring-4 ring-white">
                @else
                    <div class="w-28 h-28 rounded-full bg-gray-100 flex items-center justify-center mb-5 ring-4 ring-white">
                        <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                @endif
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 leading-tight">{{ $fichaMedica->nome_paciente }}</h1>
                <p class="text-sm font-medium text-gray-500 mt-1 uppercase tracking-widest">Paciente</p>
            </div>

            <!-- Tipo Sanguíneo (1 column) -->
            <div class="col-span-1 rounded-[2rem] border border-red-100 bg-red-50/50 backdrop-blur-xl p-6 flex flex-col justify-between">
                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center mb-4">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-red-800/60 uppercase tracking-wider mb-1">Sangue</p>
                    <p class="text-3xl font-extrabold text-red-600 tracking-tighter">{{ $fichaMedica->tipo_sanguineo }}</p>
                </div>
            </div>

            <!-- Status Alerta (1 column) -->
            <div class="col-span-1 rounded-[2rem] border border-premium-border bg-premium-card backdrop-blur-xl p-6 flex flex-col justify-center items-center text-center">
                <div class="w-14 h-14 rounded-full bg-green-50 flex items-center justify-center mb-2">
                    <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-sm font-semibold text-gray-800">Verificado</p>
            </div>

            <!-- Alergias (Spans 2 columns) -->
            <div class="col-span-2 rounded-[2rem] border {{ $fichaMedica->alergias_graves ? 'border-orange-200 bg-orange-50/40' : 'border-premium-border bg-premium-card' }} backdrop-blur-xl p-6 sm:p-8">
                <div class="flex items-center mb-3">
                    <div class="w-8 h-8 rounded-full {{ $fichaMedica->alergias_graves ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h2 class="text-sm font-bold uppercase tracking-widest {{ $fichaMedica->alergias_graves ? 'text-orange-800' : 'text-gray-500' }}">Condições & Alergias</h2>
                </div>
                @if($fichaMedica->alergias_graves)
                    <p class="text-lg font-semibold text-orange-900 leading-relaxed">{{ $fichaMedica->alergias_graves }}</p>
                @else
                    <p class="text-base font-medium text-gray-400">Nenhuma condição crítica reportada.</p>
                @endif
            </div>

            <!-- Medicação Contínua (Spans 2 columns) -->
            <div class="col-span-2 rounded-[2rem] border border-premium-border bg-premium-card backdrop-blur-xl p-6 sm:p-8">
                <div class="flex items-center mb-3">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h2 class="text-sm font-bold text-gray-500 uppercase tracking-widest">Uso Contínuo</h2>
                </div>
                @if($fichaMedica->remedios_uso_continuo)
                    <p class="text-lg font-semibold text-gray-800 leading-relaxed">{{ $fichaMedica->remedios_uso_continuo }}</p>
                @else
                    <p class="text-base font-medium text-gray-400">Nenhum medicamento informado.</p>
                @endif
            </div>

        </div>
    </main>

    <!-- Glass CTA Button (Sticky) -->
    <div class="fixed bottom-0 left-0 w-full p-4 sm:p-6 bg-gradient-to-t from-[#F5F5F7] via-[#F5F5F7]/90 to-transparent pb-8">
        <div class="max-w-lg mx-auto">
            <a href="tel:{{ $fichaMedica->telefone_contato_emergencia_1 }}" 
               class="w-full relative overflow-hidden group bg-red-600 text-white font-bold text-lg py-5 rounded-[2rem] flex items-center justify-center shadow-[0_8px_30px_rgb(220,38,38,0.3)] transition-all active:scale-95">
                <!-- Efeito de brilho no botão -->
                <div class="absolute top-0 -left-[100%] w-1/2 h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[-20deg] group-hover:left-[200%] transition-all duration-1000"></div>
                
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                Ligar para {{ explode(' ', trim($fichaMedica->nome_contato_emergencia_1))[0] }}
            </a>
        </div>
    </div>

</body>
</html>
