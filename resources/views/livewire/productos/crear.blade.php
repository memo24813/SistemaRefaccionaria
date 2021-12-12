<form class="modal modal-open">
    <div class="modal-box">

        <h3 class="text-center font-bold text-lg">Informacion del producto</h3>

        <div class="form-control">
            <label class="label">
              <span class="label-text">Codigo</span>
            </label> 
            <input type="text" placeholder="Codigo" class="input input-primary input-bordered" wire:model="codigo">
        </div> 
        @error('codigo') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Nombre</span>
            </label> 
            <input type="text" placeholder="Nombre" class="input input-primary input-bordered" wire:model="nombre">
        </div> 
        @error('nombre') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror

        <div class="form-control">
            <label class="label">
              <span class="label-text">Descripcion</span>
            </label> 
            <input type="text" placeholder="Descripcion" class="input input-primary input-bordered" wire:model="descripcion">
        </div>
        @error('descripcion') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror 

        <div class="grid grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label">
                <span class="label-text">Precio</span>
                </label> 
                <input type="text" placeholder="Precio" class="input input-primary input-bordered" wire:model="precio">
                @error('precio') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
            </div> 

            <div class="form-control">
                <label class="label">
                <span class="label-text">Cantidad</span>
                </label> 
                <input type="text" placeholder="Cantidad" class="input input-primary input-bordered" wire:model="cantidad">
                @error('cantidad') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
            </div> 
        </div>

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


        <div class="flex w-full items-center justify-center bg-grey-lighter my-3">
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-base-100 text-base-content rounded-lg shadow-lg tracking-wide uppercase border border-primary cursor-pointer hover:bg-primary hover:text-base-content">
                @if($imagen || $imageUpload)
                <div class="avatar">
                    <div class="rounded-box w-14 h-14 ring ring-primary ring-offset-base-100 ring-offset-2">
                    @if($imageUpload)
                    <img src="{{ $imageUpload->temporaryUrl() }}">
                    @else
                    <img src="{{asset('storage/'.$imagen)}}">
                    @endif
                    {{-- <img src="{{ $imagen->temporaryUrl()?$imagen->temporaryUrl(): Storage::get($this->imagen) }}"> --}}
                    </div>
                </div> 
                @else
                <svg class="w-14 h-14" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                @endif
                <span class="mt-2 text-base leading-normal">Subir Imagen</span>
                <input type='file' class="hidden" wire:model="imageUpload"/>
            </label>
        </div>
        @error('imageUpload') <span class="block mx-2 mt-1 text-error">{{ $message }}</span>@enderror
    

        <div class="modal-action">
        <button for="my-modal-2" class="btn btn-primary" wire:click.prevent="save()">Guardar</button> 
        <label for="my-modal-2" class="btn" wire:click="closeModal()">Cancelar</label>
      </div>
    </div>
</form>