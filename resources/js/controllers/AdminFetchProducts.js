import $ from 'jquery';

class AdminFetchProducts {
    setListeners(btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            let url = 'http://93.184.160.194:8085/mainbase/hs/ecom/getitems';
            let token = {
                IDToken: '298095c6-7f9e-11e1-a511-001b214bf52b'
            }

            $.ajax({
                method: "post",
                url: `${url}`,
                data: token,
                headers: {
                    'Content-Type':'application/json',
                    'Access-Control-Allow-Origin': '*'
                },
                success: function (status) {
                    console.log(status)
                },
                error: function (error) {
                    console.warn(error);
                }
            });

        })
    }
    constructor() {
        let btn = document.querySelector('.fetch_btn');
            btn && this.setListeners(btn);
    }
}

export default AdminFetchProducts;
