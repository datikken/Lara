class Application {
    async importModule(module) {
        let moduleName = module.getAttribute('data-module');

        await import(`./controllers/${moduleName}`)
            .then((comp) => {
                let Instance = comp.default;

                try {
                    let module = new Instance();
                } catch (err) {
                    console.error(`Check data-module attr in ${moduleName}`);
                }
            })
    }

    initDynamicImports() {
        let that = this;

        this.modules.forEach((module) => {
            that.importModule(module);
        })
    }

    collectModules() {
        this.modules = document.querySelectorAll('[data-module]');
        this.initDynamicImports();
    }


    constructor() {
        this.collectModules()
    }
}

export default Application;
