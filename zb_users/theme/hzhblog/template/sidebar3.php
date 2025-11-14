<div id="sidebar-box3">
    <el-button-group>
      <el-button size="mini" type="primary" icon="el-icon-arrow-left" @click="onChangeMonth('prev-month')">上个月</el-button>
      <el-button size="mini" type="primary" @click="onChangeMonth('today')">本月</el-button>
      <el-button size="mini" type="primary" @click="onChangeMonth('next-month')">下个月<i class="el-icon-arrow-right el-icon--right"></i></el-button>
    </el-button-group>
    <el-calendar :disabled="true" ref="elCalendar" v-model="value" @change="onDateChange">
    </el-calendar>
</div>

<script type="module">
new Vue({
    el: "#sidebar-box3",
    data: {
        value: "",
        dateObj:{
            date_val:"",
            month_val:"",
            type:"day",
        },
        isSet:false
        
    },
    watch:{
        value(nv,ov){
            this.onDateChange(this.getFormatDate(nv))
        }
    },
    mounted() {
      let dateCur = sessionStorage.getItem("dateCur")
      if(dateCur){
         this.dateObj=JSON.parse(dateCur)
         this.value=new Date(this.dateObj.date_val)
         sessionStorage.removeItem("dateCur")
      }else{
        this.value=new Date()
      }
      
    },
    methods: {
        onDateChange(d){
            if(this.isSet){
                this.dateObj.date_val=d
                this.dateObj.month_val=d.substring(0,d.toString().lastIndexOf("-"))
                if(this.dateObj.type=="day"){
                    location.search="?date="+this.dateObj.date_val
                }else if(this.dateObj.type=="month"){
                    location.search="?date="+this.dateObj.month_val
                }
                sessionStorage.setItem("dateCur",JSON.stringify(this.dateObj))
            }
            this.isSet=true
            this.dateObj.type="day"
        },
        onChangeMonth(str){
            try{
                this.dateObj.type="month"
                this.$refs.elCalendar.selectDate(str)
                this.nextTick(()=>{
                    if(str=='today'){
                       this.onDateChange(this.getFormatDate(new Date()))
                    }
                })
            }catch(e){}
        },
        getFormatDate(v){
           return formatTime(new Date(v))
        },

    },
})
</script>