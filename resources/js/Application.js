class Application {
    initDynamicImports() {
        this.modules.forEach((module) => {
            let moduleName = module.getAttribute('data-module');

            import(`./controllers/${moduleName}`)
                .then((comp) => {
                    let Instance = comp.default;

                    try {
                        let module = new Instance();
                    } catch (err) {
                        console.error(`Check data-module attr in ${moduleName}`);
                    }
                })
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
