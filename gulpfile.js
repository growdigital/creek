var gulp = require('gulp'),
  // Load gulp plugins

  // System
  gutil = require('gulp-util'),
  concat = require('gulp-concat'),

  // Files
  myth = require('gulp-myth'),
  minifyCSS = require('gulp-minify-css'),
  pixrem = require('gulp-pixrem'),
  svgmin = require('gulp-svgmin'),

  // Server
  tinyLr = require('tiny-lr'),
  livereload = require('gulp-livereload'),
  watch = require('gulp-watch'),
  liveReloadServer = tinyLr(),

  // Define paths
  paths = {
      css: [
        'src/assets/styles/alpha.css',
        'src/assets/styles/variables.css',
        'src/bower_components/normalize/normalize.css',
        'src/assets/styles/base.css',
        'src/bower_components/suit-utils-*/*.css',
        'src/patternlab/**/**/*.css',
        'src/patternlab/**/**/**/*.css',
        'src/assets/styles/shame.css'
      ],
      js: [
        'src/assets/scripts/*.js',
        'src/patternlab/**/**/*.js',
        'src/patternlab/**/**/**/*.js'
      ],
      jquery: [
        'src/bower_components/jquery/dist/jquery.min.js',
      ],
      svg: [
        'src/assets/images/svg/*.svg'
      ],
      bitmap: [
        'src/assets/images/svg/*.svg'
      ]
  };

// Error function
function handleError(type, e) {
    gutil.log(gutil.colors.red('Error for task: "' + type));
    gutil.log(gutil.colors.red(e.message));
}

// CSS task
gulp.task('css', function() {
    var stream = gulp.src(paths.css)
        .pipe(myth())
        .on('error', function(e){ handleError('Run Myth processing',e);})
        .pipe(concat("styles.css"))
        .on('error', function(e){ handleError('Concat CSS files',e);})
        .pipe(pixrem())
        .on('error', function(e){ handleError('Pixel fallback for rems',e);})
        .pipe(minifyCSS())
        .on('error', function(e){ handleError('Minify CSS files',e);})
        .pipe(gulp.dest('static'))
        .on('error', function(e){ handleError('Save CSS file',e);});
});

// SVG task
gulp.task('svg', function() {
    return gulp.src(paths.svg)
        .pipe(svgmin())
        .pipe(gulp.dest('static/assets/images'));
});

// Server tasks
gulp.task('livereload', ['tiny-lr-server'], function() {
    gulp.src(['static/styles.css','static/assets/images/*.svg'])
        .pipe(watch())
        .on('error', function(e){ handleError('Watch file for LiveReload refresh',e);})
        .pipe(livereload(liveReloadServer));
});

gulp.task('tiny-lr-server', function(next) {
    liveReloadServer.listen(35729, function(err) {
        if (err) return console.error(err);
        next();
    });
});

// Watch task
gulp.task('watch', function () {
    gulp.watch(paths.css, ['css'])
    gulp.watch(paths.svg, ['svg']);
});

// Default task
gulp.task('default', ['css', 'svg', 'watch', 'livereload']);
