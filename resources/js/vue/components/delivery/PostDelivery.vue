<template>
   <div>
       <form class="index_group" method="POST">
           <!--<form action="{{ route('setIndex') }}" class="index_group" method="POST">-->
           <div class="index_heading">
               <span class="index_heading-item">Или почтовый индекс</span>
           </div>

           <div class="form_group">
               <label for="index" class="form_group-label">Индекс</label>
               <div class="form_group-wrap">
                   <input type="text" name="index"/>

                   <TextBtn className="form_group-btn flat_btn animated_btn" text="применить" />
               </div>
           </div>
       </form>

       <div class="form_group address_group">
           <label
               for="lastaddress"
               class="form_group-label">
               Ранее используемый пункт выдачи
           </label>
           <input type="text" name="lastaddress" placeholder="Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787" />

           <div class="btns_wrap">
               <button class="form_group-btn active animated_btn">
                   <span class="form_group-btn_item">Продолжить с этим адресом</span>
               </button>
               <button class="form_group-btn">
                   <span class="form_group-btn_item animated_btn">Изменить адрес выдачи</span>
               </button>
           </div>
       </div>
   </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'
    export default {
        name: "PostDelivery",
        components: {
            TextBtn
        }
    }
</script>

<style scoped>

</style>
