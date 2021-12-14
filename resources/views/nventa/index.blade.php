@extends('layouts.app')

@section('template_title')
    Nventa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Nventa') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('nventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>
										<th>Precio</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nventas as $nventa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $nventa->descripcion }}</td>
											<td>{{ $nventa->precio }}</td>
											<td>{{ $nventa->cantidad }}</td>

                                            <td>
                                                <form action="{{ route('nventas.destroy',$nventa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('nventas.show',$nventa->id) }}"><i class="fa fa-fw fa-eye"></i>Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('nventas.edit',$nventa->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Elimiar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $nventas->links() !!}
            </div>
        </div>
    </div>
@endsection
