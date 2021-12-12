<div class="navbar mb-2 shadow-lg bg-neutral-focus text-neutral-content rounded-box">
    <div class="px-2 mx-2 navbar-start">
      <span class="text-lg font-bold">
            {{ config('app.name', 'Laravel') }}
            </span>
    </div> 
    <div class="hidden px-2 mx-2 navbar-center lg:flex">
      <div class="flex items-stretch">
        <a class="btn btn-ghost btn-sm rounded-btn {{request()->routeIs('dashboard')?'btn-active':''}}" href="{{route('dashboard')}}">
                {{__('Dashboard')}}
        </a>
        <a class="btn btn-ghost btn-sm rounded-btn {{request()->routeIs('pdv')?'btn-active':''}}" href="{{route('pdv')}}">
          {{__('PDV')}}
        </a>  
        <a class="btn btn-ghost btn-sm rounded-btn {{request()->routeIs('productos')?'btn-active':''}}" href="{{route('productos')}}">
                {{__('Products')}}
        </a> 
        <a class="btn btn-ghost btn-sm rounded-btn {{request()->routeIs('cotizaciones')?'btn-active':''}}" href="{{route('cotizaciones')}}">
                {{__('Quotation')}}
        </a> 
        <a class="btn btn-ghost btn-sm rounded-btn {{request()->routeIs('proveedores')?'btn-active':''}}" href="{{route('proveedores')}}">
          {{__('Vendors')}}
        </a>
        <div class="dropdown dropdown-end">
          <a tabindex="0" class="btn btn-ghost btn-sm rounded-btn {{ str_contains(request()->path(),'contabilidad')?'btn-active':''}}" >Contabilidad</a> 
          <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li>
              <a href="{{route('deudas')}}">Deudas</a>
            </li> 
            <li>
              <a>Estado de resultados</a>
            </li> 
          </ul>
        </div>
      </div>
    </div> 
    <div class="navbar-end">
        <div class="flex-none">
        @if(!empty(Auth::user()->profile_photo_path))
            <div class="avatar">
              <div class="rounded-full w-10 h-10 m-1">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
              </div>
            </div>
        @else
            <div class="avatar placeholder">
                <div class="bg-neutral text-neutral-content rounded-full w-10 h-10 m-1">
                  <span>{{ strtoupper(substr(Auth::user()->name,0,2)) }}</span>
                </div>
            </div>
        @endif
        </div>  
        <form method="POST" action="{{ route('logout') }}" class="dropdown dropdown-end">
            <div tabindex="0" class="m-1 btn btn-ghost btn-sm">
                {{ Auth::user()->name }}
            </div> 
            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-40">
              <li>
                <a href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
              </li> 
              <li>
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();">{{ __('Log Out') }}</a>
              </li> 
            </ul>
        </form>
    </div>
  </div>