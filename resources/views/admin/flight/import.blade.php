@extends('admin.layout')

@section('content2')
<section id="contact">
    <div class="container">
        <header class="text-center mb-5">
            <h2 class="text-uppercase lined">Jadwal</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('status.import')}}" method="POST" class="contact-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Excel *</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-outline-primary w-100">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
