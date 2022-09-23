<script>

export default {
    name: "ModalLinkResponses",

    props: {

        link: {
            type: String
        },
        addResponses: {
            type: Function
        }
    },
    methods:{
        reload(){
            window.location.reload()
        }
    }



}
</script>

<template>
    <div>
        <!-- Button trigger modal -->
        <button @click.prevent="addResponses" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Finaliser
        </button>

        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button @click="reload()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
                            votre investissement, nous vous préparons une application toujours plus
                            facile à utiliser, seul ou en famille.
                            Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
                            cette adresse: <a :href="'http://127.0.0.1:5173/reponses/' + link">http://127.0.0.1:5173/reponses/{{link}}</a></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
