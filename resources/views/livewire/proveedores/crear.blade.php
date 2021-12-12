<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Informacion del proveedor</h3>

        <div class="form-control">
            <label class="label">
              <span class="label-text">Empresa</span>
            </label> 
            <input type="text" placeholder="Nombre de la empresa" class="input input-primary input-bordered" wire:model="empresa">
        </div> 
        @error('empresa') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Proveedor</span>
            </label> 
            <input type="text" placeholder="Nombre del proveedor" class="input input-primary input-bordered" wire:model="proveedor">
        </div> 
        @error('proveedor') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Telefono</span>
            </label> 
            <input type="tel" placeholder="Telefono del proveedor" class="input input-primary input-bordered" wire:model="telefono">
        </div>
        @error('telefono') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror 
        
        <div class="form-control">
            <label class="label">
            <span class="label-text">Dias de llegada</span>
            </label> 
            <textarea maxlength="200" class="textarea h-24 textarea-bordered textarea-primary" placeholder="Ingresa los dias que la empresa llega al local" wire:model="diasLlegada"></textarea>
            @error('diasLlegada') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
        </div>

        <div class="modal-action">
        <button for="my-modal-2" class="btn btn-primary" wire:click.prevent="save()">Guardar</button> 
        <label for="my-modal-2" class="btn" wire:click="closeModal('modal')">Cancelar</label>
      </div>
    </div>
</form>