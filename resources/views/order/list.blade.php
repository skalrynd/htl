<x-layout>
    <div class="row">
        <div class="col-9">
            <h1>Orders</h1>
        </div>
        <div class="col-3 float-right">
            <a class="btn btn-primary" href="/orders/create">
                Create An Order
            </a>
        </div>
        <hr />
        <orders-table></orders-table>
    </div>
</x-layout>
