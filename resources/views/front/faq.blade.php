@extends("layouts.front")
@section("title", "Haqqımızda")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Tez-Tez Verilən Suallar",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "TVS",
                "url" => route("front.faq")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    <div class="section-full p-t120  p-b90 site-bg-white">

        <div class="container">

            <div class="section-content">
                <div class="twm-tabs-style-1 center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#General" type="button" role="tab" >General</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Jobs" type="button" role="tab" aria-controls="Jobs">Jobs</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Payment" type="button" role="tab" aria-controls="Payment">Payment</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Return" type="button" role="tab" aria-controls="Return">Return</button>
                      </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!--Tabs content one-->
                        <div class="tab-pane fade show active" id="General" role="tabpanel">
                            <div class="tw-faq-section">
                                <div class="accordion tw-faq" id="sf-faq-accordion">
                                    <!--One-->
                                    <div class="accordion-item">

                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#FAQ1">
                                            Where is my job posting advertised?
                                        </button>

                                        <div id="FAQ1" class="accordion-collapse collapse show" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                            A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>

                                    </div>

                                    <!--Two-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2" aria-expanded="false">
                                            What Makes Your Business Plans So Special?
                                        </button>

                                        <div id="FAQ2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>

                                    </div>

                                    <!--Three-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3" aria-expanded="false">
                                            Reset Password With Phone Number?
                                        </button>

                                        <div id="FAQ3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--Four-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4" aria-expanded="false">
                                            How do I redeem a coupon?
                                        </button>

                                        <div id="FAQ4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--Five-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5" aria-expanded="false">
                                            How long will it take to post my job?
                                        </button>

                                        <div id="FAQ5" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--Six-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ6" aria-expanded="false">
                                            What is your cancellation policy?
                                        </button>

                                        <div id="FAQ6" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--Seven-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ7" aria-expanded="false">
                                            Where Can I Find Market Research Reports?
                                        </button>

                                        <div id="FAQ7" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--Eight-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ8" aria-expanded="false">
                                            Do I need to know PHP to use TheJobs?
                                        </button>

                                        <div id="FAQ8" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--Nine-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ9" aria-expanded="false">
                                            How soon will I start receiving resumes?
                                        </button>

                                        <div id="FAQ9" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Tabs content two-->
                        <div class="tab-pane fade" id="Jobs" role="tabpanel">
                            <div class="tw-faq-section">
                                <div class="accordion tw-faq" id="sf-faq-accordion-2">

                                    <!--one-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ1-2" aria-expanded="false">
                                            How do I redeem a coupon?
                                        </button>

                                        <div id="FAQ1-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--two-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2-2" aria-expanded="false">
                                            How long will it take to post my job?
                                        </button>

                                        <div id="FAQ2-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--three-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3-2" aria-expanded="false">
                                            What is your cancellation policy?
                                        </button>

                                        <div id="FAQ3-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--four-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4-2" aria-expanded="false">
                                            Where Can I Find Market Research Reports?
                                        </button>

                                        <div id="FAQ4-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--five-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5-2" aria-expanded="false">
                                            Do I need to know PHP to use TheJobs?
                                        </button>

                                        <div id="FAQ5-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--six-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ6-2" aria-expanded="false">
                                            How soon will I start receiving resumes?
                                        </button>

                                        <div id="FAQ6-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Tabs content three-->
                        <div class="tab-pane fade" id="Payment" role="tabpanel" >
                            <div class="tw-faq-section">
                                <div class="accordion tw-faq" id="sf-faq-accordion-3">


                                    <!--one-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ1-3" aria-expanded="false">
                                            What Makes Your Business Plans So Special?
                                        </button>

                                        <div id="FAQ1-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>

                                    </div>

                                    <!--two-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2-3" aria-expanded="false">
                                            Reset Password With Phone Number?
                                        </button>

                                        <div id="FAQ2-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--three-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3-3" aria-expanded="false">
                                            How do I redeem a coupon?
                                        </button>

                                        <div id="FAQ3-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--four-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4-3" aria-expanded="false">
                                            How long will it take to post my job?
                                        </button>

                                        <div id="FAQ4-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--five-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5-3" aria-expanded="false">
                                            What is your cancellation policy?
                                        </button>

                                        <div id="FAQ5-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--six-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ6-3" aria-expanded="false">
                                            Where Can I Find Market Research Reports?
                                        </button>

                                        <div id="FAQ6-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--seven-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ7-3" aria-expanded="false">
                                            Do I need to know PHP to use TheJobs?
                                        </button>

                                        <div id="FAQ7-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--eight-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ8-3" aria-expanded="false">
                                            How soon will I start receiving resumes?
                                        </button>

                                        <div id="FAQ8-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Tabs content Four-->
                        <div class="tab-pane fade" id="Return" role="tabpanel" >
                            <div class="tw-faq-section">
                                <div class="accordion tw-faq" id="sf-faq-accordion-4">

                                    <!--one-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ1-4" aria-expanded="false">
                                            How long will it take to post my job?
                                        </button>

                                        <div id="FAQ1-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--two-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2-4" aria-expanded="false">
                                            What is your cancellation policy?
                                        </button>

                                        <div id="FAQ2-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--three-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3-4" aria-expanded="false">
                                            Where Can I Find Market Research Reports?
                                        </button>

                                        <div id="FAQ3-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--four-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4-4" aria-expanded="false">
                                            Do I need to know PHP to use TheJobs?
                                        </button>

                                        <div id="FAQ4-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                    <!--five-->
                                    <div class="accordion-item">

                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5-4" aria-expanded="false">
                                            How soon will I start receiving resumes?
                                        </button>

                                        <div id="FAQ5-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                            <div class="accordion-body">
                                                A digital interface the person causing the movement of goods uploads the relevant information prior to the commencement of movement of goods and generates e-way bill on the GST portal. Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                  </div>


            </div>

        </div>

    </div>

@endsection

@push("js")

@endpush