@extends('layouts.app', ['title' => __('Menu Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Menu')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Menu Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('menu.store') }}" autocomplete="off">
                            @csrf

                            <!-- <h6 class="heading-small text-muted mb-4">{{ __('supplier information') }}</h6> -->
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-type">{{ __('Raw Material') }}</label>

                                    <select name="id_type" id="" class="form-control">
                                        <option value="">-- Choose Material --</option>
                                        @foreach ($types as $t)
                                            <option value="{{ $t->id }}">{{ $t->nama }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('jumlah_bahan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jumlah_bahan">{{ __('Amount Of Ingridients (Gram)') }}</label>
                                    <input type="number" name="jumlah_bahan" id="input-jumlah_bahan"
                                    class="form-control form-control-alternative{{ $errors->has('jumlah_bahan') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Amount Of Ingridients') }}" value="{{ old('jumlah_bahan') }}" required autofocus>

                                    @if ($errors->has('jumlah_bahan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jumlah_bahan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price">{{ __('Price (Rp)') }}</label>
                                    <input type="number" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Price') }}" value="{{ old('price') }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
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
