<tr>
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input" type="checkbox" value="1" />
        </div>
    </td>
    <td class="d-flex align-items-center">
        <!--begin:: Avatar -->
        <div class="symbol
{{--        symbol-circle --}}
        symbol-50px overflow-hidden me-3">
            <a href="/">
                <div class="">
                    <img src="/{{$slide->image}}" alt="{{$slide->title}}" style="width: 150px"/>
                </div>
            </a>
        </div>
        <!--end::Avatar-->
        <!--begin::User details-->
{{--        <div class="d-flex flex-column">--}}
{{--            <a class="text-gray-800 text-hover-primary mb-1">{{$slide->user->first_name}} {{$slide->user->registration_name}}</a>--}}
{{--            <span>{{$slide->user->phone}}</span>--}}
{{--        </div>--}}
        <!--begin::User details-->
    </td>
    <td >
        {{($slide->title)}}
    </td>

    <td>
        @if($slide->status === "Active")
            <div class="badge badge-light-success fw-bold">Active</div>
        @elseif($slide->status === "Pending")
            <div class="badge badge-light-warning fw-bold">Pending</div>
        @else
            <div class="badge badge-light-primary fw-bold">Active</div>
        @endif
    </td>

    <td class="text-end">
        <a href="{{route('admin.slide.edit',$slide->id)}}" class="btn btn-primary  btn-flex btn-center btn-sm">
            <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        </a>
        <a href="{{route('admin.slide.destroy',$slide->id)}}" class="btn btn-danger  btn-flex btn-center btn-sm">
            <i class="ki-duotone ki-trash-square fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
        </a>
    </td>
</tr>
