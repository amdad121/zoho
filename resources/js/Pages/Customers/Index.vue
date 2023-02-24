<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment';

defineProps({
    contacts: Object,
});
</script>

<template>
    <Head title="Customers" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 leading-tight flex justify-between"
            >
                <span>Customers</span>
                <Link
                    :href="route('customers.create')"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 -m-2"
                    >Create Customer</Link
                >
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
                                    <th class="p-2">Customer Name</th>
                                    <th class="p-2">Company Name</th>
                                    <th class="p-2">Website</th>
                                    <!-- <th class="p-2">Email</th>
                                    <th class="p-2">Phone</th> -->
                                    <th class="p-2">Contact Type</th>
                                    <th class="p-2">Status</th>
                                    <th class="p-2">Currency Code</th>
                                    <th class="p-2">Created Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(item, index) in contacts.contacts"
                                    :key="index"
                                    class="border"
                                >
                                    <td class="p-2">
                                        {{ item.customer_name }}
                                    </td>
                                    <td class="p-2">
                                        {{ item.company_name }}
                                    </td>
                                    <td class="p-2">{{ item.website }}</td>
                                    <!-- <td class="p-2">{{ item.email }}</td>
                                    <td class="p-2">{{ item.phone }}</td> -->
                                    <td class="p-2">
                                        {{ item.contact_type_formatted }}
                                    </td>
                                    <td class="p-2">
                                        {{ item.status }}
                                    </td>
                                    <td class="p-2">
                                        {{ item.currency_code }}
                                    </td>
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
