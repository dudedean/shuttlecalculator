<template>
  
    <div>

        <button v-on:click="addRow">Add Player</button>


        <table>

            <tr v-for="(row,index) in rows" :key="row.id">

                <td>Name</td>
                <td><input type="text" v-model="row.name"></td>
                <td>
                    <a v-on:click="submitElement(index)" style="cursor: pointer">Submit</a>
                </td>
                <td>
                    <a v-on:click="removeElement(index);" style="cursor: pointer">Remove</a>
                </td>
            </tr>

        </table>  

        <table>

                    <th>Name</th>
                    <th>No of Shuttlecocks</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Fees</th>

                    <tr v-for="(player,index) in players" :key="player.id">
                        <td>{{player.name}}</td>
                        <td>{{player.shuttlecocks}}</td>
                        <td><button>Update</button></td>
                        <td><button>Delete Player</button></td>
                        <td><button>Count Fees</button></td>
                        <td>{{player.totalFee}}</td>
                    </tr>

        </table>
        
    </div>

</template>

<script>


    export default {
        data () {
            return {
                rows: [],
                players: []
            }
        },
        props: ['eventid'],
        created() {

                this.$http.get(`http://shuttlecalculator.test/api/players/${this.eventid}`)
                .then(response => {
                    this.players = response.data.data;
                    console.log(this.players);
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
                    totalFees: 0
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
                    totalFees: this.rows[index].totalFees
                })
                .then(response => {
                    console.log(response);
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
                    console.log(this.players);
                })
                .catch(error=>console.log)
            }
        }
    }

</script>