# Project Deployment #

After running the `composer install` command revert the following files:

```bash
# .htaccess - checkout due to websites mapping and custom rewrite rules
git checkout .htaccess
```

# Deploying changes to the server #

Deployment is automated to decrease the possible downtime. Files to run:
- `deploy-theme-only.sh` - deploy changes to templates, layouts, CSS, DI etc., without installing new modules, upgrading them or changing modules sequence.
- `deploy-full.sh` - deploy changes that include installing new modules, or data/schema upgrades.
  

To use this scripts the following environment variables must be set:
- `BUILD_SYSTEM_PATH` - path to the build system without `/` at the end (not visible from the web);
- `LIVE_SYSTEM_PATH` - path to the live system `/` at the end (development, staging, production etc.);
- `GIT_BRANCH` - branch to checkout and deploy.
  

To add these variables to the environment, run the following commands and restart the terminal session. Ensure that
`.bash_aliases` is available in your OS (debian-based mostly), use `~/.bash_profile` or other respective file otherwise:

```bash
export BUILD_SYSTEM_PATH="/path/to/the/build/system/" >> ~/.bash_aliases
export PRODUCTION_SYSTEM_PATH="/path/to/the/production/system/" >> ~/.bash_aliases
export GIT_BRANCH="name-of-you-branch" >> ~/.bash_aliases
```

Deployment process flow implemented in the above files:

1) go to the build system located in `/path/to/the/build/system/`;
2) pull changes, install modules, compile code and assets;
3) go to the live system in `/path/to/the/production/system/`;
4) enter maintenance mode (only for `deploy-full.sh`);
5) pull changes, run `composer install` (only for `deploy-full.sh`) and `setup:upgrade`;
6) copy generated files from the build system;
7) switch to the production mode;
8) turn off maintenance (only for `deploy-full.sh`).

###  Compile LESS using Grunt ###

Less compilation via Grunt is extremely important during development. It can be set up in a few simple steps:

1) $ cp package.json.sample package.json
2) $ cp Gruntfile.js.sample Gruntfile.js
3) $ cp grunt-config.json.sample grunt-config.json
4) $ # Create theme configuration in `dev/tools/grunt/configs/local-themes.js`
5) $ docker exec -it firstname-lastname.local-dev bash
6) $ npm install
7) $ # Modify the `dev/tools/grunt/configs/less.js` to get source maps working with Docker
8) $ # by adding `outputSourceFiles: true` to the `lessOptions.options` object
9) $ grunt clean:theme && grunt exec:theme && grunt less:theme && grunt watch

### Theme configuration example for Grunt ###


```bash
#grunt exec:dvcampus_luma_en_US && grunt less:dvcampus_luma_en_US && grunt watch
module.exports = {
    dvcampus_luma_en_US: {
        area: 'frontend',
        name: 'DvCampus/luma',
        locale: 'en_US',
        files: [
        'css/styles-m',
        'css/styles-l'
        ],
    dsl: 'less'
    }
};
```
