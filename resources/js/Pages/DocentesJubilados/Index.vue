<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import DocenteJubilado from "@/Components/DocenteJubilado.vue";

defineProps(['docentesJubilados'])

const form = useForm({
    tipo_documento: '',
    numero_documento:'',
    nombres:'',
    apellido_paterno:'',
    apellido_materno:'',
    fecha_nacimiento:'',
    numero_celular:'',
    correo:'',
    bono_asignado:'',
});
</script>

<template>
    <Head title="Docentes Jubilados" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('docentes-jubilados.store'), { onSuccess: () => form.reset() })">

<!--                Tipo Documento-->
                <input
                    v-model="form.tipo_documento"
                    placeholder="Ingrese tipo de documento"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.tipo_documento" class="mt-2" />

                <!--                Nro Documento-->
                <input type="text"
                    v-model="form.numero_documento"
                    placeholder="Ingrese numero de documento"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.numero_documento" class="mt-2" />

                <!--                 Nombrfes-->
                <input type="text"
                    v-model="form.nombres"
                    placeholder="Ingrese nombres"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.nombres" class="mt-2" />

                <!--                Apellido Paterno-->
                <input type="text"
                    v-model="form.apellido_paterno"
                    placeholder="Ingrese apellido paterno"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.apellido_paterno" class="mt-2" />


                <!--                Apellido Materno-->
                <input type="text"
                    v-model="form.apellido_materno"
                    placeholder="Ingrese apellido materno"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.apellido_materno" class="mt-2" />


                <!--                Fecha de Nacimiento-->
                <input type="date"
                    v-model="form.fecha_nacimiento"
                    placeholder="Ingrese fecha_nacimiento"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.fecha_nacimiento" class="mt-2" />


                <!--                Numero de Celular-->
                <input type="text"
                    v-model="form.numero_celular"
                    placeholder="Ingrese numero de celular"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.numero_celular" class="mt-2" />

                <!--                Correo-->
                <input type="email"
                    v-model="form.correo"
                    placeholder="Ingrese correo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-6"
                >
                <InputError :message="form.errors.correo" class="mt-2" />


                <PrimaryButton class="mt-4">Enviar</PrimaryButton>
            </form>

            <div>Lista de Docentes Jubilados</div>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <DocenteJubilado
                    v-for="docenteJubilado in docentesJubilados"
                    :key="docenteJubilado.id"
                    :docenteJubilado="docenteJubilado"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
