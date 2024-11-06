<!--begin::Sidebar-->
<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

    <!--begin::Card-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card body-->
        <div class="card-body pt-15">
            <!--begin::Summary-->
            <div class="d-flex flex-center flex-column mb-5">
                <!--begin::Avatar-->
                <div class="symbol symbol-100px symbol-circle mb-7">
                    @if($user->profile->avatar_status === 1)
                        <img src="{{Storage::url($user->profile->avatar)}}" alt="{{$user->name}}" class="w-100"/>
                    @else
                        <img src="/office/media/avatars/300-1.jpg" alt="{{$user->name}}" class="w-100"/>
                    @endif
                </div>
                <!--end::Avatar-->

                <!--begin::Name-->
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                    {{$user->first_name}} {{$user->last_name}}
                </a>
                <!--end::Name-->

{{--                <!--begin::Position-->--}}
{{--                <div class="fs-5 fw-semibold text-muted mb-6">--}}
{{--                    {{$user->designation}}--}}
{{--                </div>--}}
{{--                <!--end::Position-->--}}

                <!--begin::Info-->
                <div class="d-flex flex-wrap flex-center">
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                        <div class="fs-4 fw-bold text-gray-700">
                            <span class="w-75px">{{count($user->loans)}}</span>
                            <i class="ki-duotone ki-arrow-up fs-3 text-success"><span
                                    class="path1"></span><span class="path2"></span></i>
                        </div>
                        <div class="fw-semibold text-muted">Total Loans</div>
                    </div>
                    <!--end::Stats-->

                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                        <div class="fs-4 fw-bold text-gray-700">
                            <span class="w-50px">{{$user->loans->sum('overdue_days')}}</span>
                            <i class="ki-duotone ki-arrow-up fs-3 text-danger"><span
                                    class="path1"></span><span class="path2"></span></i>
                        </div>
                        <div class="fw-semibold text-muted">Days Overdue</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Summary-->

            <!--begin::Details toggle-->
            <div class="d-flex flex-stack fs-4 py-3">
                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                    Details
                    <span class="ms-2 rotate-180">
                        <i class="ki-duotone ki-down fs-3"></i> </span>
                </div>

                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                    <a href="{{route('manage.users.details',$user->id)}}" class="btn btn-sm btn-light-primary">
                        Account Details
                    </a>
                </span>
            </div>
            <!--end::Details toggle-->

            <div class="separator separator-dashed my-3"></div>

            <!--begin::Details content-->
            <div id="kt_customer_view_details" class="collapse show">
                <div class="py-5 fs-6">
                    <!--begin::Badge-->
                    <div class="badge badge-light-info d-inline">Premium user</div>
                    <!--begin::Badge-->

                    <!--begin::Details item-->
                    <div class="fw-bold mt-5">Account ID</div>
                    <div class="text-gray-600">ID-{{$user->id}}</div>

                    <div class="fw-bold mt-5">Email</div>
                    <div class="text-gray-600">
                        <a class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                    </div>

                    <div class="fw-bold mt-5">
                        Address
                    </div>

{{--                    <div class="text-gray-600">--}}
{{--                        {{$application->employees_address}}--}}
{{--                    </div>--}}

                    <div class="fw-bold mt-5">Language</div>
                    <div class="text-gray-600">English</div>

                    <!--begin::Details item-->
                    <!--begin::Details item-->
                    <div class="fw-bold mt-5">Upcoming Invoice</div>
                    <div class="text-gray-600">54238-8693</div>
                    <!--begin::Details item-->
                    <!--begin::Details item-->
                    <div class="fw-bold mt-5">Tax ID</div>
                    <div class="text-gray-600">TX-8674</div>
                    <!--begin::Details item-->
                </div>
            </div>
            <!--end::Details content-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Active Loans-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <div class="card-title">
                <h3 class="fw-bold m-0">Active Loans</h3>
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-2">
            <!--begin::Items-->
            <div class="py-2">
                @foreach($user->loans as $loan)
                    <div class="d-flex flex-stack">

                        <div class="d-flex">
                            <div class="d-flex flex-column">
                                <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">{{number_format($loan->amount)}} TZS</a>
                                <div class="fs-6 fw-semibold text-muted">Balance: {{number_format($loan->balance)}} TZS</div>
                                <div class="fs-6 fw-semibold text-muted">Loan Date: {{date('D, dS M Y',strtotime($loan->approved_date))}}</div>
                                <div class="fs-6 fw-semibold text-muted">Due Date: {{date('D, dS M Y',strtotime($loan->due_date))}}</div>
                                @if($loan->overdue_days < 1)
                                    <div class="text-warning fw-bold">Active</div>
                                @else
                                    <div class="text-danger fw-bold">Overdue {{$loan->overdue_days}}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-5"></div>
                @endforeach

            </div>
            <!--end::Items-->
        </div>
        <!--end::Card body-->

    </div>
    <!--end::Active Loans-->
</div>
<!--end::Sidebar-->
