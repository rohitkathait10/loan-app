<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-leaf-circle me-2"></i> Order Details</h5>

        <span
            class="badge 
            @if ($order->status == 'created') bg-warning 
            @elseif($order->status == 'paid') bg-success
            @else bg-danger @endif
        ">
            {{ strtoupper($order->status) }}
        </span>
    </div>

    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $order->customer->name }}</p>
                <p><strong>Phone:</strong> <span class="badge bg-info">{{ $order->customer->phone }}</span></p>
                <p><strong>Email:</strong> {{ $order->customer->email }}</p>
            </div>

            <div class="col-md-6">
                <p><strong>UTR:</strong> {{ $order->utr ?? 'N/A' }}</p>

                <p><strong>Payment Screenshot:</strong></p>

                <img src="{{ asset('storage/' . $order->payment_screenshot) }}" alt="payment_screenshot" width="250"
                    class="img-thumbnail open-image" data-img="{{ asset('storage/' . $order->payment_screenshot) }}">

            </div>
        </div>

        <hr>

        <div class="mt-3">
            <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                @csrf

                <button name="status" value="created" class="btn btn-warning me-2">Mark as Created</button>
                <button name="status" value="paid" class="btn btn-success me-2">Mark as Paid</button>
                <button name="status" value="failed" class="btn btn-danger">Mark as Failed</button>
            </form>
        </div>
    </div>
</div>
