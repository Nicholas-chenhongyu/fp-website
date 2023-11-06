exports.config = {
    // See http://brunch.io/#documentation for docs.
    npm: {
        enabled: false
    },

    server: {
        run: true
    },

    paths: {
        public: 'public'
    },

    files: {
        javascripts: {
            joinTo: {
                'js/vendor.js': [
                    /^(app[\\/]scripts[\\/]jquery[\\/]jquery.min.js)/,
                    /^(app[\\/]scripts[\\/]bootstrap[\\/]bootstrap.bundle.min.js)/,
                    /^(app[\\/]scripts[\\/]swiper[\\/]swiper.min.js)/,
                    // /^(app[\\/]scripts[\\/]smooth-scroll[\\/]smooth-scroll.js)/,
                ],
                'js/app.js': [
                    /^(app[\\/]scripts[\\/]theme[\\/]theme.js)/,
                ],
            }
        },
        stylesheets: {
            joinTo: {
                'css/vendor.css': [
                    /^(app[\\/]styles[\\/]bootstrap[\\/]bootstrap.scss)/,
                    /^(app[\\/]styles[\\/]animate[\\/]animate.min.css)/,
                    /^(app[\\/]styles[\\/]swiper[\\/]swiper.min.css)/,
                    /^(app[\\/]styles[\\/]fontawesome)/,
                ],
                'css/app.css': [
                    /^(app[\\/]styles[\\/]theme[\\/]theme.scss)/,
                ],
            }
        }
    },

    modules: {
        wrapper: false,
        definition: false
    },

    conventions: {
        // we don't want javascripts in asset folders to be copied like the one in
        // the bootstrap assets folder
        assets: /assets[\\/](?!javascripts)/
    },

    plugins: {
        sass: {
            debug: 'comments', // or set to 'debug' for the FireSass-style output
            mode: 'native', // set to 'ruby' to force ruby
            allowCache: true,
            options: {
                includePaths: ['bower_components']
            }
        },

        babel: {
            // presets: ['es2015'],
            // plugins: ["transform-object-rest-spread"],
            // Do not use ES6 compiler in vendor code
            ignore: [/web\/static\/vendor/],
            compact: false
        },

        assetsmanager: {
            copyTo: {
                'webfonts': [
                    'app/fonts/D-DIN/*',
                    'app/fonts/fontawesome/*',
                ],
                'js': [
                    'app/scripts/wow/wow.js',
                ],
            }
        }
    }
};
