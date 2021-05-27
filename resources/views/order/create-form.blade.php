<x-layout>
    <h1>Create Order</h1>
    <order-create-form
        :vehicles="{{$vehicles->toJson()}}"
        :technicians="{{$technicians->toJson()}}"
    ></order-create-form>
</x-layout>
