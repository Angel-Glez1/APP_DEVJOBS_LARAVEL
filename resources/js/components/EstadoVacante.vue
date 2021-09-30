<template>
    <span 
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full py-1 px-2 text-center"
        :class="claseEstadoVacante()"
        @click="cambiarEstado"        
        :key="estadoVacanteData"
    >
        {{ estadoVacante }}
    </span>
</template>


<script>
export default {
    props: ['estado', 'vacanteId'],
    mounted(){
        this.estadoVacanteData = Number(this.vacanteId);
    },

    data: function () {
        return {
            estadoVacanteData:null
        }
    },

    methods: {
        cambiarEstado(){
            if(this.estadoVacanteData === 1 ){
                this.estadoVacanteData = 0
            }else{
                this.estadoVacanteData = 1
            }

            const params = {
                estado : this.estadoVacanteData
            }
            // Hacer la peticon con axios
            axios.post('/vacantes/' + this.vacanteId, params)
            .then((result) =>  console.log(result))
            .catch((err) =>  console.log(err));

        },

        claseEstadoVacante(){
            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-700": "bg-red-100 text-red-700";
        }
    },
    computed: {
        estadoVacante(){
            return this.estadoVacanteData === 1 ? "Activa": "Inactiva";
        }
    }
}
</script>