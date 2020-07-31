<template>
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
            <button class="form_group-btn animated_btn">
                <span class="form_group-btn_item">Изменить адрес выдачи</span>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DeliverySelf"
    }
</script>

<style scoped>

</style>
