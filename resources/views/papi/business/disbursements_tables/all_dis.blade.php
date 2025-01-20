<div class="card">

    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-3">
                <thead>
                <tr>
                    <th>Merchant</th>
                    <th>Channel</th>
                    <th>Company</th>
                    <th>Account/Phone</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Action</th>
                    <th>Receipt</th>
                </tr>
                </thead>
                <tbody>

                @foreach($business->products as $product)
                    <tr>
                        <td>
                            {{$product->name}}
                        </td>
                        <td>{{number_format($product->balance)}} TZS</td>
                        <td>{{number_format($product->balance)}} TZS</td>
                        <td>{{number_format($product->balance)}} TZS</td>
                        <td>{{number_format($product->balance)}} TZS</td>
                        <td>
                            <span class="badge rounded-pill @if($product->status == 'active')badge-light-success @else badge-light-warning @endif  text-capitalize">pending</span>
                        </td>
                        <td>{{number_format(count($product->transactions))}}</td>
                        <td>
                            <button class="btn-xs btn-primary"><i class="icon icon-thumb-up"></i> </button>
                            <button class="btn-xs btn-warning"><i class="icon icon-thumb-down"></i> </button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-xs btn-primary py-0"><i class="icon icon-eye"></i> </button>

                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>
