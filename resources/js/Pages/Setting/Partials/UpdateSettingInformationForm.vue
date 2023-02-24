<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    zoho_setting: Object,
});

const form = useForm({
    ZOHO_REFRESH_TOKEN: props.zoho_setting.refreshToken,
    ZOHO_CLIENT_ID: props.zoho_setting.clientId,
    ZOHO_CLIENT_SECRET: props.zoho_setting.clientSecret,
    ZOHO_REDIRECT_URI: props.zoho_setting.redirectUri,
    ZOHO_GRANT_TYPE: props.zoho_setting.grantType,
    ZOHO_API_URL: props.zoho_setting.ApiUrl,
    ZOHO_ORGANIZATION_ID: props.zoho_setting.organizationId,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Zoho Setting</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your zoho account's information.
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('setting.update'))"
            class="mt-6 space-y-6"
        >
            <div>
                <InputLabel for="refresh_token" value="Refresh Token" />

                <TextInput
                    id="refresh_token"
                    type="text"
                    name="UUUU"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_REFRESH_TOKEN"
                    required
                    autofocus
                    autocomplete="ZOHO_REFRESH_TOKEN"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.ZOHO_REFRESH_TOKEN"
                />
            </div>

            <div>
                <InputLabel for="client_id" value="Client ID" />

                <TextInput
                    id="client_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_CLIENT_ID"
                    required
                    autocomplete="ZOHO_CLIENT_ID"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.ZOHO_CLIENT_ID"
                />
            </div>

            <div>
                <InputLabel for="client_secret" value="Client Secret" />

                <TextInput
                    id="client_secret"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_CLIENT_SECRET"
                    required
                    autocomplete="ZOHO_CLIENT_SECRET"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.ZOHO_CLIENT_SECRET"
                />
            </div>

            <div>
                <InputLabel for="redirect_uri" value="Redirect URI" />

                <TextInput
                    id="redirect_uri"
                    type="url"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_REDIRECT_URI"
                    required
                    autocomplete="ZOHO_REDIRECT_URI"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.ZOHO_REDIRECT_URI"
                />
            </div>

            <div>
                <InputLabel for="grant_type" value="Grant Type" />

                <TextInput
                    id="grant_type"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_GRANT_TYPE"
                    required
                    autocomplete="ZOHO_GRANT_TYPE"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.ZOHO_GRANT_TYPE"
                />
            </div>

            <div>
                <InputLabel for="api_url" value="Api URL" />

                <TextInput
                    id="api_url"
                    type="url"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_API_URL"
                    required
                    autocomplete="ZOHO_API_URL"
                />

                <InputError class="mt-2" :message="form.errors.ZOHO_API_URL" />
            </div>

            <div>
                <InputLabel for="organization_id" value="Organization ID" />

                <TextInput
                    id="organization_id"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.ZOHO_ORGANIZATION_ID"
                    required
                    autocomplete="ZOHO_ORGANIZATION_ID"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.ZOHO_ORGANIZATION_ID"
                />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
