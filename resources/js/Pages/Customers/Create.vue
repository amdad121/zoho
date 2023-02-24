<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    contact_name: '',
    company_name: '',
    payment_terms: 15,
    currency_id: '',
    website: '',
    contact_type: 'customer',
    salutation: '',
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    mobile: '',
    is_primary_contact: true,
    language_code: 'en',
    notes: '',
});

const submit = () => {
    form.post(route('customers.create'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Create a Customer" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a Customer
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">You're logged in!</div> -->
                    <div class="p-6">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-4 gap-4">
                                <div>
                                    <InputLabel for="contact_name">
                                        Contact Name
                                        <span class="text-red-500">*</span>
                                    </InputLabel>

                                    <TextInput
                                        id="contact_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.contact_name"
                                        required
                                        autofocus
                                        autocomplete="contact_name"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.contact_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="salutation">
                                        Salutation
                                    </InputLabel>

                                    <select
                                        name="salutation"
                                        id="salutation"
                                        v-model="form.salutation"
                                        autocomplete="salutation"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    >
                                        <option value="">-----</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Miss.">Miss.</option>
                                        <option value="Dr.">Dr.</option>
                                    </select>

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.salutation"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="first_name">
                                        First Name
                                    </InputLabel>

                                    <TextInput
                                        id="first_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.first_name"
                                        autocomplete="first_name"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.first_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="last_name">
                                        Last Name
                                    </InputLabel>

                                    <TextInput
                                        id="last_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.last_name"
                                        autocomplete="last_name"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.last_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="email">Email</InputLabel>

                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        v-model="form.email"
                                        autocomplete="email"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.email"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="phone">Phone</InputLabel>

                                    <TextInput
                                        id="phone"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.phone"
                                        autocomplete="phone"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.phone"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="mobile">Mobile</InputLabel>

                                    <TextInput
                                        id="mobile"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.mobile"
                                        autocomplete="mobile"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.mobile"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="website">
                                        Website
                                    </InputLabel>

                                    <TextInput
                                        id="website"
                                        type="url"
                                        class="mt-1 block w-full"
                                        v-model="form.website"
                                        autocomplete="website"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.website"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="company_name">
                                        Company Name
                                    </InputLabel>

                                    <TextInput
                                        id="company_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.company_name"
                                        autocomplete="company_name"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.company_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="currency_id">
                                        Currency ID
                                    </InputLabel>

                                    <TextInput
                                        id="currency_id"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.currency_id"
                                        autocomplete="currency_id"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.currency_id"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="contact_type">
                                        Contact Type
                                    </InputLabel>

                                    <TextInput
                                        id="contact_type"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.contact_type"
                                        autocomplete="contact_type"
                                        readonly
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.contact_type"
                                    />
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <InputLabel for="payment_terms">
                                            Payment Terms
                                        </InputLabel>

                                        <TextInput
                                            id="payment_terms"
                                            type="number"
                                            class="mt-1 block w-full"
                                            v-model="form.payment_terms"
                                            autocomplete="payment_terms"
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.payment_terms"
                                        />
                                    </div>

                                    <div>
                                        <InputLabel for="language_code">
                                            Language Code
                                        </InputLabel>

                                        <TextInput
                                            id="language_code"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.language_code"
                                            autocomplete="language_code"
                                            readonly
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.language_code"
                                        />
                                    </div>
                                </div>

                                <div class="col-span-4">
                                    <InputLabel for="notes">Notes</InputLabel>

                                    <textarea
                                        name="notes"
                                        id="notes"
                                        v-model="form.notes"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        cols="6"
                                        rows="3"
                                        autocomplete="notes"
                                    ></textarea>

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.notes"
                                    />
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-sm text-gray-500"
                                    ><span class="text-red-500">*</span>
                                    Required Field</span
                                >
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Save
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
