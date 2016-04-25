
@if(Auth::user()->tipouser->nombre == 'Basico' )
    @include('profile.layouts.partials.sidebar')
@elseif(Auth::user()->tipouser->nombre == 'Consulta')
    @include('consulta.layouts.partials.sidebar')
@elseif(Auth::user()->tipouser->nombre == 'Gestor')
    @include('profile.layouts.partials.sidebar')
@elseif(Auth::user()->tipouser->nombre == 'Admon')
    @include('admin.layouts.partials.sidebar')
@endif