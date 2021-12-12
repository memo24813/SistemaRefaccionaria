<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Ingrese la cantidad a abonar a la deuda</h3>

        <div class="form-control">
            <label class="label">
              <span class="label-text">Deuda actual</span>
            </label> 
            <input type="number" placeholder="Ingrese monto a pagar" class="input input-primary input-bordered" wire:model="monto" disabled>
        </div> 

        <div class="form-control">
            <label class="label">
              <span class="label-text">Abono</span>
            </label> 
            <input type="number" placeholder="Ingrese abono (puede dejar vacio)" class="input input-primary input-bordered" wire:model="abono">
        </div> 
        @error('abono') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="modal-action">
        <button for="my-modal-2" class="btn btn-primary" wire:click.prevent="pay()">Guardar</button> 
        <label for="my-modal-2" class="btn" wire:click="closeModal('modalAbono')">Cancelar</label>
      </div>
    </div>
</form>