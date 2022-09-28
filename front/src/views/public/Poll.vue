<script>
    import axios from 'axios';
import FormPoll from '../../components/public/FormPoll.vue';
    export default {
    components: { FormPoll },
    // data() {
    //         return {
    //             questions: [],
    //         };
    //     },
    //     mounted() {
    //         axios.get("http://127.0.0.1:8000/api/questions")
    //             .then((response) => {
    //             this.questions = response.data;
    //         })
    //             .catch(err => console.log(err));
    //     },
}
    </script>
    
    <template>
        <div class="mt-lg-5 mb-lg-5 pb-lg-4 pt-lg-4 col-lg-11 m-auto pollContainer">
            <div class="col-lg-11 headerBackground pt-4 pb-4 m-auto mt-lg-2">
                <h1 class="col-10 col-lg-10 pb-3 m-auto bigscreenTitle text-white font-monospace">
                    BIGSCREEN
                </h1>
                <p class="m-auto col-9 col-lg-9 titlePoll text-white font-monospace">
                    Merci de répondre à toutes les questions et de valider le formulaire en bas de page.
                </p>
            </div>
            <FormPoll />
        </div>
    </template>
    
    
    
    <style>
        
        @media screen and (min-width: 800px) and (max-width: 2560px) {
            .bigscreenTitle{
                font-weight: bolder;
            }
    
            .titlePoll{
                font-size: 21px;
            }
    
            .pollContainer{
                background-image: url(../../../img/lavaBackground2.jpg);
                border-radius: 20px;
            }
    
        }

        @media screen and (min-width: 300px) and (max-width: 768px) {
            .headerBackground{
                background-color: rgba(83, 23, 138, 0.632);
                backdrop-filter: blur(20px);
            }
            
            .pollContainer{
                background-image: none;
            }

            .bigscreenTitle{
                text-align: center;
            }

            .titlePoll{
                text-align: center;
            }
    
    }
    
    </style>