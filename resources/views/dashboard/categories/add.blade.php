@extends('dashboard.master')
@section('content')
<div class="card pd-20 pd-sm-40">

<div class="row row-sm mg-t-20">
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Add Category</h6>
              <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p>
              <div class="row">
                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter name">
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Order: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter order">
                </div>
              </div>
              
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" placeholder="Enter your address"></textarea>
                </div>
              </div>
              <div class="form-layout-footer mg-t-30">
                <button class="btn btn-info mg-r-5">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        
        </div><!-- row -->
        <div>
@endsection