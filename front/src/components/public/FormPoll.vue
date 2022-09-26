<script>
    import ModalLinkResponses from "./ModalLinkResponses.vue";
    export default {
      props: {
        questions: {
          type: Array,
          default: () => [],
        },
      },
      data() {
        return {
          responses: [],
        };
      },
    
      components: { ModalLinkResponses },
    };
    </script>
    
    <template>
      <div class="">
        <!-- Informations about the question -->
        <form>
          <!-- Informations about the question -->
          <div class=" col-12 col-lg-12" v-for="(question, i) in questions" :key="question.id">
            <div class="formContainer  mt-4 mb-4 col-lg-6 m-auto p-lg-4 pt-4 pb-4">
              
                <div class="titleQuestion col-lg-12">
                  <h1 class="text-white font-monospace">
                    Question {{ question.id }}/{{ questions.length }}
                  </h1>
                  <p class="statement text-white font-monospace">{{ question.title }}</p>
                </div>
              <!--Choices -->
              <div class=" dotBorder pb-4 pt-4 col-12 col-lg-12 m-auto">
                <!-- Type A -->
                <div v-if="question.type === 'A'">
                  <div class="" v-for="(choice, index) in question.choices" :key="index">
                    <div class=" col-12 col-md-4 col-lg-6 row m-auto">
                      <div class="col-2 col-md-2 col-lg-2">
                        <input class="m-auto "
                          type="radio"
                          :value="choice"
                          :name="question.id"
                          v-model="responses[i]"
                          required
                        />
                      </div>
                      <div class=" col-10 col-md-10 col-lg-10">
                        <label class="text-white font-monospace"> {{ choice }} </label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Type B -->
    
                <div class="text-center" v-else-if="question.type === 'B'">
                  <input
                    class="col-10 col-lg-8 pb-2 pb-2"
                    placeholder="Email"
                    type="email"
                    v-if="question.id === 1"
                    maxlength="255"
                    v-model="responses[i]"
                  />
                  <textarea cl
                    class="area col-11 col-lg-11"
                    cols="30"
                    rows="10"
                    maxlength="255"
                    v-else
                    v-model="responses[i]"
                    required
                  ></textarea>
                </div>
                <!-- Type C -->
                <div class=" col-12 col-md-12 col-lg-12 m-auto row" v-else-if="question.type === 'C'">
                    <div class=" col-2 col-md-2 col-lg-2 m-auto"  v-for="index in 5" :key="index">
                        <input
                        class=" col-3 col-md-4 col-lg-3 mx-2"
                        type="radio"
                        :value="index"
                        :name="question.id"
                        v-model="responses[i]"
                        required
                        />
                        <label class="col-2 col-md-6 col-lg-3  text-white"> {{ index }} </label>
                    </div>
                    </div>
              </div>
            </div>
          </div>
    
          <div>
            <ModalLinkResponses :responses="this.responses" />
          </div>
        </form>
      </div>
    </template>
    
    <style>
        
        @media screen and (min-width: 800px) and (max-width: 2560px) {
                    
            .br{
                border: 1px solid red;
            }
            
            .formContainer {
            border-radius: 20px;
            background-color: rgba(115, 115, 115, 0.498);
            backdrop-filter: blur(10px);
            }
            
            .dotBorder {
            border: 2px dotted white;
            border-radius: 10px;
            }
            
            .area {
            border-radius: 20px;
            }

            .statement{
                font-size: large;
            }

        }

        @media screen and (min-width: 300px) and (max-width: 768px) {
                    
            .br{
                border: 1px solid red;
            }
            

            .titleQuestion{
                text-align: center;
            }

            .formContainer {
                border-radius: 20px;
                background-color: rgba(115, 115, 115, 0.498);
                backdrop-filter: blur(10px);
                }
                
                .dotBorder {
                border: 2px dotted white;
                border-radius: 10px;
                }
                
                .area {
                border-radius: 20px;
                }
        }
    </style>