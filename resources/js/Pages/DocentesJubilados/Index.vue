<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import ModalDelete from "@/Pages/DocentesJubilados/ModalDelete.vue";
import {ref} from "vue";
import dayjs from "dayjs";

const props = defineProps({
  docentesJubilados: Object
});

const isRegistering = ref(false);

const startRegistering = () => {
  isRegistering.value = true;
};

const isEditing = ref([]);

const startEditing = (id) => {
  isEditing.value[id] = true;
};


//Format Currency
const formatCurrency = (value) => {
  return parseFloat(value).toLocaleString('es-PE', {style: 'currency', currency: 'PEN'});
};


//Data Modal
const open = ref(false)
const docenteJubilado = ref(null)

const openModal = (docente) => {
  open.value = true;
  docenteJubilado.value = docente;
}

const closeModal = () => {
  open.value = false;
}


//Calculate age

const calculateAge = (birthdate) => {
  const today = dayjs();
  const birthDate = dayjs(birthdate);

  return today.diff(birthDate, 'year');
};

</script>


<template>
  <Head title="Docentes Jubilados"/>

  <AuthenticatedLayout>

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Docentes Jubilados</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
            <div class="flex justify-between  items-center border-b">
              <h2>Lista de Docentes Jubilados</h2>
              <div class="p-4">
                <Link @click="startRegistering"
                      class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                      :href="route('docentes-jubilados.create')">Registrar Docente
                  <svg v-if="isRegistering" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                </Link>
              </div>
            </div>

            <table v-if="docentesJubilados.data.length > 0"
                   class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-md overflow-hidden">
              <thead class="bg-gray-100 dark:bg-gray-700">
              <tr class="text-center">
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  ID
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Apellidos
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nombres
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Edad
                </th>

                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Bono
                  Asignado
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Estado
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">


              <tr v-for="docente in docentesJubilados.data" :key="docente.id"
                  class="hover:bg-gray-100 dark:hover:bg-gray-700 text-center">
                <td class="px-6 py-4 whitespace-no-wrap">{{ docente.id }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ docente.apellido_paterno }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ docente.nombres }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ calculateAge(docente.fecha_nacimiento) }}</td>
                <td class="px-6 py-4 whitespace-no-wrap"> {{
                    formatCurrency(docente.bono_asignado)
                  }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ docente.estado_docente.descripcion }}</td>
                <td class="px-6 py-4 whitespace-no-wrap flex gap-x-4">
                  <!---->
                  <Link :href="route('docentes-jubilados.edit', {id: docente.id})" @click="startEditing(docente.id)"
                        class="text-yellow-600 dark:text-yellow-500 hover:underline focus:outline-none flex justify-center items-center gap-x-2">
                    Editar
                    <svg v-if="!isEditing[docente.id]" class=" h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                      <path
                          d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"/>
                      <path
                          d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"/>
                    </svg>
                    <svg v-else class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                  </Link>
                  <button @click="openModal(docente)"
                          class="text-red-600 dark:text-red-500  hover:underline focus:outline-none ml-4 flex items-center justify-center gap-x-2">
                    Eliminar
                    <svg class="h-4 w-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                            clip-rule="evenodd"/>
                    </svg>

                  </button>
                </td>
              </tr>
              </tbody>
            </table>
            <div v-else
                 class="relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10
                        dark:border-t-white/10"
            >

              <div
                  class="px-6 py-12"
              >
                <div
                    class="mx-auto grid max-w-lg justify-items-center text-center"
                >
                  <div
                      class=" mb-4 rounded-full bg-gray-100 p-3 dark:bg-gray-500/20"
                  >
                    <svg
                        class=" h-6 w-6 text-gray-500 dark:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                  </div>

                  <h4
                      class=" text-base font-semibold leading-6 text-gray-950 dark:text-white"
                  >
                    No hay docentes jubilados registrados
                  </h4>

                  <p
                      class=" text-sm text-gray-500 dark:text-gray-400 mt-1"
                  >
                    Registra un docente para empezar.
                  </p>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

    <ModalDelete :open="open" @close-modal="closeModal" :docente-jubilado="docenteJubilado"/>
  </AuthenticatedLayout>

</template>
