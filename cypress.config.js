const { defineConfig } = require("cypress");
const createBundler = require("@bahmutov/cypress-esbuild-preprocessor");
const addCucumberPreprocessorPlugin = 
  require("@badeball/cypress-cucumber-preprocessor").addCucumberPreprocessorPlugin;
const createEsbuildPlugin = 
  require("@badeball/cypress-cucumber-preprocessor/esbuild").createEsbuildPlugin;

module.exports = defineConfig({
  chromeWebSecurity: false,
  e2e: {
    specPattern: "cypress/e2e/features/*.feature",
    baseUrl: "https://qa.inteligenio.com/login", // URL donde se va a testear
    async setupNodeEvents(on, config) {
      // Implementa listeners de eventos aquí
      const bundler = createBundler({
        plugins: [createEsbuildPlugin(config)],
      });
      on("file:preprocessor", bundler);
      await addCucumberPreprocessorPlugin(on, config);
      return config;
    }
  }
});
