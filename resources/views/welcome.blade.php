@extends('layouts.app')

@section('content')

    <div id="carrousel" class="carousel slide pb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="{{URL::asset('img/banner.jpg')}}" alt="imagen instituto">
            </div>

        </div>

    </div>

    <div class="container">
        <div class="row pb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fa fa-tags"></i> Categorias</div>
                    <div class="card-body text-center">
                        @foreach ($categories as $category)
                            @if(empty($categorySelected))
                                <a href="{{route('home.searchcategory',$category->slug)}}" class="btn btn-link">{{$category->name}}</a>
                            @else
                                @if($category->id == $categorySelected->id)
                                <a href="{{route('home.searchcategory',$category->slug)}}" class="btn btn-link font-weight-bold">{{$category->name}}</a>
                                 @else
                                    <a href="{{route('home.searchcategory',$category->slug)}}" class="btn btn-link">{{$category->name}}</a>

                                @endif
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-8 pb-4">

                <div class="card">
                    <div class="card-header"><i class="fa fa-list"></i> Últimas ofertas de trabajo</div>
                    <div class="card-body">

                        @forelse($jobOffers as $job_offer)

                            <div class="card b-1 hover-shadow mb-5">
                                <div class="media card-body">

                                    <div class="media-body">
                                        <div class="mb-2">
                                            <h4>
                                                <a href="{{route('joboffers.show',$job_offer->id)}}">{{$job_offer->name}}</a>
                                            </h4>

                                        </div>

                                        <div class="d-block">
                                            <p class="fs-14 text-fade mb-12">Fecha: <span
                                                    class="badge badge-primary">{{$job_offer->created_at}}</span> |
                                                Jornada: <span
                                                    class="badge badge-primary">{{$job_offer->type_working}}</span> |
                                                Salario: <span
                                                    class="badge badge-primary">{{$job_offer->salary}} €</span></p>

                                        </div>


                                        <small
                                            class="fs-16 fw-300 ls-1">{{str_limit($job_offer->description, $limit = 350, $end = '...')}}</small>
                                    </div>

                                </div>

                                <footer class="card-footer text-right">

                                    <div class="card-hover-show">
                                        <a class="btn btn-xs fs-10 btn-bold btn-primary"
                                           href="{{route('joboffers.show',$job_offer->id)}}"><i class="fa fa-info-circle"></i> Más información</a>

                                    </div>
                                </footer>
                            </div>
                            @empty
                                <span>Vaya, no hemos encontrado ninguna oferta de trabajo.</span>
                            @endforelse
                        {!! $jobOffers->links() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card mb-4">
                    <div class="card-header">Acerca de</div>
                    <div class="card-body">
                        <p>Bienvenido a la Bolsa de Empleo de I.E.S Comercio.
                            Este servicio es gratuito y ofrecido a los alumnos de nuestro centro.
                            Gracias por usar nuestro buscador de empleo</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header"><i class="fa fa-filter"></i> Filtro de búsqueda</div>
                    <div class="card-body">


                        <form action="{{route('home.search')}}" role="search" method="GET">
                            <div class="form-group">
                                <label for="searchInput" >Palabra clave</label>
                                <input type="text" name="name" class="form-control input-sm" id="searchInput"
                                       placeholder="Ej: Java">
                            </div>
                            <div class="form-group">
                                <label for="category" >Categoria</label>
                                <select class="form-control" id="categories" name="categories">
                                    <option value="all" selected>Todas</option>
                                @foreach($categories as  $key => $categorie)
                                        <option value="{{$categorie->id }}" {{ (collect(old('categories'))->contains($categorie->id)) ? 'selected':'' }}>{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="typeworking" >Jornada</label>
                                <select class="form-control" id="type_working"  name="type_working">
                                    <option value="all" selected>Todas</option>

                                @foreach($typeworking as $key => $type)
                                        <option value="{{$key}}" @if(old('type_working') == $key) {{ 'selected' }} @endif>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="minprice">Salario Min</label>
                                    <input type="number" name="minprice" class="form-control input-sm" id="minprice"
                                           placeholder="0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="maxprice">Salario Max</label>
                                    <input type="number" name="maxprice" class="form-control input-sm" id="maxprice"
                                           placeholder="0">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-xs fs-10 btn-bold btn-success btn-block"><i class="fa fa-search"></i> Buscar</button>
                        </form>

                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Redes sociales</div>
                    <div class="card-body text-center">
                        <a class="btn btn-social-icon btn-twitter ">
                            <span class ="fa fa-twitter text-white"> </span>
                        </a>

                        <a class="btn btn-social-icon btn-facebook ">
                            <span class ="fa fa-facebook text-white"> </span>
                        </a>

                        <a class="btn btn-social-icon btn-linkedin ">
                            <span class ="fa fa-linkedin text-white"> </span>
                        </a>

                        <a class="btn btn-social-icon btn-instagram ">
                            <span class ="fa fa-instagram text-white"> </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
