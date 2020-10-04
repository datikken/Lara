<template>
    <div class="delSelf form_group address_group">
        <label
            for="lastaddress"
            class="delSelf_label form_group-label">
            {{ text }}
        </label>
        <input class="delSelf_input" type="text" name="lastaddress" placeholder="Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787" />

        <div class="delSelf_btns btns_wrap">
            <div class="delSelf_btn animated_btn">
                <span class="form_group-btn_item">Продолжить с этим адресом</span>
            </div>
            <div class="delSelf_btn flat_btn">
                <span class="form_group-btn_item">Изменить адрес выдачи</span>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "DeliverySelf",
        props: ['text'],
        methods: {
            ...mapActions([
                ''
            ])
        },
        mounted() {

        }
    }
</script>
