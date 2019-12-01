@extends('layouts.app', ['title' => __('Type Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Type')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('type.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('type.update', $type) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <!-- <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6> -->
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nama">{{ __('Name') }}</label>
                                    <input type="text" name="nama" id="input-nama"
                                    class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('nama') }}" value="{{ $type->nama }}" required autofocus>

                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Supplier</label>
                                    <select name="id_supplier" id="" class="form-control">
                                        <option value="{{ $type->id_supplier }}">{{ $type->supplier->nama }}</option>
                                        @foreach ($suppliers as $s)
                                            @if ($s->id != $type->id_supplier)
                                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>





                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock">{{ __('Stock (gram)') }}</label>
                                    <input type="number" name="stock" id="input-stock" class="form-control form-control-alternative{{ $errors->has('stock') ? ' is-invalid' : '' }}" placeholder="{{ __('stock') }}" value="{{ $type->stock }}" required autofocus>

                                    @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>

                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-description"
                                    class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('description') }}" value="{{ $type->description }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
