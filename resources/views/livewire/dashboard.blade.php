<div class="py-8">
    <div class="container mx-auto sm:px-6 lg:px-8 overflow-hidden">
        <div class="grid grid-cols-3 gap-4 justify-items-center">
            <div class="stat shadow-2xl rounded-box">
                <div class="stat-figure text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">                 
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>         
                  </svg>
                </div> 
                <div class="stat-title">Ventas mensuales</div> 
                <div class="stat-value">1,200</div> 
                {{-- <div class="stat-desc text-success">90 prueba</div> --}}
            </div>
            <div class="stat shadow-2xl rounded-box">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>                          
                    </svg>
                </div> 
                <div class="stat-title">Cotizaciones pendientes</div> 
                <div class="stat-value">{{$cotizaciones}}</div> 
                {{-- <div class="stat-desc text-error">↘︎ 90 (14%)</div> --}}
            </div>
            <div class="card row-span-3 bg-base-100 text-center shadow-2xl">
                <figure class="px-10 pt-10">
                  <img src="https://picsum.photos/id/1005/400/250" class="rounded-xl">
                </figure> 
                <div class="card-body">
                  <h2 class="card-title">Producto mas vendido</h2> 
                  <div class="justify-center card-actions">
                    <button class="btn btn-outline btn-accent">Cantidad vendida: Total</button>
                    <button class="btn btn-outline btn-accent">Total vendido: Total</button>
                  </div>
                </div>
            </div>
            
            <div class="stat col-span-2 rounded-box shadow-2xl">
                <div class="stat-figure text-info">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">                     
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>     
                    </svg>
                </div> 
                <div class="stat-title">Total de deudas a pagar</div> 
                <div class="stat-value">86</div>
                @if(!empty($deudas))
                <div class="stat-desc text-success">Proveedores</div>
                @endif

                @forelse ($deudas as $deuda)
                <div class="stat-desc text-info">{{$deuda->empresa}} - <span class="stat-desc text-error">{{ $deuda->monto - $deuda->abono }}</span></div>
                @empty
                <div class="stat-desc text-success">NO HAY DEUDA.</div>
                @endforelse
                
            </div>

            
            
            {{-- <div class="bg-success w-20 h-20">4</div>
            <div class="bg-success w-20 h-20">5</div>
            <div class="bg-success w-20 h-20">6</div>
            <div class="bg-success w-20 h-20">7</div>
            <div class="bg-success w-20 h-20">8</div> --}}
        </div>
    </div>
</div>