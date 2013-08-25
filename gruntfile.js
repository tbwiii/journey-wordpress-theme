'use strict';
module.exports = function(grunt) {

	grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.initConfig({

        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {
            compass: {
                files: ['scss/*.scss'],
                tasks: ['compass']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint' /*, 'uglify'*/]
            }
        },

        // compass and scss
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'assets/js/source/**/*.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        // uglify: {
        //     dist: {
        //         options: {
        //             sourceMap: 'assets/js/map/source-map.js'
        //         },
        //         files: {
        //             'assets/js/plugins.min.js': [
        //                 'assets/js/source/plugins.js',
        //                 'assets/js/vendor/**/*.js',
        //                 '!assets/js/vendor/modernizr*.js'
        //             ],
        //             'assets/js/main.min.js': [
        //                 'assets/js/source/main.js'
        //             ]
        //         }
        //     }
        // },

    });

    // register task
    grunt.registerTask('default', ['watch']);

};