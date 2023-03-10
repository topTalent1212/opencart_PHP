<?php

/* default/template/extension/module/d_ajax_search_vue.twig */
class __TwigTemplate_c752d44ea645ec4c07336bd81e058447eab228804b69447116dead5b56cf2225 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ($this->getAttribute((isset($context["setting"]) ? $context["setting"] : null), "width", array(), "array")) {
            // line 2
            echo "    <style type=\"text/css\">
        #d_ajax_search_results {
            width: ";
            // line 4
            echo $this->getAttribute((isset($context["setting"]) ? $context["setting"] : null), "width", array(), "array");
            echo ";
        }
    </style>
";
        }
        // line 8
        echo "<div id=\"ajaxsearch\">
    <div v-if=\"showModal\">
    <transition name=\"modal\">
      <div class=\"modal-mask\">
         <div class=\"modal-wrapper\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <div id=\"search-autocomplite\">\${ autocomplite }</div>
                    <div id=\"search_mobile\" class=\"input-group\">
                        <span @click=\"showModal = false\" class=\"pull-left\" data-dismiss=\"modal\"><i class=\"fa fa-arrow-left\"></i></span>
                        <input id=\"search_input\" v-model=\"keyword\" type=\"text\" name=\"search\" autofocus value=\"\" placeholder=\"Search\"
                               class=\"pull-left form-control input-lg\">
                        <div class=\"pull-right\">
                            <span @click=\"keyword=''\"><i class=\"fa fa-close\"></i></span>
                            <span><i class=\"fa fa-search\"></i></span>
                        </div>
                    </div>
                </div>
                    <div class=\"modal-body\">
                        <d_results
                        v-bind:state=\"state\" 
                        v-bind:response=\"response\" 
                        v-bind:count=\"count\" 
                        v-bind:selectedresult=\"selectedresult\"
                        v-bind:up_down_class=\"up_down_class\">
                        </d_results>
                     <div id=\"help\"> \${ search_phase }</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </transition>
  </div>

    <div id=\"search\" class=\"input-group\">
      <input v-model=\"keyword\" type=\"text\" @click = \"mobilefunction\" name=\"search\" value=\"\" placeholder=\"\" class=\"form-control input-lg\" />
      <div id=\"search-autocomplite\" type=\"text\" name=\"autocomplite\" value=\"\" placeholder=\"\">\${ autocomplite }</div>
      <span class=\"input-group-btn\">
        <button type=\"button\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-search\"></i></button>
      </span>
    </div>
    <div v-if=\"!state.mobile\">
        <d_results
            v-bind:state=\"state\" 
            v-bind:response=\"response\" 
            v-bind:count=\"count\" 
            v-bind:selectedresult=\"selectedresult\"
            v-bind:up_down_class=\"up_down_class\">
        </d_results>
    </div>    
    </div>
<script src=\"https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/lodash@4.13.1/lodash.min.js\"></script>

<script>


Vue.component('d_results', {
  delimiters: ['\${', '}'],
    data: function (){
        return{
            results_for: '";
        // line 71
        echo (isset($context["results_for"]) ? $context["results_for"] : null);
        echo "'
        }
  },
  props: ['state','response','count','selectedresult','up_down_class'],
  template: `
    <div id=\"d_ajax_search_results\"  v-if=\"response != ''\">
        <div id=\"d_ajax_search_results_body\">
        <div class='empty-results' v-if=\"response == 'noresults'\">
        <a v-if=\"response.length > 0\" class=\"row col-sm-12\" href=\"#\"><span class=\"no-results\"><i class=\"fa fa-exclamation-circle\"></i> no results</span></a>
        ";
        // line 81
        echo "        </div>
        <div class=\"isset-results\" v-if=\"response != 'noresults'\">
            <div v-if=\"state.suggestion == 1 && response.length > 0 && response[0].saggestion != ''\" class=\"saggestion\"> \\\${ results_for } <span class=\"saggestion-result\">\\\${ response[0].saggestion } </span></div>
                <div  id=\"result_block\" class=\"result_block\" v-for=\"(result, index) in response\">
                
                ";
        // line 87
        echo "                <p v-if=\"state.block_result == 1 && index > 1 && response[index].where_find != response[index - 1].where_find || state.block_result == 1 && index == 0\" class=\"pull-right block-text text-left\">\\\${ result.where_find } </p>

                <a  v-if=\"count > index\" @click=\"write_to_database(result)\" class=\"result-link sort-item row col-sm-12\" :class='{\"active-item\": selectedresult === index}' :item_data=\"result.item_data\" :data-sort-order=\"result.weight\" :href=\"result.href\">
                    <div class=\"col pull-left col-sm-2 va-center text-center\"><img :src=\"result.image\" /></div>
                    <div class=\"col name col-sm-7 col-xs-5 va-center text-left\"><span class=\"forkeydon\">\\\${ result.name }</span>
                    <br><span v-if=\"state.where_search == 1\" class=\"where-find\">in \\\${ result.where_find} \\\${ result.find_by}</span></div>
                    <div v-if=\"state.price == 1\" class=\"col price col-sm-3 va-center text-center\"><span class=\"\">\\\${ result.price }</span></div>
                </a>
                </div>
            </div>
        </div>
       <a v-on:click=\"this.\$parent.showMoreResults\" v-if=\"response.length != '' && response != 'noresults' && state.all_result_status == 1 && response.length > state.all_result_count\" class=\"all_results\">All results <i v-bind:class=\"up_down_class\" ></i></a>
    </div>

  `
});

var ajaxsearch = new Vue({
      delimiters: ['\${', '}'],
      el: '#ajaxsearch',
      data: {
        block: 0,
        selectedresult: 0,
        up_down_class: 'fa fa-caret-down',
        count: '',
        state: '',
        autocomplite: '',
        keyword: '',
        response: [],
        hidden_val: 'hidden',
        no_results: 'hidden',
        search_phase: '";
        // line 118
        echo (isset($context["search_phase"]) ? $context["search_phase"] : null);
        echo "',
        showModal: false,
      },

      watch: {
        keyword: function (newQuestion, oldQuestion) {
          this.answer = 'Please enter keyword'
          if(this.keyword.length >= this.state.max_symbols){
            this.debouncedGetAutocoplite();
            this.debouncedGetAnswer();
          }else{
              vm.response='';
          }
        }
      },
      created: function () {
        this.debouncedGetAnswer = _.debounce(this.getResults, 700);
        this.debouncedGetAutocoplite = _.debounce(this.getAutocomplite, 200);
        var vm = this
        
        axios.post('index.php?route=extension/module/d_ajax_search/getState', {
          })
            .then(function (res_state) {
                vm.state = res_state.data;
                if(vm.state.all_result_status>0){
                    vm.count = res_state.data.all_result_count;
                }else{
                    vm.count = res_state.data.max_results;
                }
            })
            .catch(function (error) {
              console.log('Sorry, something wrong. ' + error);
            })
      },
      mounted(){
        document.addEventListener(\"keyup\", this.keyBoardNavigation);
      },

      methods: {
        getAutocomplite: function(){
            var vm = this
          axios.post('index.php?route=extension/module/d_ajax_search/getAutocomplite&keyword='+this.keyword, {
          })
            .then(function (autocomplite) {
                if(autocomplite.data.length > 0){
                    vm.autocomplite = autocomplite.data;
                }else{
                    vm.autocomplite = '';
                }
            })
            .catch(function (error) {
              vm.answer = 'Sorry, something wrong. ' + error
            })
        },
        getResults: function () {
          var vm = this
          axios.post('index.php?route=extension/module/d_ajax_search/searchresults&keyword='+this.keyword, {
          })
            .then(function (response) {
                vm.response = response.data;
                vm.search_phase = '';
                console.log(vm.response)
                if(response.data.length > 0){
                    vm.hidden_val = '';
                }else{
                    vm.no_results = '';
                }
            })
            .catch(function (error) {
              vm.keyword = 'Sorry, something wrong. ' + error
            })
        },
        write_to_database: function(val) {
            var vm = this
            var json={};
            json.type=val.item_data.split('=')[0].split('_')[0];
            json.type_id=val.item_data.split('=')[1];
            json.search=val.keyword;
            json.select=val.name;
            
            axios.post('index.php?route=extension/module/d_ajax_search/write_to_base', {
                data:json,
            })
            .then(function (response) {
                
            })
            .catch(function (error) {
              //vm.answer = 'Sorry, something wrong. ' + error
              //vm.hidden_val = 'hidden';
            })
\t    },
        showMoreResults: function(){
            var vm = this;
            if(!vm.block){
                vm.count = vm.state.max_results;
                vm.block=1;
                vm.up_down_class= 'fa fa-caret-up';
            }else if(vm.block==1){
                vm.count = vm.state.all_result_count ;
                vm.block=0;
                vm.up_down_class= 'fa fa-caret-down';
            }
        },
        keyBoardNavigation () {
            var vm = this
            if (event.keyCode == 38 && vm.selectedresult > 0) {
            vm.selectedresult--
            } else if (event.keyCode == 40 && vm.selectedresult < (vm.count-1)) {
            vm.selectedresult++
            }else if(event.keyCode == 39){
                vm.keyword = vm.autocomplite;
                this.getResults();
            }
        },

        mobilefunction(){
            vm=this;
            if(vm.state.mobile){
                vm.showModal = !vm.showModal;
            }
        }

      }
})

</script>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/d_ajax_search_vue.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 118,  116 => 87,  109 => 81,  97 => 71,  32 => 8,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if (setting['width']) %}*/
/*     <style type="text/css">*/
/*         #d_ajax_search_results {*/
/*             width: {{setting['width']}};*/
/*         }*/
/*     </style>*/
/* {% endif %}*/
/* <div id="ajaxsearch">*/
/*     <div v-if="showModal">*/
/*     <transition name="modal">*/
/*       <div class="modal-mask">*/
/*          <div class="modal-wrapper">*/
/*         <div class="modal-dialog" role="document">*/
/*             <div class="modal-content">*/
/*                 <div class="modal-header">*/
/*                     <div id="search-autocomplite">${ autocomplite }</div>*/
/*                     <div id="search_mobile" class="input-group">*/
/*                         <span @click="showModal = false" class="pull-left" data-dismiss="modal"><i class="fa fa-arrow-left"></i></span>*/
/*                         <input id="search_input" v-model="keyword" type="text" name="search" autofocus value="" placeholder="Search"*/
/*                                class="pull-left form-control input-lg">*/
/*                         <div class="pull-right">*/
/*                             <span @click="keyword=''"><i class="fa fa-close"></i></span>*/
/*                             <span><i class="fa fa-search"></i></span>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                     <div class="modal-body">*/
/*                         <d_results*/
/*                         v-bind:state="state" */
/*                         v-bind:response="response" */
/*                         v-bind:count="count" */
/*                         v-bind:selectedresult="selectedresult"*/
/*                         v-bind:up_down_class="up_down_class">*/
/*                         </d_results>*/
/*                      <div id="help"> ${ search_phase }</div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             </div>*/
/*         </div>*/
/*     </transition>*/
/*   </div>*/
/* */
/*     <div id="search" class="input-group">*/
/*       <input v-model="keyword" type="text" @click = "mobilefunction" name="search" value="" placeholder="" class="form-control input-lg" />*/
/*       <div id="search-autocomplite" type="text" name="autocomplite" value="" placeholder="">${ autocomplite }</div>*/
/*       <span class="input-group-btn">*/
/*         <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>*/
/*       </span>*/
/*     </div>*/
/*     <div v-if="!state.mobile">*/
/*         <d_results*/
/*             v-bind:state="state" */
/*             v-bind:response="response" */
/*             v-bind:count="count" */
/*             v-bind:selectedresult="selectedresult"*/
/*             v-bind:up_down_class="up_down_class">*/
/*         </d_results>*/
/*     </div>    */
/*     </div>*/
/* <script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>*/
/* <script src="https://cdn.jsdelivr.net/npm/lodash@4.13.1/lodash.min.js"></script>*/
/* */
/* <script>*/
/* */
/* */
/* Vue.component('d_results', {*/
/*   delimiters: ['${', '}'],*/
/*     data: function (){*/
/*         return{*/
/*             results_for: '{{results_for}}'*/
/*         }*/
/*   },*/
/*   props: ['state','response','count','selectedresult','up_down_class'],*/
/*   template: `*/
/*     <div id="d_ajax_search_results"  v-if="response != ''">*/
/*         <div id="d_ajax_search_results_body">*/
/*         <div class='empty-results' v-if="response == 'noresults'">*/
/*         <a v-if="response.length > 0" class="row col-sm-12" href="#"><span class="no-results"><i class="fa fa-exclamation-circle"></i> no results</span></a>*/
/*         {#Suggestion#}*/
/*         </div>*/
/*         <div class="isset-results" v-if="response != 'noresults'">*/
/*             <div v-if="state.suggestion == 1 && response.length > 0 && response[0].saggestion != ''" class="saggestion"> \${ results_for } <span class="saggestion-result">\${ response[0].saggestion } </span></div>*/
/*                 <div  id="result_block" class="result_block" v-for="(result, index) in response">*/
/*                 */
/*                 {#Display block structure#}*/
/*                 <p v-if="state.block_result == 1 && index > 1 && response[index].where_find != response[index - 1].where_find || state.block_result == 1 && index == 0" class="pull-right block-text text-left">\${ result.where_find } </p>*/
/* */
/*                 <a  v-if="count > index" @click="write_to_database(result)" class="result-link sort-item row col-sm-12" :class='{"active-item": selectedresult === index}' :item_data="result.item_data" :data-sort-order="result.weight" :href="result.href">*/
/*                     <div class="col pull-left col-sm-2 va-center text-center"><img :src="result.image" /></div>*/
/*                     <div class="col name col-sm-7 col-xs-5 va-center text-left"><span class="forkeydon">\${ result.name }</span>*/
/*                     <br><span v-if="state.where_search == 1" class="where-find">in \${ result.where_find} \${ result.find_by}</span></div>*/
/*                     <div v-if="state.price == 1" class="col price col-sm-3 va-center text-center"><span class="">\${ result.price }</span></div>*/
/*                 </a>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*        <a v-on:click="this.$parent.showMoreResults" v-if="response.length != '' && response != 'noresults' && state.all_result_status == 1 && response.length > state.all_result_count" class="all_results">All results <i v-bind:class="up_down_class" ></i></a>*/
/*     </div>*/
/* */
/*   `*/
/* });*/
/* */
/* var ajaxsearch = new Vue({*/
/*       delimiters: ['${', '}'],*/
/*       el: '#ajaxsearch',*/
/*       data: {*/
/*         block: 0,*/
/*         selectedresult: 0,*/
/*         up_down_class: 'fa fa-caret-down',*/
/*         count: '',*/
/*         state: '',*/
/*         autocomplite: '',*/
/*         keyword: '',*/
/*         response: [],*/
/*         hidden_val: 'hidden',*/
/*         no_results: 'hidden',*/
/*         search_phase: '{{ search_phase }}',*/
/*         showModal: false,*/
/*       },*/
/* */
/*       watch: {*/
/*         keyword: function (newQuestion, oldQuestion) {*/
/*           this.answer = 'Please enter keyword'*/
/*           if(this.keyword.length >= this.state.max_symbols){*/
/*             this.debouncedGetAutocoplite();*/
/*             this.debouncedGetAnswer();*/
/*           }else{*/
/*               vm.response='';*/
/*           }*/
/*         }*/
/*       },*/
/*       created: function () {*/
/*         this.debouncedGetAnswer = _.debounce(this.getResults, 700);*/
/*         this.debouncedGetAutocoplite = _.debounce(this.getAutocomplite, 200);*/
/*         var vm = this*/
/*         */
/*         axios.post('index.php?route=extension/module/d_ajax_search/getState', {*/
/*           })*/
/*             .then(function (res_state) {*/
/*                 vm.state = res_state.data;*/
/*                 if(vm.state.all_result_status>0){*/
/*                     vm.count = res_state.data.all_result_count;*/
/*                 }else{*/
/*                     vm.count = res_state.data.max_results;*/
/*                 }*/
/*             })*/
/*             .catch(function (error) {*/
/*               console.log('Sorry, something wrong. ' + error);*/
/*             })*/
/*       },*/
/*       mounted(){*/
/*         document.addEventListener("keyup", this.keyBoardNavigation);*/
/*       },*/
/* */
/*       methods: {*/
/*         getAutocomplite: function(){*/
/*             var vm = this*/
/*           axios.post('index.php?route=extension/module/d_ajax_search/getAutocomplite&keyword='+this.keyword, {*/
/*           })*/
/*             .then(function (autocomplite) {*/
/*                 if(autocomplite.data.length > 0){*/
/*                     vm.autocomplite = autocomplite.data;*/
/*                 }else{*/
/*                     vm.autocomplite = '';*/
/*                 }*/
/*             })*/
/*             .catch(function (error) {*/
/*               vm.answer = 'Sorry, something wrong. ' + error*/
/*             })*/
/*         },*/
/*         getResults: function () {*/
/*           var vm = this*/
/*           axios.post('index.php?route=extension/module/d_ajax_search/searchresults&keyword='+this.keyword, {*/
/*           })*/
/*             .then(function (response) {*/
/*                 vm.response = response.data;*/
/*                 vm.search_phase = '';*/
/*                 console.log(vm.response)*/
/*                 if(response.data.length > 0){*/
/*                     vm.hidden_val = '';*/
/*                 }else{*/
/*                     vm.no_results = '';*/
/*                 }*/
/*             })*/
/*             .catch(function (error) {*/
/*               vm.keyword = 'Sorry, something wrong. ' + error*/
/*             })*/
/*         },*/
/*         write_to_database: function(val) {*/
/*             var vm = this*/
/*             var json={};*/
/*             json.type=val.item_data.split('=')[0].split('_')[0];*/
/*             json.type_id=val.item_data.split('=')[1];*/
/*             json.search=val.keyword;*/
/*             json.select=val.name;*/
/*             */
/*             axios.post('index.php?route=extension/module/d_ajax_search/write_to_base', {*/
/*                 data:json,*/
/*             })*/
/*             .then(function (response) {*/
/*                 */
/*             })*/
/*             .catch(function (error) {*/
/*               //vm.answer = 'Sorry, something wrong. ' + error*/
/*               //vm.hidden_val = 'hidden';*/
/*             })*/
/* 	    },*/
/*         showMoreResults: function(){*/
/*             var vm = this;*/
/*             if(!vm.block){*/
/*                 vm.count = vm.state.max_results;*/
/*                 vm.block=1;*/
/*                 vm.up_down_class= 'fa fa-caret-up';*/
/*             }else if(vm.block==1){*/
/*                 vm.count = vm.state.all_result_count ;*/
/*                 vm.block=0;*/
/*                 vm.up_down_class= 'fa fa-caret-down';*/
/*             }*/
/*         },*/
/*         keyBoardNavigation () {*/
/*             var vm = this*/
/*             if (event.keyCode == 38 && vm.selectedresult > 0) {*/
/*             vm.selectedresult--*/
/*             } else if (event.keyCode == 40 && vm.selectedresult < (vm.count-1)) {*/
/*             vm.selectedresult++*/
/*             }else if(event.keyCode == 39){*/
/*                 vm.keyword = vm.autocomplite;*/
/*                 this.getResults();*/
/*             }*/
/*         },*/
/* */
/*         mobilefunction(){*/
/*             vm=this;*/
/*             if(vm.state.mobile){*/
/*                 vm.showModal = !vm.showModal;*/
/*             }*/
/*         }*/
/* */
/*       }*/
/* })*/
/* */
/* </script>*/
