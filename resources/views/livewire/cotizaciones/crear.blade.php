<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Informacion de la cotizacion</h3>

        <div class="form-control">
            <label class="label">
              <span class="label-text">Nombre persona</span>
            </label> 
            <input type="text" placeholder="Nombre de la persona" class="input input-primary input-bordered" wire:model="persona">
        </div> 
        @error('persona') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Telefono</span>
            </label> 
            <input type="tel" placeholder="Telefono" class="input input-primary input-bordered" wire:model="telefono">
        </div> 
        @error('telefono') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Carro</span>
            </label> 
            <input type="text" placeholder="Año Marca y modelo del carro" class="input input-primary input-bordered" wire:model="carro">
        </div>
        @error('carro') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror 
        
        <div class="form-control">
            <label class="label">
            <span class="label-text">Informacion del pedido</span>
            </label> 
            <textarea maxlength="200" class="textarea h-24 textarea-bordered textarea-primary" placeholder="Informacion del pedido a realizar" wire:model="pedido"></textarea>
            @error('pedido') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
        </div>

        <div class="modal-action">
        <button for="my-modal-2" class="btn btn-primary" wire:click.prevent="save()">Guardar</button> 
        <label for="my-modal-2" class="btn" wire:click="closeModal()">Cancelar</label>
      </div>
    </div>
</form>