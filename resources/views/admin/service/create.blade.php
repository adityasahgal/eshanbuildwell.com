@extends('layouts.admin')

@push('style')
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
<style>
    .img-upload-preview {
        border: 2px dashed #ddd;
        height: 180px;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
        margin-bottom: 10px;
    }
    .img-upload-preview .close-btn {
        right: 5px; top: 5px;
        background: #e74c3c;
        border-radius: 4px;
        width: 28px; height: 28px;
        line-height: 28px;
        text-align: center;
        text-decoration: none;
        color: #fff;
        position: absolute;
        padding: 0;
    }
</style>
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session('status'))
                <script>
                    Swal.fire({ icon: '<?= Session('status') ?>', title: '<?= Session('status') ?>', text: '<?= Session('message') ?>' });
                </script>
                @endif

                <div class="card card-primary card-outline">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Add New Service</h4>
                        <a href="{{ route('service.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>

                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            {{-- Name + Badge --}}
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">Service Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. Building Construction">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="service_badge">Card Badge</label>
                                    <input type="text" class="form-control" name="service_badge" id="service_badge" value="{{ old('service_badge') }}" placeholder="e.g. Construction">
                                </div>
                            </div>

                            {{-- CTA --}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="service_cta_text">CTA Button Text</label>
                                    <input type="text" class="form-control" name="service_cta_text" value="{{ old('service_cta_text', 'Get in touch') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="service_page_order">Display Order</label>
                                    <input type="number" class="form-control" name="service_page_order" value="{{ old('service_page_order', 1) }}" min="1">
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="show_on_services_page" name="show_on_services_page" {{ old('show_on_services_page', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="show_on_services_page">Show on Page</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="service_cta_link">CTA Link</label>
                                    <input type="text" class="form-control" name="service_cta_link" value="{{ old('service_cta_link', url('contact-us')) }}">
                                </div>
                            </div>

                            {{-- Thumbnail --}}
                            <div class="form-group">
                                <label>Thumbnail Image</label>
                                <div class="row" id="thumbnail_img"></div>
                            </div>

                            {{-- Highlights --}}
                            <div class="form-group">
                                <label for="service_card_points">Card Highlights <small class="text-muted">(one per line)</small></label>
                                <textarea class="form-control" name="service_card_points" rows="4" placeholder="Residential, Commercial & Industrial&#10;Turnkey Construction Solutions&#10;Quality Control">{{ old('service_card_points') }}</textarea>
                            </div>

                            {{-- Short Description --}}
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control" name="short_description" rows="3" placeholder="Brief summary shown on the service card...">{{ old('short_description') }}</textarea>
                            </div>

                            {{-- Full Description --}}
                            <div class="form-group">
                                <label>Full Description</label>
                                <textarea id="description_editor" name="description">{{ old('description') }}</textarea>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('service.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary submitBtn">
                                <i class="fas fa-save"></i> Save Service
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ url('admin/js/multi-image-picker-min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#thumbnail_img').spartanMultiImagePicker({
            fieldName: 'thumbnail_img',
            maxCount: 1,
            rowHeight: '180px',
            groupClassName: 'col-md-4',
            dropFileLabel: 'Drop image here or click',
            onExtensionErr: function () { alert('Only PNG/JPG allowed.'); },
            onSizeErr: function () { alert('File too large.'); }
        });

        $('#description_editor').summernote({ height: 220 });

        // Disable button AFTER form starts submitting to prevent double-submit
        // Using form submit event — NOT button click (click disables before submit fires)
        $('form').on('submit', function () {
            $('.submitBtn').attr('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        });
    });
</script>
@endpush