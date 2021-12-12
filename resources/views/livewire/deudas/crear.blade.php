<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Informacion de la deuda</h3>

        <div class="form-control">
            <label class="label">
              <span class="label-text">Monto</span>
            </label> 
            <input type="number" placeholder="Ingrese monto a pagar" class="input input-primary input-bordered" wire:model="monto">
        </div> 
        @error('monto') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Abono</span>
            </label> 
            <input type="number" placeholder="Ingrese abono (puede dejar vacio)" class="input input-primary input-bordered" wire:model="abono">
        </div> 
        @error('abono') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Fecha de vencimiento</span>
            </label> 
            <input type="date" placeholder="Descripcion de la deuda" class="input input-primary input-bordered" wire:model="fecha_vencimiento">
        </div>
        @error('carro') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror 
        
        <div class="form-control">
            <label class="label">
              <span class="label-text">Proveedor</span>
            </label> 
            <select class="select select-bordered select-primary w-full" wire:model="id_proveedor">
                <option selected value="">Selecciona tu proveedor</option> 
                @forelse ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{$proveedor->empresa}}</option>                 
                @empty
                    <option selected value="">--- NO HAY PROVEEDORES ----</option>
                @endforelse
            </select>
        </div>
        @error('id_proveedor') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror 


        <div class="form-control">
            <label class="label">
            <span class="label-text">Descripcion</span>
            </label> 
            <textarea maxlength="200" class="textarea h-24 textarea-bordered textarea-primary" placeholder="Descripcion de la deuda" wire:model="descripcion"></textarea>
            @error('descripcion') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
        </div>

        <div class="modal-action">
        <button for="my-modal-2" class="btn btn-primary" wire:click.prevent="save()">Guardar</button> 
        <label for="my-modal-2" class="btn" wire:click="closeModal()">Cancelar</label>
      </div>
    </div>
</form>