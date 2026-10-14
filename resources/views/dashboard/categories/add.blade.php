@extends('dashboard.master')

@section('content')

<div class="card pd-20 pd-sm-40">

    <div class="row row-sm mg-t-20">

        <div class="col-xl-6">

            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

                <h6 class="card-body-title">Add Category</h6>

                <p class="mg-b-20 mg-sm-b-30">
                    Add a new category.
                </p>

                <form action="{{ route('categories.store') }}" method="POST">

                    @csrf

                    <div class="row">
                        <label class="col-sm-4 form-control-label">
                            Name: <span class="tx-danger">*</span>
                        </label>

                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter name"
                                value="{{ old('name') }}"
                            >

                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30">

                        <button type="submit" class="btn btn-info mg-r-5">
                            Submit Form
                        </button>

                        <a href="{{ route('categories.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection