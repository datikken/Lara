class Application {

    initDynamicImports() {
        this.modules.forEach((module) => {
            let moduleName = module.getAttribute('data-module');

            console.warn('este',module)

            import(`./controllers/${moduleName}`)
                .then((comp) => {
                    let Instance = comp.default;

                    let module = new Instance();
                })


        })
    }
    collectModules() {
        this.modules = document.querySelectorAll('[data-module]');

        console.log('application modules', this.modules)

        this.initDynamicImports();
    }
    constructor() {
        this.collectModules()
    }
}

export default Application;
