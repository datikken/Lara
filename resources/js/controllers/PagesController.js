class PagesController {
    constructor() {
        this.changeContent();
    }

    changeContent() {
        let links = document.querySelectorAll('a');
        links.forEach((el) => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                let url = $(el).attr('href');
                let host = window.location.host;
                let URL = host + url;

                $.ajax({
                    method: "GET",
                    url: `http://${URL}`,
                    data: '',
                    success: function (data, status, XHR) {
                        let htmlDoc =new DOMParser().parseFromString(data, "text/html");
                        let currentContent = document.querySelector('.page_content');
                        let pageContent = htmlDoc.querySelector('.page_content');
                        let oldScripts = document.querySelectorAll('script');
                        let newScripts = htmlDoc.querySelectorAll('script');

                        oldScripts.forEach((el) => {
                            // console.log(el.src);
                            el.remove();
                        });

                        newScripts.forEach((el) => {
                          const script = document.createElement("script");
                                script.type = "text/javascript";
                                script.src = el.src;


                            if(el.src != '') {
                                document.head.appendChild(script);
                                if(el.src.indexOf('app') > 0) {
                                    console.log(el);
                                    // eval(el.innerText);
                                }
                            }
                        });

                        $(currentContent).html(pageContent);
                    },
                    error: function (error, status, XHR) {
                        console.warn(error.statusText);
                    }
                });
                console.log(url);
            });
        });
    }
}

export default PagesController;