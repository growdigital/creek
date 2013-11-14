//
// == Installation ==
//
// Install the grunt command-line tool (-g puts it in /usr/local/bin):
// % sudo npm install -g grunt-cli
//
// Install all the packages required to build this:
// (Packages will be installed in ./node_modules - don't accidentally commit this)
// % cd wp-content/themes/theme_name
// % npm install 
//
// == Building ==
//
// % grunt
//
// Watch for changes:
// % grunt watch
//
// If you create new .scss blocks in `_blocks` directory, restart `% grunt watch`
//

module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      dist: {
        src: ['_blocks/**/*.scss'],
        dest: 'styles/_block.scss',
      }
    },
    sass: {
      dist: {
        files: {
          'styles/styles.css' : 'styles/styles.scss'
        }
      }
    },
    watch: {
      block: {
        files: ['_blocks/**/*.scss'],
        tasks: ['concat'],
        },
      css: {
        files: '**/*.scss',
        tasks: ['sass']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default',['watch']);
}

// watch: {
//      css: {
//          files: ['assets/css/**/*.less'],
//          tasks: ['less'],
//      },
//      js: {
//          files: ['assets/js/**/*.js'],
//          tasks: ['uglify'],
//      },
