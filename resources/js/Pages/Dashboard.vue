<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import moment from 'moment';

defineProps({
    salesOrders: Object,
});
</script>

<template>
    <Head title="Sales Orders" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sales Orders
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">You're logged in!</div> -->
                    <div class="p-6">
                        <table class="w-full">
                            <thead>
                                <tr class="border">
                                    <th class="p-2">Salesorder Number</th>
                                    <th class="p-2">Customer Name</th>
                                    <th class="p-2">Email</th>
                                    <th class="p-2">Date</th>
                                    <th class="p-2">Order Status</th>
                                    <th class="p-2">Invoiced Status</th>
                                    <th class="p-2">Quantity</th>
                                    <th class="p-2">Total</th>
                                    <th class="p-2">Created Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(
                                        item, index
                                    ) in salesOrders.salesorders"
                                    :key="index"
                                    class="border"
                                >
                                    <td class="p-2">
                                        {{ item.salesorder_number }}
                                    </td>
                                    <td class="p-2">
                                        {{ item.customer_name }}
                                    </td>
                                    <td class="p-2">{{ item.email }}</td>
                                    <td class="p-2">
                                        {{
                                            moment(item.date).format(
                                                'MM-DD-YYYY'
                                            )
                                        }}
                                    </td>
                                    <td class="p-2">{{ item.order_status }}</td>
                                    <td class="p-2">
                                        {{ item.invoiced_status }}
                                    </td>
                                    <td class="p-2">{{ item.quantity }}</td>
                                    <td class="p-2">{{ item.total }}</td>
                                    <td class="p-2">
                                        {{
                                            moment(item.created_time).format(
                                                'MM-DD-YYYY hh:mm A'
                                            )
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
