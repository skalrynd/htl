<template>
    <div v-if="orders.length > 0">
    <table class="table">
        <tr>
            <th>Key</th>
            <th>Vehicle Year, Make, Model</th>
            <th>Vehicle VIN</th>
            <th colspan="2">Technician</th>
        </tr>
        <tr v-for="order in orders">
            <td>{{order.key.name}}</td>
            <td>{{order.vehicle.year}}, {{order.vehicle.make}}, {{order.vehicle.model}}</td>
            <td>{{order.vehicle.vin}}</td>
            <td>{{order.technician.formatted_name}}</td>
            <td>
                <a class="btn btn-primary" :href="`/order/` + order.id + `/update`">Update</a>
                <a class="btn btn-danger" :href="`/order/` + order.id + `/delete`">Delete</a>
            </td>
        </tr>
    </table>
    </div>
    <p v-else>There are no orders yet.  Create one!</p>
</template>

<script>
export default {
    data() {
        return {
            orders: []
        }
    },
    mounted() {
        axios({
            method:'get',
            url:'/orders'
        }).then((response)=>{
            this.orders = response.data;
        });
    }
}
</script>
