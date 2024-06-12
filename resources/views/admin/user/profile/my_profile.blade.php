<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{$title}}
    </x-slot:pageTitle>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        {{-- @vite(['resources/scss/light/assets/components/timeline.scss']) --}}
        <link rel="stylesheet" href="{{asset('plugins/filepond/filepond.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/filepond/FilePondPluginImagePreview.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/sweetalerts2/sweetalerts2.css')}}">

        @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/scss/light/assets/components/tabs.scss'])
        @vite(['resources/scss/light/assets/elements/alert.scss'])
        @vite(['resources/scss/light/plugins/sweetalerts2/custom-sweetalert.scss'])
        @vite(['resources/scss/light/plugins/notification/snackbar/custom-snackbar.scss'])
        @vite(['resources/scss/light/assets/forms/switches.scss'])
        @vite(['resources/scss/light/assets/components/list-group.scss'])
        @vite(['resources/scss/light/assets/users/account-setting.scss'])

        @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/scss/dark/assets/components/tabs.scss'])
        @vite(['resources/scss/dark/assets/elements/alert.scss'])
        @vite(['resources/scss/dark/plugins/sweetalerts2/custom-sweetalert.scss'])
        @vite(['resources/scss/dark/plugins/notification/snackbar/custom-snackbar.scss'])
        @vite(['resources/scss/dark/assets/forms/switches.scss'])
        @vite(['resources/scss/dark/assets/components/list-group.scss'])
        @vite(['resources/scss/dark/assets/users/account-setting.scss'])

        <!--  END CUSTOM STYLE FILE  -->
    </x-slot:headerFiles>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BREADCRUMB -->
    <x-custom.breadcrumb :breadcrumb-items="[__('User') => '', $title => '']"/>
    <!-- /BREADCRUMB -->

    <div class="layout-top-spacing">
        <div class="row mb-3">
            <div class="col-md-12">
                <h2 @class(['text-capitalize'])>{{ $title }}</h2>
            </div>
        </div>
    </div>

    <div class="account-settings-container">
        <div class="account-content">
            <div class="row mb-3">
                <div class="col-md-12">
                    <ul class="nav nav-pills" id="animateLine" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="animated-underline-home-tab"
                                    data-bs-toggle="tab" href="#animated-underline-home" role="tab"
                                    aria-controls="animated-underline-home" aria-selected="true">
                                <i data-feather="home"></i>
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="animated-underline-profile-tab" data-bs-toggle="tab"
                                    href="#animated-underline-profile" role="tab"
                                    aria-controls="animated-underline-profile" aria-selected="false"
                                    tabindex="-1">
                                <i data-feather="dollar-sign"></i>
                                Payment Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="animated-underline-preferences-tab"
                                    data-bs-toggle="tab" href="#animated-underline-preferences" role="tab"
                                    aria-controls="animated-underline-preferences" aria-selected="false"
                                    tabindex="-1">
                                <i data-feather="user"></i>
                                Preferences
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="animated-underline-contact-tab" data-bs-toggle="tab"
                                    href="#animated-underline-contact" role="tab"
                                    aria-controls="animated-underline-contact" aria-selected="false"
                                    tabindex="-1">
                                <i data-feather="phone"></i>
                                Danger Zone
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                     aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form class="section general-info">
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="profile-image  mt-4 pe-md-4">
                                                        <div class="img-uploader-content">
                                                            <input type="file" class="filepond"
                                                                   name="filepond"
                                                                   accept="image/png, image/jpeg, image/gif"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-form.form-layout
                                                    :custom-col="'col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4'"
                                                    :form-url="route('admin.user.my_profile')"
                                                    :form-method="'POST'"
                                                    :form-id="'update-my-profile'"
                                                >
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <x-form.form-input
                                                                    :label="'First Name'"
                                                                    :id="'first_name'"
                                                                    :name="'first_name'"
                                                                    :placeholder="'First Name'"
                                                                    :value="auth()->user()->first_name"
                                                                />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <x-form.form-input
                                                                    :label="'Last Name'"
                                                                    :id="'last_name'"
                                                                    :name="'last_name'"
                                                                    :placeholder="'Last Name'"
                                                                    :value="auth()->user()->last_name"
                                                                />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <x-form.form-input
                                                                    :label="'Phone Number'"
                                                                    :id="'phone_number'"
                                                                    :name="'phone_number'"
                                                                    :placeholder="'Write your phone number here'"
                                                                    :value="auth()->user()->phone_number"
                                                                />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <x-form.form-input
                                                                    :label="'Email'"
                                                                    :id="'email'"
                                                                    :name="'email'"
                                                                    :placeholder="'Write your email here'"
                                                                    :value="auth()->user()->email"
                                                                />
                                                            </div>
                                                            <div class="col-md-12 mt-1">
                                                                <div class="form-group text-end">
                                                                    <x-buttons.submit :label="__('Save')"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </x-form.form-layout>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="animated-underline-profile" role="tabpanel"
                     aria-labelledby="animated-underline-profile-tab">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Billing Address</h6>
                                    <p>Changes to your <span class="text-success">Billing</span> information
                                        will take effect starting with scheduled payment and will be refelected
                                        on your next invoice.</p>

                                    <div class="list-group mt-4">
                                        <label class="list-group-item">
                                            <div class="d-flex w-100">
                                                <div class="billing-radio me-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="billingAddress" id="billingAddress1"
                                                               checked>
                                                    </div>
                                                </div>
                                                <div class="billing-content">
                                                    <div class="fw-bold">Address #1</div>
                                                    <p>2249 Caynor Circle, New Brunswick, New Jersey</p>
                                                </div>
                                                <div class="billing-edit align-self-center ms-auto">
                                                    <button class="btn btn-dark">Edit</button>
                                                </div>
                                            </div>
                                        </label>

                                        <label class="list-group-item">
                                            <div class="d-flex w-100">
                                                <div class="billing-radio me-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="billingAddress" id="billingAddress2">
                                                    </div>
                                                </div>
                                                <div class="billing-content">
                                                    <div class="fw-bold">Address #2</div>
                                                    <p>4262 Leverton Cove Road, Springfield, Massachusetts</p>
                                                </div>
                                                <div class="billing-edit align-self-center ms-auto">
                                                    <button class="btn btn-dark">Edit</button>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="list-group-item">
                                            <div class="d-flex w-100">
                                                <div class="billing-radio me-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="billingAddress" id="billingAddress3">
                                                    </div>
                                                </div>
                                                <div class="billing-content">
                                                    <div class="fw-bold">Address #3</div>
                                                    <p>2692 Berkshire Circle, Knoxville, Tennessee</p>
                                                </div>
                                                <div class="billing-edit align-self-center ms-auto">
                                                    <button class="btn btn-dark">Edit</button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <button class="btn btn-secondary mt-4 add-address">Add Address</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Payment Method</h6>
                                    <p>Changes to your <span class="text-success">Payment Method</span>
                                        information will take effect starting with scheduled payment and will be
                                        refelected on your next invoice.</p>

                                    <div class="list-group mt-4">

                                        <label class="list-group-item">
                                            <div class="d-flex w-100">
                                                <div class="billing-radio me-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="paymentMethod" id="paymentMethod1">
                                                    </div>
                                                </div>
                                                <div class="payment-card">
                                                    <img
                                                        src="{{Vite::asset('resources/images/card-mastercard.svg')}}"
                                                        class="align-self-center me-3" alt="americanexpress">
                                                </div>
                                                <div class="billing-content">
                                                    <div class="fw-bold">Mastercard</div>
                                                    <p>XXXX XXXX XXXX 9704</p>
                                                </div>
                                                <div class="billing-edit align-self-center ms-auto">
                                                    <button class="btn btn-dark">Edit</button>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="list-group-item">
                                            <div class="d-flex w-100">
                                                <div class="billing-radio me-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="paymentMethod" id="paymentMethod2" checked>
                                                    </div>
                                                </div>
                                                <div class="payment-card">
                                                    <img
                                                        src="{{Vite::asset('resources/images/card-americanexpress.svg')}}"
                                                        class="align-self-center me-3" alt="americanexpress">
                                                </div>
                                                <div class="billing-content">
                                                    <div class="fw-bold">American Express</div>
                                                    <p>XXXX XXXX XXXX 310</p>
                                                </div>
                                                <div class="billing-edit align-self-center ms-auto">
                                                    <button class="btn btn-dark">Edit</button>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="list-group-item">
                                            <div class="d-flex w-100">
                                                <div class="billing-radio me-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="paymentMethod" id="paymentMethod3">
                                                    </div>
                                                </div>
                                                <div class="payment-card">
                                                    <img src="{{Vite::asset('resources/images/card-visa.svg')}}"
                                                         class="align-self-center me-3" alt="americanexpress">
                                                </div>
                                                <div class="billing-content">
                                                    <div class="fw-bold">Visa</div>
                                                    <p>XXXX XXXX XXXX 5264</p>
                                                </div>
                                                <div class="billing-edit align-self-center ms-auto">
                                                    <button class="btn btn-dark">Edit</button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <button class="btn btn-secondary mt-4 add-payment">Add Payment Method
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Add Billing Address</h6>
                                    <p>Changes your New <span class="text-success">Billing</span> Information.
                                    </p>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text"
                                                       class="form-control add-billing-address-input">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <select class="form-select">
                                                    <option selected="">Choose...</option>
                                                    <option value="united-states">United States</option>
                                                    <option value="brazil">Brazil</option>
                                                    <option value="indonesia">Indonesia</option>
                                                    <option value="turkey">Turkey</option>
                                                    <option value="russia">Russia</option>
                                                    <option value="india">India</option>
                                                    <option value="germany">Germany</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">ZIP</label>
                                                <input type="tel" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mt-4">Add</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Add Payment Method</h6>
                                    <p>Changes your New <span class="text-success">Payment Method</span>
                                        Information.</p>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Card Brand</label>
                                                <div class="invoice-action-currency">
                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                        <a id="cardBrandDropdown" href="javascript:void(0);"
                                                           class="dropdown-toggle" data-bs-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false"><img
                                                                src="{{Vite::asset('resources/images/card-mastercard.svg')}}"
                                                                class="flag-width" alt="flag"> <span
                                                                class="selectable-text">Mastercard</span> <span
                                                                class="selectable-arrow"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="feather feather-chevron-down"><polyline
                                                                        points="6 9 12 15 18 9"></polyline></svg></span></a>
                                                        <div class="dropdown-menu"
                                                             aria-labelledby="cardBrandDropdown">
                                                            <a class="dropdown-item"
                                                               data-img-value="{{Vite::asset('resources/images/card-mastercard.svg')}}"
                                                               data-value="GBP - British Pound"
                                                               href="javascript:void(0);"><img
                                                                    src="{{Vite::asset('resources/images/card-mastercard.svg')}}"
                                                                    class="flag-width" alt="flag">
                                                                Mastercard</a>
                                                            <a class="dropdown-item"
                                                               data-img-value="{{Vite::asset('resources/images/card-americanexpress.svg')}}"
                                                               data-value="IDR - Indonesian Rupiah"
                                                               href="javascript:void(0);"><img
                                                                    src="{{Vite::asset('resources/images/card-americanexpress.svg')}}"
                                                                    class="flag-width" alt="flag"> American
                                                                Express</a>
                                                            <a class="dropdown-item"
                                                               data-img-value="{{Vite::asset('resources/images/card-visa.svg')}}"
                                                               data-value="USD - US Dollar"
                                                               href="javascript:void(0);"><img
                                                                    src="{{Vite::asset('resources/images/card-visa.svg')}}"
                                                                    class="flag-width" alt="flag"> Visa</a>
                                                            <a class="dropdown-item"
                                                               data-img-value="{{Vite::asset('resources/images/card-discover.svg')}}"
                                                               data-value="INR - Indian Rupee"
                                                               href="javascript:void(0);"><img
                                                                    src="{{Vite::asset('resources/images/card-discover.svg')}}"
                                                                    class="flag-width" alt="flag"> Discover</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Card Number</label>
                                                <input type="text"
                                                       class="form-control add-payment-method-input">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Holder Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">CVV/CVV2</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Card Expiry</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mt-4">Add</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="animated-underline-preferences" role="tabpanel"
                     aria-labelledby="animated-underline-preferences-tab">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Choose Theme</h6>
                                    <div class="d-sm-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                   id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <img class="ms-3" width="100" height="68" alt="settings-dark"
                                                     src="{{Vite::asset('resources/images/settings-light.svg')}}">
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                   id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                <img class="ms-3" width="100" height="68" alt="settings-light"
                                                     src="{{Vite::asset('resources/images/settings-dark.svg')}}">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Activity data</h6>
                                    <p>Download your Summary, Task and Payment History Data</p>
                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary">Download Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Public Profile</h6>
                                    <p>Your <span class="text-success">Profile</span> will be visible to anyone
                                        on the network.</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="publicProfile" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Show my email</h6>
                                    <p>Your <span class="text-success">Email</span> will be visible to anyone on
                                        the network.</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="showMyEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Enable keyboard shortcuts</h6>
                                    <p>When enabled, press <code class="text-success">ctrl</code> for help</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="EnableKeyboardShortcut">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Hide left navigation</h6>
                                    <p>Sidebar will be <span class="text-success">hidden</span> by default</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="hideLeftNavigation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Advertisements</h6>
                                    <p>Display <span class="text-success">Ads</span> on your dashboard</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="advertisements">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Social Profile</h6>
                                    <p>Enable your <span class="text-success">social</span> profiles on this
                                        network</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="socialprofile" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="animated-underline-contact" role="tabpanel"
                     aria-labelledby="animated-underline-contact-tab">
                    <div
                        class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4"
                        role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-alert-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12" y2="16"></line>
                        </svg>
                        <strong>Warning!</strong> Please proceed with caution. For any assistance - <a
                            href="javascript:void(0);">Contact Us</a>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Purge Cache</h6>
                                    <p>Remove the active resource from the cache without waiting for the
                                        predetermined cache expiry time.</p>
                                    <div class="form-group mt-4">
                                        <button class="btn btn-secondary btn-clear-purge">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Deactivate Account</h6>
                                    <p>You will not be able to receive messages, notifications for up to 24
                                        hours.</p>
                                    <div class="form-group mt-4">
                                        <div
                                            class="switch form-switch-custom switch-inline form-switch-success mt-1">
                                            <input class="switch-input" type="checkbox" role="switch"
                                                   id="socialformprofile-custom-switch-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Delete Account</h6>
                                    <p>Once you delete the account, there is no going back. Please be
                                        certain.</p>
                                    <div class="form-group mt-4">
                                        <button class="btn btn-danger btn-delete-account">Delete my account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        <script src="{{asset('plugins/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginFileValidateType.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageExifOrientation.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImagePreview.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageCrop.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageResize.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageTransform.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/filepondPluginFileValidateSize.min.js')}}"></script>

        <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
        <script src="{{asset('plugins/sweetalerts2/sweetalerts2.min.js')}}"></script>

        @vite(['resources/assets/js/users/account-settings.js'])

        <script type="module">
            userProfile.addFiles("{{Vite::asset('resources/images/user-profile.jpeg')}}");
        </script>

    </x-slot:footerFiles>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
