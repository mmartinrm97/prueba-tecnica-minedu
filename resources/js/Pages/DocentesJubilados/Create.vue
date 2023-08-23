<script setup>
import {useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    tipo_documento: '',
    numero_documento: '',
    nombres: '',
    apellido_paterno: '',
    apellido_materno: '',
    fecha_nacimiento: '',
    numero_celular: '',
    correo: '',
});

</script>

<template>

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Docentes Jubilados</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <h2 class="text-lg">Registrar Nuevo Docente Jubilado</h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Registra la información del docente jubilado.
                            </p>
                        </div>

                        <form
                            @submit.prevent="form.post(route('docentes-jubilados.store'), { onSuccess: () => form.reset() }) "
                            class="mt-6 space-y-6">

                            <!--                Tipo Documento-->
                            <div>
                                <InputLabel for="tipo_documento" value="Tipo de Documento *"/>

                                <select
                                    id="tipo_documento"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"

                                    v-model="form.tipo_documento"
                                >
                                    <option value="DNI" >DNI</option>
                                    <option value="CE">CE</option>
                                </select>

                                <InputError class="mt-2" :message="form.errors.tipo_documento"/>
                            </div>

                            <!--                Nro Documento-->
                            <div>
                                <InputLabel for="numero_documento" value="Número de Documento *"/>

                                <TextInput
                                    id="numero_documento"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.numero_documento"
                                    required
                                    autocomplete="numero_documento"
                                />

                                <InputError class="mt-2" :message="form.errors.numero_documento"/>
                            </div>

                            <!--Nombres-->
                            <div>
                                <InputLabel for="nombres" value="Nombres *"/>

                                <TextInput
                                    id="nombres"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.nombres"
                                    required
                                    autocomplete="nombres"
                                />

                                <InputError class="mt-2" :message="form.errors.nombres"/>
                            </div>

                            <!-- Apellido Paterno-->

                            <div>
                                <InputLabel for="apellido_paterno" value="Apellido Paterno *"/>

                                <TextInput
                                    id="apellido_paterno"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.apellido_paterno"
                                    required
                                    autocomplete="apellido_paterno"
                                />

                                <InputError class="mt-2" :message="form.errors.apellido_paterno"/>
                            </div>


                            <!--  Apellido Materno-->
                            <div>
                                <InputLabel for="apellido_materno" value="Apellido Materno"/>

                                <TextInput
                                    id="apellido_materno"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.apellido_materno"
                                    autocomplete="apellido_materno"
                                />

                                <InputError class="mt-2" :message="form.errors.apellido_materno"/>
                            </div>


                            <!--Fecha de Nacimiento-->
                            <div>
                                <InputLabel for="fecha_nacimiento" value="Fecha de Nacimiento *"/>

                                <TextInput
                                    id="fecha_nacimiento"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.fecha_nacimiento"
                                    required
                                    autocomplete="fecha_nacimiento"
                                />

                                <InputError class="mt-2" :message="form.errors.fecha_nacimiento"/>
                            </div>


                            <!--Numero de Celular-->
                            <div>
                                <InputLabel for="numero_celular" value="Número de Celular *"/>

                                <TextInput
                                    id="numero_celular"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.numero_celular"
                                    required
                                    autocomplete="numero_celular"
                                />

                                <InputError class="mt-2" :message="form.errors.numero_celular"/>
                            </div>

                            <!--Correo-->
                            <div>
                                <InputLabel for="correo" value="Correo Electrónico"/>

                                <TextInput
                                    id="correo"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.correo"
                                    required
                                    autocomplete="correo"
                                />

                                <InputError class="mt-2" :message="form.errors.correo"/>
                            </div>


                            <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                                           :disabled="form.processing">Enviar
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>

</template>

<style scoped>

</style>
