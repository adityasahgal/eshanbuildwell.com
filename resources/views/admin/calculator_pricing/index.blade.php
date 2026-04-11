@extends('layouts.admin')
@push('style')
<style>
    .pricing-card {
        border-left: 4px solid #007bff;
    }
    .pricing-card .card-header {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .pricing-badge {
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 20px;
    }
    .badge-basic    { background: #6c757d; color: #fff; }
    .badge-standard { background: #17a2b8; color: #fff; }
    .badge-premium  { background: #ffc107; color: #000; }
    .input-group-text { min-width: 50px; justify-content: center; }
    .section-divider { border-top: 2px dashed #dee2e6; margin: 1.5rem 0; }
</style>
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">

        {{-- Flash Messages --}}
        @if(Session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: '{{ Session("status") }}',
                    title: '{{ Session("status") == "success" ? "Success!" : "Error!" }}',
                    text: '{{ Session("message") }}',
                    timer: 3000,
                    showConfirmButton: false,
                });
            });
        </script>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Page Header --}}
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0">
                    <i class="fas fa-calculator mr-2 text-primary"></i>
                    Calculator Pricing Manager
                </h4>
                <small class="text-muted">Manage per sqft rates used in the frontend cost calculator.</small>
            </div>
        </div>

        <form action="{{ route('calculator-pricing.update') }}" method="POST">
            @csrf

            <div class="row">

                {{-- ========================
                     STRUCTURE RATES
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-primary pricing-card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-building mr-2"></i>Structure Rates
                                <small class="text-muted font-weight-normal">(₹ / sqft)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach(['basic' => 'Basic', 'standard' => 'Standard', 'premium' => 'Premium'] as $key => $label)
                            <div class="form-group">
                                <label>
                                    <span class="pricing-badge badge-{{ $key }}">{{ $label }}</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="number" name="structure_{{ $key }}"
                                           class="form-control"
                                           value="{{ old('structure_'.$key, $pricing->{'structure_'.$key}) }}"
                                           min="0" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">/sqft</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ========================
                     FINISHING RATES
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-info pricing-card mb-4" style="border-left-color:#17a2b8;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-paint-roller mr-2"></i>Finishing Rates
                                <small class="text-muted font-weight-normal">(₹ / sqft)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach(['basic' => 'Basic', 'standard' => 'Standard', 'premium' => 'Premium'] as $key => $label)
                            <div class="form-group">
                                <label>
                                    <span class="pricing-badge badge-{{ $key }}">{{ $label }}</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="number" name="finishing_{{ $key }}"
                                           class="form-control"
                                           value="{{ old('finishing_'.$key, $pricing->{'finishing_'.$key}) }}"
                                           min="0" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">/sqft</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ========================
                     MEP RATES
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-warning pricing-card mb-4" style="border-left-color:#ffc107;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-bolt mr-2"></i>MEP Rates
                                <small class="text-muted font-weight-normal">(₹ / sqft)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach(['basic' => 'Basic', 'standard' => 'Standard', 'premium' => 'Premium'] as $key => $label)
                            <div class="form-group">
                                <label>
                                    <span class="pricing-badge badge-{{ $key }}">{{ $label }}</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="number" name="mep_{{ $key }}"
                                           class="form-control"
                                           value="{{ old('mep_'.$key, $pricing->{'mep_'.$key}) }}"
                                           min="0" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">/sqft</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ========================
                     FACADE RATES
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-success pricing-card mb-4" style="border-left-color:#28a745;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-layer-group mr-2"></i>Facade Rates
                                <small class="text-muted font-weight-normal">(₹ / sqft)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach(['basic' => 'Basic', 'standard' => 'Standard', 'premium' => 'Premium'] as $key => $label)
                            <div class="form-group">
                                <label>
                                    <span class="pricing-badge badge-{{ $key }}">{{ $label }}</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="number" name="facade_{{ $key }}"
                                           class="form-control"
                                           value="{{ old('facade_'.$key, $pricing->{'facade_'.$key}) }}"
                                           min="0" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">/sqft</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ========================
                     EXTERNAL RATES
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-secondary pricing-card mb-4" style="border-left-color:#6c757d;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-road mr-2"></i>External Development Rates
                                <small class="text-muted font-weight-normal">(₹ / sqft)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach(['basic' => 'Basic', 'standard' => 'Standard', 'premium' => 'Premium'] as $key => $label)
                            <div class="form-group">
                                <label>
                                    <span class="pricing-badge badge-{{ $key }}">{{ $label }}</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₹</span>
                                    </div>
                                    <input type="number" name="external_{{ $key }}"
                                           class="form-control"
                                           value="{{ old('external_'.$key, $pricing->{'external_'.$key}) }}"
                                           min="0" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">/sqft</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ========================
                     LOCATION MULTIPLIERS
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-danger pricing-card mb-4" style="border-left-color:#dc3545;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-map-marker-alt mr-2"></i>Location Multipliers
                                <small class="text-muted font-weight-normal">(e.g. 1.10 = +10%)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach(['metro' => 'Metro City', 'urban' => 'Urban / Tier-2', 'hill' => 'Hill / Remote'] as $key => $label)
                            <div class="form-group">
                                <label class="font-weight-500">{{ $label }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-times-circle"></i></span>
                                    </div>
                                    <input type="number" name="location_{{ $key }}"
                                           class="form-control"
                                           value="{{ old('location_'.$key, $pricing->{'location_'.$key}) }}"
                                           step="0.01" min="0.5" max="3" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">×</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ========================
                     BASEMENT MULTIPLIER
                ========================= --}}
                <div class="col-md-6">
                    <div class="card card-outline card-pink pricing-card mb-4" style="border-left-color:#e91e8c;">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-layer-group mr-2"></i>Basement Cost Multiplier
                                <small class="text-muted font-weight-normal">(× structure rate)</small>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-500">
                                    Basement Multiplier
                                    <small class="text-muted d-block mt-1">e.g. <strong>1.5</strong> means basement costs 1.5× the normal structure rate per sqft.<br>Basement area is auto-set to Plot Area when basement is selected.</small>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-times-circle"></i></span>
                                    </div>
                                    <input type="number" name="basement_multiplier"
                                           class="form-control"
                                           value="{{ old('basement_multiplier', $pricing->basement_multiplier) }}"
                                           step="0.05" min="1" max="5" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">× rate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- end .row --}}

            {{-- Submit Button --}}
            <div class="row">
                <div class="col-12 text-right mb-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-save mr-2"></i>Save All Prices
                    </button>
                </div>
            </div>

        </form>

    </div>
</section>
@endsection

@push('script')
<script>
    // Confirm before save
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        Swal.fire({
            icon: 'question',
            title: 'Update Prices?',
            text: 'This will update all calculator rates visible on the frontend.',
            showCancelButton: true,
            confirmButtonText: 'Yes, Update',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#007bff',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
@endpush
