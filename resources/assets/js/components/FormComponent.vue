<template>
  
    <div>

        <button class="waves-effect blue darken-1 btn" v-on:click="addRow"><i class="material-icons left">account_circle</i>Add Player</button>

        <table class="">

            <tr v-for="(row,index) in rows" :key="row.id">

                <td>Name</td>
                <td><input type="text" class="validate" v-model="row.name"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <a v-on:click="submitElement(index)" class="waves-effect waves-light btn" style="cursor: pointer">
                        <i class="material-icons left">send</i>Submit
                    </a>
                    <a v-on:click="removeElement(index);" class="waves-effect red darken-1 btn" style="cursor: pointer">
                        <i class="material-icons left">clear</i>Remove
                    </a>
                </td>

            </tr>

        </table>  

        <table class="highlight">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>No of Shuttlecocks Used</th>
                    <th></th>
                    <th></th>
                    <th>Total Fees</th>
                </tr>
            </thead>

            <tbody>        
                    <tr v-for="(player,index) in players" :key="player.id">
                        <td>{{index + 1}}.</td>
                        <td>{{player.name}}</td>
                        <td><input class="validate" type="number" :disabled="edit == 0 ? true : false" v-model="player.shuttlecocks"></td>
                        <td v-if="edit == 0">
                            <button class="waves-effect brown lighten-1 btn" @click="edit = (edit + 1) % 2">
                                <i class="material-icons left">create</i>Edit
                            </button>
                        </td>
                        <td v-if="edit == 1">
                            <button class="waves-effect waves-light btn" @click="submitEdit(player.id,index)">
                                <i class="material-icons left">send</i>Update
                            </button>
                        </td>
                        <td>
                            <button class="waves-effect red darken-1 btn" v-on:click="deletePlayer(player.id);">
                                <i class="material-icons left">clear</i>Delete Player
                            </button>
                        </td>
                        <td>
                            <button class="waves-effect red darken-1 btn" v-on:click="calculateFees(index,player.id);">
                                <i class="material-icons left">attach_money</i>Calculate
                            </button>
                        </td>
                        <td>RM {{player.totalFee}}</td>
                    </tr>
            </tbody>

        </table>
        
    </div>

</template>


<script>


    export default {
        data () {
            return {
                rows: [],
                edit: 0,
                players: []
            }
        },
        props: ['eventid','hall','shuttlecockfees'],
        created() {

                this.$http.get(`http://shuttlecalculator.test/api/players/${this.eventid}`)
                .then(response => {
                    this.players = response.data.data;
                })
                .catch(error=>console.log)
        },
        methods: {
            addRow: function() {
                var elem = document.createElement('tr');
                this.rows.push({
                    name: "",
                    event_id: this.eventid,
                    shuttlecocks : 0,
                    totalFee: 0
                });
            },
            removeElement: function(index) {
                this.rows.splice(index,1);
            },
            submitElement: function(index) {
                this.$http.post('http://shuttlecalculator.test/api/player',{
                    name: this.rows[index].name,
                    event_id: this.rows[index].event_id,
                    shuttlecocks: this.rows[index].shuttlecocks,
                    totalFee: this.rows[index].totalFee
                })
                .then(response => {
                    this.loadingPlayers();
                    this.rows[index].name = "";
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadingPlayers() {
                this.$http.get(`http://shuttlecalculator.test/api/players/${this.eventid}`)
                .then(response => {
                    this.players = response.data.data;
                })
                .catch(error=>console.log)
            },
            deletePlayer(index){

                var result = confirm("Are you sure you want to delete this player?");

                if(result == true){
                    this.$http.delete('http://shuttlecalculator.test/api/player/'+index)
                    .then(response => {
                        this.loadingPlayers();
                    })
                    .catch(error=>console.log)
                }

                
            },
            submitEdit(id,index){

                this.$http.put('http://shuttlecalculator.test/api/player/'+id,{
                    shuttlecocks: this.players[index].shuttlecocks,
                    totalFee: this.players[index].totalFee,
                })
                .then(response => {
                    this.edit = 0;
                    this.calculateFees(index,id);
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
            calculateFees(index,id) {

                var total= (this.hall / this.players.length) + (this.shuttlecockfees * this.players[index].shuttlecocks);
                total = total.toFixed(2);
                
                this.$http.put('http://shuttlecalculator.test/api/player/'+id,{
                    totalFee: total,
                    shuttlecocks: this.players[index].shuttlecocks,
                })
                .then(response => {
                    this.loadingPlayers();                    
                })
                .catch(function (error) {
                    console.log(error);
                });

            }
        }
    }

</script>


