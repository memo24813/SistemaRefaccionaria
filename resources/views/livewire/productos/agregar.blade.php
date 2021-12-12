<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Actualizar sotck del producto</h3>
        <p class="text-center text-red-400">SOLO CANTIDADES POSITIVAS.</p>
        <div class="form-control">
            <label class="label">
              <span class="label-text">Cantidad</span>
            </label> 
            <input type="number" min="1" placeholder="Cantidad de producto a agregar" class="input input-primary input-bordered" wire:model="cantidad">
        </div> 
        @error('cantidad') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="modal-action">
        <button for="my-modal-2" class="btn btn-primary" wire:click.prevent="saveStock()">Guardar</button> 
        <label for="my-modal-2" class="btn" wire:click="closeModalStock()">Cancelar</label>
      </div>
    </div>
</form>